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
        'penanggungjawab',
        'tanggal_masuk',
        'harga',
        ];

    protected $primaryKey = 'code';
    public $incrementing = false;
    protected $keyType = 'string';

    public function getRouteKeyName(){
    return 'code';}
}


