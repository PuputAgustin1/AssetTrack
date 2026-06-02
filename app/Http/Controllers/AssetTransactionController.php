<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\AssetTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            'type' => 'required|in:IN,OUT',
            'note' => 'nullable|string|max:1000',
            'items' => 'required|array|min:1',
            'items.*.code' => 'required|string|exists:assets,code',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($validated) {
            foreach ($validated['items'] as $item) {
                $asset = Asset::where('code', $item['code'])->lockForUpdate()->firstOrFail();
                $quantity = (int) $item['quantity'];

                if ($validated['type'] === 'OUT' && $asset->stok_saat_ini < $quantity) {
                    throw \Illuminate\Validation\ValidationException::withMessages([
                        'items' => 'Stok barang ' . $asset->code . ' tidak mencukupi.',
                    ]);
                }

                AssetTransaction::create([
                    'asset_code' => $asset->code,
                    'user_id' => Auth::id(),
                    'type' => $validated['type'],
                    'quantity' => $quantity,
                    'note' => $validated['note'] ?? null,
                    'transaction_date' => now(),
                ]);

                if ($validated['type'] === 'IN') {
                    $asset->stok_saat_ini += $quantity;
                } else {
                    $asset->stok_saat_ini -= $quantity;
                }

                $asset->save();
            }
        });

        return response()->json([
            'success' => true,
            'message' => 'Semua transaksi berhasil disimpan.',
        ]);
    }

    public function history()
    {
        $transactions = AssetTransaction::with(['asset', 'user'])
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
}