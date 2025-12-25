<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Pesanan;
use App\Models\Riwayat;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

// Beranda
Route::get('/', function () {
    return view('beranda');
})->name('home');

// Etalase publik
Route::get('/etalase', function () {
    $products = Product::latest()->get();
    return view('etalase', compact('products'));
})->name('etalase');

// Form Pesanan
Route::get('/pesanan', function () {
    return view('pesanan');
})->name('pesanan');

// Simpan Pesanan
Route::post('/pesanan/store', function (Request $request) {
    $request->validate([
        'nama_pembeli' => 'required|string',
        'no_hp'        => 'required|string',
        'alamat'       => 'required|string',
        'jenis_produk' => 'required|string',
        'tipe_produk'  => 'nullable|string',
        'jumlah'       => 'required|numeric',
    ]);

    $pesanan = Pesanan::create([
        'nama_pembeli' => $request->nama_pembeli,
        'no_hp'        => $request->no_hp,
        'alamat'       => $request->alamat,
        'jenis_produk' => $request->jenis_produk,
        'tipe_produk'  => $request->tipe_produk,
        'jumlah'       => $request->jumlah,
        'status'       => 'proses',
    ]);

    Riwayat::create([
        'aksi'  => 'Pesanan Masuk',
        'judul' => $pesanan->nama_pembeli,
        'detail'=> [
            'keterangan' => 'Pesanan baru dibuat',
            'pesanan_id' => $pesanan->id,
        ],
    ]);

    return back()->with('success', 'Pesanan berhasil dikirim!');
})->name('pesanan.store');

/*
|--------------------------------------------------------------------------
| ADMIN AUTH
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

Route::post('/admin/login', function (Request $request) {
    if ($request->username === 'admin' && $request->password === 'admin123') {
        session(['is_admin' => true]);
        return redirect()->route('admin.dashboard');
    }

    return back()->with('error', 'Login gagal');
})->name('admin.login.process');

Route::get('/admin/logout', function () {
    session()->forget('is_admin');
    return redirect()->route('admin.login');
})->name('admin.logout');

/*
|--------------------------------------------------------------------------
| ADMIN DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/admin/dashboard', function () {
    if (!session('is_admin')) {
        return redirect()->route('admin.login');
    }

    return view('admin.dashboard');
})->name('admin.dashboard');

/*
|--------------------------------------------------------------------------
| ADMIN ETALASE (PRODUCT)
|--------------------------------------------------------------------------
*/

// List Produk
Route::get('/admin/etalase', function () {
    if (!session('is_admin')) {
        return redirect()->route('admin.login');
    }

    $products = Product::latest()->get();
    return view('admin.etalase.index', compact('products'));
})->name('admin.etalase');

// Form Tambah Produk
Route::get('/admin/etalase/create', function () {
    if (!session('is_admin')) {
        return redirect()->route('admin.login');
    }

    return view('admin.etalase.create');
})->name('admin.etalase.create');

// Simpan Produk
Route::post('/admin/etalase/store', function (Request $request) {
    if (!session('is_admin')) {
        return redirect()->route('admin.login');
    }

    $request->validate([
        'nama_produk' => 'required|string',
        'tipe_produk' => 'nullable|string',
        'harga'       => 'required|numeric',
        'image'       => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $imagePath = $request->file('image')->store('products', 'public');

    $product = Product::create([
        'nama_produk' => $request->nama_produk,
        'tipe_produk' => $request->tipe_produk,
        'harga'       => $request->harga,
        'image'       => $imagePath,
    ]);

        Riwayat::create([
            'aksi'  => 'Tambah Produk',
            'judul' => $product->nama_produk,
            'detail' => [
                'nama_produk' => $product->nama_produk,
                'tipe_produk' => $product->tipe_produk,
                'harga'       => $product->harga,
                'aksi'        => 'tambah',
            ],
        ]);



    return redirect()->route('admin.etalase')
        ->with('success', 'Produk berhasil ditambahkan');
})->name('admin.etalase.store');

// Form Edit Produk
Route::get('/admin/etalase/{product}/edit', function (Product $product) {
    if (!session('is_admin')) {
        return redirect()->route('admin.login');
    }

    return view('admin.etalase.edit', compact('product'));
})->name('admin.etalase.edit');

// Update Produk
Route::put('/admin/etalase/{product}', function (Request $request, Product $product) {
    if (!session('is_admin')) {
        return redirect()->route('admin.login');
    }

    $request->validate([
        'nama_produk' => 'required|string',
        'tipe_produk' => 'nullable|string',
        'harga'       => 'required|numeric',
        'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $product->image = $request->file('image')->store('products', 'public');
    }

    $product->update([
        'nama_produk' => $request->nama_produk,
        'tipe_produk' => $request->tipe_produk,
        'harga'       => $request->harga,
    ]);

        Riwayat::create([
            'aksi'  => 'Update Produk',
            'judul' => $product->nama_produk,
            'detail' => [
                'nama_produk' => $product->nama_produk,
                'tipe_produk' => $product->tipe_produk,
                'harga'       => $product->harga,
                'aksi'        => 'update',
            ],
        ]);


    return redirect()->route('admin.etalase')
        ->with('success', 'Produk berhasil diperbarui');
})->name('admin.etalase.update');

// Hapus Produk
Route::delete('/admin/etalase/{product}', function (Product $product) {
    if (!session('is_admin')) {
        return redirect()->route('admin.login');
    }

        Riwayat::create([
            'aksi'  => 'Hapus Produk',
            'judul' => $product->nama_produk,
            'detail' => [
                'nama_produk' => $product->nama_produk,
                'aksi'        => 'hapus',
            ],
        ]);


    $product->delete();

    return back()->with('success', 'Produk berhasil dihapus');
})->name('admin.etalase.destroy');

/*
|--------------------------------------------------------------------------
| ADMIN PESANAN
|--------------------------------------------------------------------------
*/

Route::get('/admin/pesanan', function () {
    if (!session('is_admin')) {
        return redirect()->route('admin.login');
    }

    $pesanan = Pesanan::latest()->get();
    return view('admin.pesanan.index', compact('pesanan'));
})->name('admin.pesanan');

// Form Edit Pesanan
Route::get('/admin/pesanan/{pesanan}/edit', function (Pesanan $pesanan) {
    if (!session('is_admin')) {
        return redirect()->route('admin.login');
    }

    return view('admin.pesanan.edit', compact('pesanan'));
})->name('admin.pesanan.edit');

// Update Status Pesanan
Route::put('/admin/pesanan/{pesanan}', function (Request $request, Pesanan $pesanan) {
    if (!session('is_admin')) {
        return redirect()->route('admin.login');
    }

    $request->validate([
        'status' => 'required|in:proses,pengiriman,terkirim,ditolak',
    ]);

    $pesanan->update([
        'status' => $request->status,
    ]);

    Riwayat::create([
        'aksi'  => 'Update Pesanan',
        'judul' => $pesanan->nama_pembeli,
        'detail'=> [
            'keterangan' => 'Update status pesanan',
            'pesanan_id' => $pesanan->id,
            'status'     => $request->status,
        ],
    ]);

    return redirect()->route('admin.pesanan')
        ->with('success', 'Status pesanan diperbarui');
})->name('admin.pesanan.update');

/*
|--------------------------------------------------------------------------
| ADMIN RIWAYAT
|--------------------------------------------------------------------------
*/

Route::get('/admin/riwayat', function () {
    if (!session('is_admin')) {
        return redirect()->route('admin.login');
    }

    $riwayat = Riwayat::latest()->get();
    return view('admin.riwayat.index', compact('riwayat'));
})->name('admin.riwayat');
