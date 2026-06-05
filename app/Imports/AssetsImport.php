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

    private function generateAssetCode()
    {
        $prefix = 'STK';
        $date = now()->format('Ymd');

        $lastAsset = Asset::where('code', 'like', $prefix . '-' . $date . '-%')
            ->orderBy('code', 'desc')
            ->first();

        if ($lastAsset) {
            $lastNumber = (int) substr($lastAsset->code, -3);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        $newCode = $prefix . '-' . $date . '-' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

        while (Asset::where('code', $newCode)->exists()) {
            $newNumber++;
            $newCode = $prefix . '-' . $date . '-' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
        }

        return $newCode;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

            /*
            Format Excel:
            A / row[0]  = No                  -> wajib angka, tapi tidak disimpan
            B / row[1]  = Nama Barang
            C / row[2]  = Kategori
            D / row[3]  = Lokasi
            E / row[4]  = Kondisi
            F / row[5]  = Buyer               -> masuk ke merk
            G / row[6]  = Style               -> masuk ke warna
            H / row[7]  = Grade               -> masuk ke ukuran
            I / row[8]  = Satuan
            J / row[9]  = Stok Awal
            K / row[10] = Stok Saat Ini
            L / row[11] = Penanggung Jawab
            M / row[12] = Tanggal Masuk
            N / row[13] = Harga
            */

            $no = trim((string) ($row[0] ?? ''));

            // KUNCI UTAMA:
            // Kalau kolom A bukan angka, jangan import.
            // Ini untuk mencegah baris petunjuk seperti "A", "B", "F — Merk", dll ikut masuk.
            if ($no === '' || !is_numeric($no)) {
                continue;
            }

            $name = trim((string) ($row[1] ?? ''));
            $category = trim((string) ($row[2] ?? ''));
            $location = trim((string) ($row[3] ?? ''));
            $condition = strtolower(trim((string) ($row[4] ?? '')));

            $buyer = trim((string) ($row[5] ?? ''));
            $style = trim((string) ($row[6] ?? ''));
            $grade = strtoupper(trim((string) ($row[7] ?? '')));

            $satuan = trim((string) ($row[8] ?? ''));
            $stokAwal = $row[9] ?? null;
            $stokSaatIni = $row[10] ?? null;

            $penanggungjawab = trim((string) ($row[11] ?? ''));
            $tanggalMasuk = $row[12] ?? null;
            $harga = $row[13] ?? null;

            // Kolom wajib: Nama, Kategori, Lokasi, Kondisi.
            // Kalau salah satu kosong, jangan import.
            if ($name === '' || $category === '' || $location === '' || $condition === '') {
                continue;
            }

            // Pengaman tambahan: jangan import baris petunjuk/template
            $text = strtolower(
                $name . ' ' .
                $category . ' ' .
                $location . ' ' .
                $condition . ' ' .
                $buyer . ' ' .
                $style . ' ' .
                $grade . ' ' .
                $satuan . ' ' .
                $penanggungjawab
            );

            $guideKeywords = [
                'nama aset',
                'nama barang',
                'kategori',
                'lokasi',
                'kondisi',
                'merk',
                'buyer',
                'style',
                'grade',
                'satuan',
                'stok awal',
                'stok saat ini',
                'penanggung',
                'tanggal masuk',
                'harga',
                'wajib',
                'opsional',
                'optional',
                'contoh',
                'format yyyy',
                'pilih dari dropdown',
                'produsen aset',
                'nama orang yang bertanggungjawab',
                '—',
            ];

            foreach ($guideKeywords as $keyword) {
                if (str_contains($text, $keyword)) {
                    continue 2;
                }
            }

            // Default data opsional
            $buyer = $buyer ?: '-';
            $style = $style ?: '-';
            $grade = $grade ?: '-';
            $satuan = $satuan ?: 'pcs';
            $penanggungjawab = $penanggungjawab ?: 'Stockload';

            // Normalisasi kondisi
            if (!in_array($condition, ['baik', 'rusak', 'perbaikan'])) {
                $condition = 'baik';
            }

            // Normalisasi grade
            if (!in_array($grade, ['A', 'B', 'ED', '-'])) {
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
            if ($harga === null || $harga === '') {
                $harga = 0;
            } else {
                $harga = is_numeric($harga)
                    ? $harga
                    : str_replace(['Rp', 'rp', '.', ',', ' '], '', (string) $harga);

                $harga = $harga ?: 0;
            }

            // Bersihkan stok awal
            if ($stokAwal === null || $stokAwal === '') {
                $stokAwal = 0;
            } else {
                $stokAwal = is_numeric($stokAwal)
                    ? (int) $stokAwal
                    : (int) str_replace(['.', ',', ' '], '', (string) $stokAwal);
            }

            if ($stokAwal < 0) {
                $stokAwal = 0;
            }

            // Bersihkan stok saat ini
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

            Asset::create([
                'code' => $this->generateAssetCode(),
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
            ]);
        }
    }
}