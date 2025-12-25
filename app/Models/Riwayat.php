<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    protected $table = 'riwayat';

    protected $fillable = [
        'aksi',
        'judul',
        'detail'
    ];

    protected $casts = [
        'detail' => 'array'
    ];
}
