<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {

            // Kolom utama
            if (!Schema::hasColumn('products', 'nama_produk')) {
                $table->string('nama_produk')->after('id');
            }

            if (!Schema::hasColumn('products', 'tipe_produk')) {
                $table->string('tipe_produk')->nullable()->after('nama_produk');
            }

            if (!Schema::hasColumn('products', 'harga')) {
                $table->decimal('harga', 15, 2)->after('tipe_produk');
            }

            if (!Schema::hasColumn('products', 'image')) {
                $table->string('image')->after('harga');
            }

        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'nama_produk',
                'tipe_produk',
                'harga',
                'image'
            ]);
        });
    }
};
