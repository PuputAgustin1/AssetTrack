<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetTransaction extends Model
{
    protected $fillable = [
        'batch_id',
        'asset_code',
        'user_id',
        'type',
        'quantity',
        'note',
        'transaction_date',
    ];

    protected $casts = [
        'transaction_date' => 'datetime',
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_code', 'code');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function batch()
    {
        return $this->belongsTo(ScanBatch::class, 'batch_id');
    }
}