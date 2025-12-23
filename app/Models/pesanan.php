<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    // Tentukan nama tabel secara eksplisit
    protected $table = 'pesanan';

    protected $fillable = [
        'nama_pembeli',
        'jenis_produk',
        'tipe_produk',
        'jumlah',
        'satuan',
        'alamat_penjemputan',
        'alamat_tujuan',
        'kontak',
        'detail',
        'harga',
        'status',
    ];
}
