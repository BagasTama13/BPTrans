<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pembeli');
            $table->string('produk'); // kayu, serbuk, batu_bata, genteng, pengiriman
            $table->string('tipe_batu_bata')->nullable(); // Standar, Premium
            $table->string('jenis_genteng')->nullable(); // Mantili, Super, Sokka, Flat, Premium
            $table->string('jenis_pengiriman')->nullable(); // input bebas
            $table->integer('jumlah')->nullable();
            $table->string('satuan')->nullable(); // /bak, /pcs
            $table->string('alamat');
            $table->text('catatan')->nullable();
            $table->string('whatsapp');
            $table->enum('status', ['pending', 'diterima', 'ditolak'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
