<?php

namespace App\Exports;

use App\Models\ScanBatch;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class ScanBatchRecapSheet implements FromCollection, WithHeadings, WithTitle
{
    protected $batch;

    public function __construct(ScanBatch $batch)
    {
        $this->batch = $batch;
    }

    public function collection()
    {
        return $this->batch->transactions()
            ->with('asset')
            ->get()
            ->groupBy('asset_code')
            ->map(function ($transactions) {
                $first = $transactions->first();
                $asset = $first->asset;

                $totalIn = $transactions->where('type', 'IN')->sum('quantity');
                $totalOut = $transactions->where('type', 'OUT')->sum('quantity');

                return [
                    'kode_batch' => $this->batch->batch_code,
                    'kode_barang' => $first->asset_code,
                    'nama_barang' => $asset->name ?? '-',
                    'kategori' => $asset->category ?? '-',
                    'merk' => $asset->merk ?? '-',
                    'warna' => $asset->warna ?? '-',
                    'ukuran' => $asset->ukuran ?? '-',
                    'total_in_sesi' => $totalIn,
                    'total_out_sesi' => $totalOut,
                    'total_scan_sesi' => $transactions->sum('quantity'),
                    'satuan' => $asset->satuan ?? 'pcs',
                    'stok_saat_ini' => $asset->stok_saat_ini ?? 0,
                ];
            })
            ->values();
    }

    public function headings(): array
    {
        return [
            'Kode Batch',
            'Kode Barang',
            'Nama Barang',
            'Kategori',
            'Merk',
            'Warna',
            'Ukuran',
            'Total IN Sesi',
            'Total OUT Sesi',
            'Total Scan Sesi',
            'Satuan',
            'Stok Saat Ini',
        ];
    }

    public function title(): string
    {
        return 'Rekap Sesi';
    }
}