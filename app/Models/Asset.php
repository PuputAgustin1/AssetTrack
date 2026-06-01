<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
        'code',
        'name',
        'category',
        'location',
        'condition',
        'merk',
        'warna',
        'ukuran',
        'satuan',
        'penanggungjawab',
        'tanggal_masuk',
        'harga',
        'stok_awal',
        'stok_saat_ini',

        ];

    protected $primaryKey = 'code';
    public $incrementing = false;
    protected $keyType = 'string';

    public function getRouteKeyName()
    {
        return 'code';
    }

     public function transactions()
    {
        return $this->hasMany(AssetTransaction::class, 'asset_code', 'code');
    }

}


