<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Pesanan;
use App\Models\Riwayat;

// =======================
// PUBLIC LANDING PAGE
// =======================
Route::get('/', function () {
    return view('dashboard');
});

Route::get('/pesan', function () {
    return view('components.pesan');
})->name('pesan.index');

Route::get('/pemesanan', function () {
    return view('components.pemesanan');
})->name('pemesanan.index');

// =======================
// ADMIN AUTH
// =======================
Route::get('/admin/login', fn () => view('admin.login'))->name('admin.login');

Route::post('/admin/login', function () {
    if (request('username') === 'admin' && request('password') === 'admin123') {
        session(['is_admin' => true]);
        return redirect()->route('admin.dashboard');
    }
    return back()->with('error', 'Login gagal');
})->name('admin.login.post');

Route::post('/admin/logout', function () {
    session()->forget('is_admin');
    return redirect()->route('admin.login');
})->name('admin.logout');

// =======================
// ADMIN DASHBOARD
// =======================
Route::get('/admin/dashboard', function () {
    if (!session('is_admin')) return redirect()->route('admin.login');
    return view('admin.dashboard');
})->name('admin.dashboard');

// =======================
// ADMIN CRUD - Etalase
// =======================
Route::get('/admin/etalase', function () {
    if (!session('is_admin')) return redirect()->route('admin.login');
    $products = Product::all(); // tetap Collection walau kosong
    return view('admin.etalase.index', compact('products'));
})->name('admin.etalase');

Route::get('/admin/etalase/create', function () {
    if (!session('is_admin')) return redirect()->route('admin.login');
    return view('admin.etalase.create');
})->name('admin.etalase.create');

Route::post('/admin/etalase/store', function (Request $request) {
    if (!session('is_admin')) return redirect()->route('admin.login');

    $request->validate([
        'nama_produk' => 'required|string',
        'jenis_produk' => 'required|string',
        'tipe_produk' => 'nullable|string',
        'harga' => 'required|numeric',
        'satuan' => 'nullable|string',
    ]);

    Product::create($request->only('nama_produk','jenis_produk','tipe_produk','harga','satuan'));

    return redirect()->route('admin.etalase')->with('success', 'Produk berhasil ditambahkan!');
})->name('admin.etalase.store');

Route::get('/admin/etalase/{id}/edit', function ($id) {
    if (!session('is_admin')) return redirect()->route('admin.login');

    $product = Product::find($id);
    if (!$product) {
        return redirect()->route('admin.etalase')->with('error', 'Produk tidak ditemukan');
    }
    return view('admin.etalase.edit', compact('product'));
})->name('admin.etalase.edit');

Route::post('/admin/etalase/{id}/update', function (Request $request, $id) {
    if (!session('is_admin')) return redirect()->route('admin.login');

    $product = Product::find($id);
    if (!$product) return redirect()->route('admin.etalase')->with('error', 'Produk tidak ditemukan');

    $request->validate([
        'nama_produk' => 'required|string',
        'jenis_produk' => 'required|string',
        'tipe_produk' => 'nullable|string',
        'harga' => 'required|numeric',
        'satuan' => 'nullable|string',
    ]);

    $product->update($request->only('nama_produk','jenis_produk','tipe_produk','harga','satuan'));

    return redirect()->route('admin.etalase')->with('success', 'Produk berhasil diupdate!');
})->name('admin.etalase.update');

Route::post('/admin/etalase/{id}/delete', function ($id) {
    if (!session('is_admin')) return redirect()->route('admin.login');

    $product = Product::find($id);
    if ($product) $product->delete();

    return redirect()->route('admin.etalase')->with('success', 'Produk berhasil dihapus!');
})->name('admin.etalase.delete');

// =======================
// ADMIN CRUD - Pesanan
// =======================
Route::get('/admin/pesanan', function () {
    if (!session('is_admin')) return redirect()->route('admin.login');

    $pesanan = Pesanan::all(); // tetap Collection walau kosong
    return view('admin.pesanan.index', compact('pesanan'));
})->name('admin.pesanan');

Route::get('/admin/pesanan/{id}', function ($id) {
    if (!session('is_admin')) return redirect()->route('admin.login');

    $pesanan = Pesanan::find($id);
    if (!$pesanan) return redirect()->route('admin.pesanan')->with('error', 'Pesanan tidak ditemukan');
    return view('admin.pesanan.show', compact('pesanan'));
})->name('admin.pesanan.show');

Route::post('/admin/pesanan/{id}/update', function (Request $request, $id) {
    if (!session('is_admin')) return redirect()->route('admin.login');

    $pesanan = Pesanan::find($id);
    if (!$pesanan) return redirect()->route('admin.pesanan')->with('error', 'Pesanan tidak ditemukan');

    $request->validate([
        'status' => 'required|string'
    ]);

    $pesanan->update(['status' => $request->status]);

    return redirect()->route('admin.pesanan')->with('success', 'Status pesanan berhasil diupdate!');
})->name('admin.pesanan.update');

// =======================
// ADMIN CRUD - Riwayat
// =======================
Route::get('/admin/riwayat', function () {
    if (!session('is_admin')) return redirect()->route('admin.login');

    $riwayat = Riwayat::orderBy('created_at', 'desc')->get(); // tetap Collection walau kosong
    return view('admin.riwayat.index', compact('riwayat'));
})->name('admin.riwayat');
