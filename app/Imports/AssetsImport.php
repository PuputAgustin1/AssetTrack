<?php

namespace App\Imports;

use App\Models\Asset;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class AssetsImport implements ToCollection, WithStartRow
{
    public function startRow(): int
    {
        // Data mulai dari baris ke-5
        return 5;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

            $code = trim((string) ($row[0] ?? ''));
            $name = trim((string) ($row[1] ?? ''));
            $category = trim((string) ($row[2] ?? ''));
            $location = trim((string) ($row[3] ?? ''));
            $condition = strtolower(trim((string) ($row[4] ?? '')));
            $merk = trim((string) ($row[5] ?? ''));
            $penanggungjawab = trim((string) ($row[6] ?? ''));
            $tanggalMasuk = $row[7] ?? null;
            $harga = $row[8] ?? 0;

            // Lewati baris kosong
            if (
                $code === '' &&
                $name === '' &&
                $category === '' &&
                $location === '' &&
                $condition === ''
            ) {
                continue;
            }

            // Kalau kode barang kosong, lewati saja supaya tidak error
            if ($code === '') {
                continue;
            }

            // Default kalau ada data kosong
            $name = $name ?: '-';
            $category = $category ?: '-';
            $location = $location ?: '-';
            $condition = $condition ?: 'baik';
            $merk = $merk ?: '-';
            $penanggungjawab = $penanggungjawab ?: '-';

            // Normalisasi kondisi
            if (!in_array($condition, ['baik', 'rusak', 'perbaikan'])) {
                $condition = 'baik';
            }

            // Format tanggal dari Excel
            if (is_numeric($tanggalMasuk)) {
                $tanggalMasuk = Date::excelToDateTimeObject($tanggalMasuk)->format('Y-m-d');
            } elseif ($tanggalMasuk instanceof \DateTimeInterface) {
                $tanggalMasuk = $tanggalMasuk->format('Y-m-d');
            } elseif (empty($tanggalMasuk)) {
                $tanggalMasuk = now()->format('Y-m-d');
            }

            // Bersihkan harga
            $harga = is_numeric($harga)
                ? $harga
                : str_replace(['Rp', 'rp', '.', ',', ' '], '', (string) $harga);

            $harga = $harga ?: 0;

            // Kalau code sudah ada, update. Kalau belum ada, create.
            Asset::updateOrCreate(
                ['code' => $code],
                [
                    'name' => $name,
                    'category' => $category,
                    'location' => $location,
                    'condition' => $condition,
                    'merk' => $merk,
                    'penanggungjawab' => $penanggungjawab,
                    'tanggal_masuk' => $tanggalMasuk,
                    'harga' => $harga,
                ]
            );
        }
    }
}