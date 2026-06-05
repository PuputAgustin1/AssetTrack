<?php

namespace App\Exports;

use App\Models\Asset;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class StockReportExport implements FromCollection, WithHeadings, WithCustomStartCell, WithEvents, WithStyles, WithColumnWidths, WithTitle
{
    protected $filters;

    public function __construct($filters = [])
    {
        $this->filters = $filters;
    }

    public function title(): string
    {
        return 'Report Stok';
    }

    public function startCell(): string
    {
        return 'A6';
    }

    public function collection()
    {
        $dateFrom = $this->filters['date_from'] ?? null;
        $dateTo = $this->filters['date_to'] ?? null;

        return Asset::query()
            ->when($this->filters['search'] ?? null, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('code', 'like', "%{$search}%")
                        ->orWhere('name', 'like', "%{$search}%")
                        ->orWhere('merk', 'like', "%{$search}%")
                        ->orWhere('warna', 'like', "%{$search}%")
                        ->orWhere('ukuran', 'like', "%{$search}%");
                });
            })
            ->when($this->filters['buyer'] ?? null, fn ($query, $buyer) => $query->where('merk', 'like', "%{$buyer}%"))
            ->when($this->filters['style'] ?? null, fn ($query, $style) => $query->where('warna', 'like', "%{$style}%"))
            ->when($this->filters['grade'] ?? null, fn ($query, $grade) => $query->where('ukuran', $grade))
            ->when($this->filters['location'] ?? null, fn ($query, $location) => $query->where('location', 'like', "%{$location}%"))
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
            ->get()
            ->map(function ($asset) {
                $totalIn = $asset->total_in ?? 0;
                $totalOut = $asset->total_out ?? 0;

                return [
                    $asset->code,
                    $asset->name,
                    $asset->category,
                    $asset->merk,
                    $asset->warna,
                    $asset->ukuran,
                    $asset->location,
                    $asset->stok_awal ?? 0,
                    $totalIn,
                    $totalOut,
                    $totalIn - $totalOut,
                    $asset->stok_saat_ini ?? 0,
                    $asset->satuan ?? 'pcs',
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Kode Barang',
            'Nama Barang',
            'Kategori',
            'Buyer',
            'Style',
            'Grade',
            'Lokasi',
            'Stok Awal',
            'Total IN',
            'Total OUT',
            'Pergerakan Stok',
            'Stok Saat Ini',
            'Satuan',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 16,
            'B' => 28,
            'C' => 18,
            'D' => 20,
            'E' => 18,
            'F' => 12,
            'G' => 20,
            'H' => 14,
            'I' => 12,
            'J' => 12,
            'K' => 18,
            'L' => 16,
            'M' => 12,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => [
                    'bold' => true,
                    'size' => 16,
                ],
            ],
            6 => [
                'font' => [
                    'bold' => true,
                    'color' => ['rgb' => 'FFFFFF'],
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '1A56DB'],
                ],
            ],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $highestRow = $sheet->getHighestRow();

                $periode = '-';
                if (!empty($this->filters['date_from']) || !empty($this->filters['date_to'])) {
                    $periode = ($this->filters['date_from'] ?? 'Awal') . ' s/d ' . ($this->filters['date_to'] ?? 'Akhir');
                }

                $sheet->mergeCells('A1:M1');
                $sheet->setCellValue('A1', 'REPORT STOK BARANG');

                $sheet->mergeCells('A2:M2');
                $sheet->setCellValue('A2', 'Laporan perhitungan stok berdasarkan data barang, transaksi IN/OUT, dan hasil scan.');

                $sheet->setCellValue('A3', 'Periode');
                $sheet->setCellValue('B3', $periode);

                $sheet->setCellValue('A4', 'Filter');
                $sheet->setCellValue('B4', $this->getFilterText());

                $sheet->setCellValue('L3', 'Tanggal Export');
                $sheet->setCellValue('M3', now()->format('d/m/Y H:i'));

                $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('A2')->getFont()->setItalic(true);
                $sheet->getStyle('A2')->getFont()->getColor()->setRGB('6B7280');

                $sheet->getStyle('A3:M4')->getFont()->setSize(10);
                $sheet->getStyle('A3:A4')->getFont()->setBold(true);
                $sheet->getStyle('L3')->getFont()->setBold(true);

                $sheet->getRowDimension(1)->setRowHeight(26);
                $sheet->getRowDimension(6)->setRowHeight(22);

                $sheet->freezePane('A7');
                $sheet->setAutoFilter('A6:M' . $highestRow);

                $sheet->getStyle('A6:M' . $highestRow)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['rgb' => 'D1D5DB'],
                        ],
                    ],
                ]);

                $sheet->getStyle('A7:M' . $highestRow)->applyFromArray([
                    'alignment' => [
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                ]);

                $sheet->getStyle('H7:L' . $highestRow)
                    ->getNumberFormat()
                    ->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

                $sheet->getStyle('A6:M6')->getAlignment()->setWrapText(true);
                $sheet->getStyle('A7:M' . $highestRow)->getAlignment()->setWrapText(false);

                foreach (range(7, $highestRow) as $row) {
                    if ($row % 2 == 0) {
                        $sheet->getStyle('A' . $row . ':M' . $row)->getFill()
                            ->setFillType(Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setRGB('F9FAFB');
                    }
                }
            },
        ];
    }

    private function getFilterText(): string
    {
        $filters = [];

        if (!empty($this->filters['search'])) {
            $filters[] = 'Pencarian: ' . $this->filters['search'];
        }

        if (!empty($this->filters['buyer'])) {
            $filters[] = 'Buyer: ' . $this->filters['buyer'];
        }

        if (!empty($this->filters['style'])) {
            $filters[] = 'Style: ' . $this->filters['style'];
        }

        if (!empty($this->filters['grade'])) {
            $filters[] = 'Grade: ' . $this->filters['grade'];
        }

        if (!empty($this->filters['location'])) {
            $filters[] = 'Lokasi: ' . $this->filters['location'];
        }

        return count($filters) ? implode(' | ', $filters) : 'Semua data';
    }
}