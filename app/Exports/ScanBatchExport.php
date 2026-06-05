<?php

namespace App\Exports;

use App\Models\ScanBatch;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ScanBatchExport implements WithMultipleSheets
{
    protected $batch;

    public function __construct(ScanBatch $batch)
    {
        $this->batch = $batch;
    }

    public function sheets(): array
    {
        return [
            new ScanBatchDetailSheet($this->batch),
            new ScanBatchRecapSheet($this->batch),
        ];
    }
}