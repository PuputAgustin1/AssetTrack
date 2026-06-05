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

            // Kolom stockload, tetap masuk ke kolom database lama
            $buyer = trim((string) ($row[5] ?? ''));   // masuk ke merk
            $style = trim((string) ($row[6] ?? ''));   // masuk ke warna
            $grade = trim((string) ($row[7] ?? ''));   // masuk ke ukuran

            $satuan = trim((string) ($row[8] ?? 'pcs'));
            $stokAwal = $row[9] ?? 0;
            $stokSaatIni = $row[10] ?? null;

            $penanggungjawab = trim((string) ($row[11] ?? ''));
            $tanggalMasuk = $row[12] ?? null;
            $harga = $row[13] ?? 0;

            // Lewati baris kosong
            if (
                $code === '' &&
                $name === '' &&
                $category === '' &&
                $location === '' &&
                $buyer === '' &&
                $style === '' &&
                $grade === ''
            ) {
                continue;
            }

            // Kalau kode barang kosong, lewati agar tidak error
            if ($code === '') {
                continue;
            }

            // Default kalau ada data kosong
            $name = $name ?: '-';
            $category = $category ?: 'Stockload';
            $location = $location ?: 'Stockload';
            $condition = $condition ?: 'baik';
            $buyer = $buyer ?: '-';
            $style = $style ?: '-';
            $grade = strtoupper($grade ?: '-');
            $satuan = $satuan ?: 'pcs';
            $penanggungjawab = $penanggungjawab ?: 'Stockload';

            // Normalisasi kondisi
            if (!in_array($condition, ['baik', 'rusak', 'perbaikan'])) {
                $condition = 'baik';
            }

            // Normalisasi grade
            if (!in_array($grade, ['A', 'B', 'ED'])) {
                $grade = '-';
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

            // Bersihkan stok
            $stokAwal = is_numeric($stokAwal)
                ? (int) $stokAwal
                : (int) str_replace(['.', ',', ' '], '', (string) $stokAwal);

            if ($stokAwal < 0) {
                $stokAwal = 0;
            }

            if ($stokSaatIni === null || $stokSaatIni === '') {
                $stokSaatIni = $stokAwal;
            } else {
                $stokSaatIni = is_numeric($stokSaatIni)
                    ? (int) $stokSaatIni
                    : (int) str_replace(['.', ',', ' '], '', (string) $stokSaatIni);

                if ($stokSaatIni < 0) {
                    $stokSaatIni = 0;
                }
            }

            // Kalau code sudah ada, update. Kalau belum ada, create.
            Asset::updateOrCreate(
                ['code' => $code],
                [
                    'name' => $name,
                    'category' => $category,
                    'location' => $location,
                    'condition' => $condition,
                    'merk' => $buyer,
                    'warna' => $style,
                    'ukuran' => $grade,
                    'satuan' => $satuan,
                    'stok_awal' => $stokAwal,
                    'stok_saat_ini' => $stokSaatIni,
                    'penanggungjawab' => $penanggungjawab,
                    'tanggal_masuk' => $tanggalMasuk,
                    'harga' => $harga,
                ]
            );
        }
    }
}