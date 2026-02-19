<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    // Tentukan nama tabel secara eksplisit
    protected $table = 'pesanan';

    // Field yang bisa diisi mass-assignment
        protected $fillable = [
            'nama_pembeli',
            'produk',
            'tipe_batu_bata',
            'jenis_genteng',
            'tipe_produk',
            'jumlah',
            'satuan',
            'alamat',
            'alamat_penjemputan', // tambahkan ini
            'catatan',
            'whatsapp',
            'harga',
            'status',
        ];

}
