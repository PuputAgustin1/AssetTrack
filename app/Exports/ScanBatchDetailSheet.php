<?php

namespace App\Exports;

use App\Models\ScanBatch;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class ScanBatchDetailSheet implements FromCollection, WithHeadings, WithTitle
{
    protected $batch;

    public function __construct(ScanBatch $batch)
    {
        $this->batch = $batch;
    }

    public function collection()
    {
        return $this->batch->transactions()
            ->with(['asset', 'user'])
            ->orderBy('transaction_date')
            ->get()
            ->map(function ($transaction) {
                return [
                    'kode_batch' => $this->batch->batch_code,
                    'tanggal_scan' => optional($transaction->transaction_date)->format('d/m/Y H:i'),
                    'kode_barang' => $transaction->asset_code,
                    'nama_barang' => $transaction->asset->name ?? '-',
                    'kategori' => $transaction->asset->category ?? '-',
                    'merk' => $transaction->asset->merk ?? '-',
                    'warna' => $transaction->asset->warna ?? '-',
                    'ukuran' => $transaction->asset->ukuran ?? '-',
                    'jenis_transaksi' => $transaction->type,
                    'jumlah' => $transaction->quantity,
                    'satuan' => $transaction->asset->satuan ?? 'pcs',
                    'user' => $transaction->user->name ?? '-',
                    'keterangan' => $transaction->note ?? '-',
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Kode Batch',
            'Tanggal Scan',
            'Kode Barang',
            'Nama Barang',
            'Kategori',
            'Merk',
            'Warna',
            'Ukuran',
            'Jenis Transaksi',
            'Jumlah',
            'Satuan',
            'User',
            'Keterangan',
        ];
    }

    public function title(): string
    {
        return 'Detail Scan';
    }
}