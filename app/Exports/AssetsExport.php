<?php

namespace App\Exports;

use App\Models\Asset;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AssetsExport implements FromCollection, WithHeadings
{
    protected $filters;
    protected $columns;

    public function __construct($filters = [], $columns = [])
    {
        $this->filters = $filters;

        $this->columns = !empty($columns) ? $columns : [
            'code',
            'name',
            'category',
            'location',
            'condition',
            'merk',
            'penanggungjawab',
            'tanggal_masuk',
            'harga',
        ];
    }

    public function collection()
    {
        $query = Asset::query();

        if (!empty($this->filters['category'])) {
            $query->where('category', $this->filters['category']);
        }

        if (!empty($this->filters['condition'])) {
            $query->where('condition', $this->filters['condition']);
        }

        if (!empty($this->filters['location'])) {
            $query->where('location', 'like', '%' . $this->filters['location'] . '%');
        }

        if (!empty($this->filters['date_from'])) {
            $query->whereDate('tanggal_masuk', '>=', $this->filters['date_from']);
        }

        if (!empty($this->filters['date_to'])) {
            $query->whereDate('tanggal_masuk', '<=', $this->filters['date_to']);
        }

        return $query->select($this->columns)->get();
    }

    public function headings(): array
    {
        $labels = [
            'code' => 'Kode Barang',
            'name' => 'Nama Aset',
            'category' => 'Kategori',
            'location' => 'Lokasi',
            'condition' => 'Kondisi',
            'merk' => 'Merk',
            'penanggungjawab' => 'Penanggung Jawab',
            'tanggal_masuk' => 'Tanggal Masuk',
            'harga' => 'Harga',
        ];

        return collect($this->columns)
            ->map(fn ($column) => $labels[$column] ?? $column)
            ->toArray();
    }
}