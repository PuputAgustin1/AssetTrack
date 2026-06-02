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

    public function history()
    {
        $transactions = AssetTransaction::with(['asset', 'user'])
            ->latest('transaction_date')
            ->paginate(15);

        return view('transactions.history', compact('transactions'));
    }
}