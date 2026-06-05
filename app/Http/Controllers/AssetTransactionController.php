<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\AssetTransaction;
use App\Models\ScanBatch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Exports\ScanBatchExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StockReportExport;

class AssetTransactionController extends Controller
{
    public function create($code)
    {
        $asset = Asset::where('code', $code)->firstOrFail();

        return view('transactions.create', compact('asset'));
    }

    public function store(Request $request, $code)
    {
        $asset = Asset::where('code', $code)->firstOrFail();

        $validated = $request->validate([
            'type' => 'required|in:IN,OUT',
            'quantity' => 'required|integer|min:1',
            'note' => 'nullable|string|max:1000',
        ]);

        if ($validated['type'] === 'OUT' && $asset->stok_saat_ini < $validated['quantity']) {
            return back()
                ->withInput()
                ->with('error', 'Stok tidak mencukupi untuk transaksi keluar.');
        }

        DB::transaction(function () use ($asset, $validated) {
            AssetTransaction::create([
                'asset_code' => $asset->code,
                'user_id' => Auth::id(),
                'type' => $validated['type'],
                'quantity' => $validated['quantity'],
                'note' => $validated['note'] ?? null,
                'transaction_date' => now(),
            ]);

            if ($validated['type'] === 'IN') {
                $asset->stok_saat_ini += $validated['quantity'];
            } else {
                $asset->stok_saat_ini -= $validated['quantity'];
            }

            $asset->save();
        });

        return redirect()
            ->route('assets.show', $asset->code)
            ->with('success', 'Transaksi berhasil disimpan dan stok telah diperbarui.');
    }

    public function batchStore(Request $request)
    {
        $validated = $request->validate([
            'note' => 'nullable|string|max:1000',
            'items' => 'required|array|min:1',
            'items.*.code' => 'required|string|exists:assets,code',
            'items.*.type' => 'required|in:IN,OUT',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        $batch = null;

        DB::transaction(function () use ($validated, &$batch) {
            $types = collect($validated['items'])->pluck('type')->unique();

            $batch = ScanBatch::create([
                'batch_code' => 'BATCH-' . now()->format('Ymd-His') . '-' . strtoupper(Str::random(4)),
                'user_id' => Auth::id(),
                'type' => $types->count() === 1 ? $types->first() : 'MIXED',
                'note' => $validated['note'] ?? null,
                'scan_date' => now(),
            ]);

            foreach ($validated['items'] as $item) {
                $asset = Asset::where('code', $item['code'])
                    ->lockForUpdate()
                    ->firstOrFail();

                $quantity = (int) $item['quantity'];
                $type = $item['type'];

                if ($type === 'OUT' && $asset->stok_saat_ini < $quantity) {
                    throw \Illuminate\Validation\ValidationException::withMessages([
                        'items' => 'Stok barang ' . $asset->code . ' tidak mencukupi untuk OUT sebanyak ' . $quantity . '.',
                    ]);
                }

                AssetTransaction::create([
                    'batch_id' => $batch->id,
                    'asset_code' => $asset->code,
                    'user_id' => Auth::id(),
                    'type' => $type,
                    'quantity' => $quantity,
                    'note' => $validated['note'] ?? null,
                    'transaction_date' => now(),
                ]);

                if ($type === 'IN') {
                    $asset->stok_saat_ini += $quantity;
                } else {
                    $asset->stok_saat_ini -= $quantity;
                }

                $asset->save();
            }
        });

        return response()->json([
            'success' => true,
            'message' => 'Semua transaksi berhasil disimpan dalam satu sesi scan.',
            'batch_id' => $batch->id,
            'batch_code' => $batch->batch_code,
        ]);
    }
    public function history()
    {
         $transactions = AssetTransaction::with(['asset', 'user', 'batch'])
        ->latest('transaction_date')
        ->paginate(15);

        return view('transactions.history', compact('transactions'));

    }

    public function stockRecap()
    {
        $assets = Asset::withSum([
                'transactions as total_in' => function ($query) {
                    $query->where('type', 'IN');
                }
            ], 'quantity')
            ->withSum([
                'transactions as total_out' => function ($query) {
                    $query->where('type', 'OUT');
                }
            ], 'quantity')
            ->orderBy('name')
            ->paginate(15);

        return view('transactions.recap', compact('assets'));
    }

    public function showBatch($id)
    {
        $batch = ScanBatch::with([
            'user',
            'transactions.asset',
            'transactions.user'
        ])->findOrFail($id);

        $recaps = $batch->transactions
            ->groupBy('asset_code')
            ->map(function ($transactions) {
                $first = $transactions->first();

                return [
                    'asset_code' => $first->asset_code,
                    'name' => $first->asset->name ?? '-',
                    'merk' => $first->asset->merk ?? '-',
                    'warna' => $first->asset->warna ?? '-',
                    'ukuran' => $first->asset->ukuran ?? '-',
                    'satuan' => $first->asset->satuan ?? 'pcs',
                    'total_quantity' => $transactions->sum('quantity'),
                    'stok_saat_ini' => $first->asset->stok_saat_ini ?? 0,
                ];
            })
            ->values();

        return view('transactions.batch-show', compact('batch', 'recaps'));
    }

    public function exportBatch($id)
    {
        $batch = ScanBatch::with('transactions.asset')->findOrFail($id);

        $fileName = 'scan_batch_' . $batch->batch_code . '.xlsx';

        return Excel::download(new ScanBatchExport($batch), $fileName);
    }

    public function printQrBatch($id)
    {
        $batch = ScanBatch::with(['transactions.asset', 'user'])->findOrFail($id);

        $assets = $batch->transactions
            ->pluck('asset')
            ->filter()
            ->unique('code')
            ->values();

        return view('transactions.print-qr-batch', compact('batch', 'assets'));
    }

    public function stockReport(Request $request)
    {
        $search = $request->search;
        $buyer = $request->buyer;
        $style = $request->style;
        $grade = $request->grade;
        $location = $request->location;
        $type = $request->type;
        $dateFrom = $request->date_from;
        $dateTo = $request->date_to;

        $assetQuery = Asset::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('code', 'like', "%{$search}%")
                        ->orWhere('name', 'like', "%{$search}%")
                        ->orWhere('merk', 'like', "%{$search}%")
                        ->orWhere('warna', 'like', "%{$search}%")
                        ->orWhere('ukuran', 'like', "%{$search}%");
                });
            })
            ->when($buyer, fn ($query) => $query->where('merk', 'like', "%{$buyer}%"))
            ->when($style, fn ($query) => $query->where('warna', 'like', "%{$style}%"))
            ->when($grade, fn ($query) => $query->where('ukuran', $grade))
            ->when($location, fn ($query) => $query->where('location', 'like', "%{$location}%"));

        $transactionDateFilter = function ($query) use ($dateFrom, $dateTo, $type) {
            $query->when($dateFrom, fn ($q) => $q->whereDate('transaction_date', '>=', $dateFrom))
                ->when($dateTo, fn ($q) => $q->whereDate('transaction_date', '<=', $dateTo))
                ->when($type, fn ($q) => $q->where('type', $type));
        };

        $assets = (clone $assetQuery)
            ->withSum([
                'transactions as total_in' => function ($query) use ($dateFrom, $dateTo) {
                    $query->where('type', 'IN')
                        ->when($dateFrom, fn ($q) => $q->whereDate('transaction_date', '>=', $dateFrom))
                        ->when($dateTo, fn ($q) => $q->whereDate('transaction_date', '<=', $dateTo));
                }
            ], 'quantity')
            ->withSum([
                'transactions as total_out' => function ($query) use ($dateFrom, $dateTo) {
                    $query->where('type', 'OUT')
                        ->when($dateFrom, fn ($q) => $q->whereDate('transaction_date', '>=', $dateFrom))
                        ->when($dateTo, fn ($q) => $q->whereDate('transaction_date', '<=', $dateTo));
                }
            ], 'quantity')
            ->orderBy('name')
            ->paginate(15)
            ->withQueryString();

        $transactionQuery = AssetTransaction::query()
            ->whereHas('asset', function ($query) use ($search, $buyer, $style, $grade, $location) {
                $query->when($search, function ($q) use ($search) {
                    $q->where(function ($sub) use ($search) {
                        $sub->where('code', 'like', "%{$search}%")
                            ->orWhere('name', 'like', "%{$search}%")
                            ->orWhere('merk', 'like', "%{$search}%")
                            ->orWhere('warna', 'like', "%{$search}%")
                            ->orWhere('ukuran', 'like', "%{$search}%");
                    });
                })
                ->when($buyer, fn ($q) => $q->where('merk', 'like', "%{$buyer}%"))
                ->when($style, fn ($q) => $q->where('warna', 'like', "%{$style}%"))
                ->when($grade, fn ($q) => $q->where('ukuran', $grade))
                ->when($location, fn ($q) => $q->where('location', 'like', "%{$location}%"));
            })
            ->when($dateFrom, fn ($query) => $query->whereDate('transaction_date', '>=', $dateFrom))
            ->when($dateTo, fn ($query) => $query->whereDate('transaction_date', '<=', $dateTo));

        $summary = [
            'total_barang' => (clone $assetQuery)->count(),
            'total_stok_awal' => (clone $assetQuery)->sum('stok_awal'),
            'total_in' => (clone $transactionQuery)->where('type', 'IN')->sum('quantity'),
            'total_out' => (clone $transactionQuery)->where('type', 'OUT')->sum('quantity'),
            'total_stok_saat_ini' => (clone $assetQuery)->sum('stok_saat_ini'),
            'total_sesi_scan' => ScanBatch::query()
                ->when($dateFrom, fn ($query) => $query->whereDate('scan_date', '>=', $dateFrom))
                ->when($dateTo, fn ($query) => $query->whereDate('scan_date', '<=', $dateTo))
                ->count(),
        ];

        return view('transactions.report', compact('assets', 'summary'));
    }

    public function exportStockReport(Request $request)
    {
        $filters = [
            'search' => $request->search,
            'buyer' => $request->buyer,
            'style' => $request->style,
            'grade' => $request->grade,
            'location' => $request->location,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
        ];

        return Excel::download(new StockReportExport($filters), 'report_stok_barang.xlsx');
    }
}