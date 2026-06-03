<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScanBatch extends Model
{
    protected $fillable = [
        'batch_code',
        'user_id',
        'type',
        'note',
        'scan_date',
    ];

    protected $casts = [
        'scan_date' => 'datetime',
    ];

    public function transactions()
    {
        return $this->hasMany(AssetTransaction::class, 'batch_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}