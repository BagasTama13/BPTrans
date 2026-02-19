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
    return view('dashboard');
})->name('dashboard');

// Halaman pilih produk
Route::get('/pesan', function () {
    $produkList = Product::all();
    return view('components.pesan', compact('produkList'));
})->name('pesan.index');
//pengambilan data untuk halaman pesan
Route::get('/pesan', function () {

    $produkList = Product::all()
        ->groupBy('nama_produk')
        ->map(function ($items) {
            return [
                'nama_produk' => $items->first()->nama_produk,
                'harga_min'  => $items->min('harga'),
                'harga_max'  => $items->max('harga'),
                'image'      => $items->first()->image,
            ];
        });

    return view('components.pesan', compact('produkList'));
})->name('pesan.index');


/*
|--------------------------------------------------------------------------
| Form Pemesanan
|--------------------------------------------------------------------------
*/
Route::get('/pemesanan', function (Request $request) {

    $produkList = Product::all();
    $namaProduk = $request->query('produk');

    // Ambil tipe produk sesuai produk yang dipilih
    $tipeProduk = [];
    if ($namaProduk) {
        $tipeProduk = Product::where('nama_produk', $namaProduk)
            ->pluck('tipe_produk');
    }

    return view('components.pemesanan', compact(
        'produkList',
        'namaProduk',
        'tipeProduk'
    ));

})->name('pemesanan.index');

/*
|--------------------------------------------------------------------------
| Simpan Pesanan
|--------------------------------------------------------------------------
*/
Route::post('/pemesanan', function (Request $request) {

    $request->validate([
        'nama_pembeli'        => 'required|string|max:255',
        'produk'              => 'required|string|max:255',
        'tipe'                => 'nullable|string|max:255',
        'jumlah'              => 'nullable|integer|min:1',
        'alamat'              => 'required|string|max:255',
        'alamat_penjemputan'  => 'nullable|string|max:255',
        'catatan'             => 'nullable|string',
        'whatsapp'            => 'required|string|max:20',
    ]);

    $produk = Product::where('nama_produk', $request->produk)->firstOrFail();

    // Tentukan satuan
    $satuan = null;
    if ($request->jumlah) {
        $satuan = match ($produk->nama_produk) {
            'kayu' => 'bak',
            default => 'pcs',
        };
    }

    // Default NULL untuk kolom tipe
    $tipeBatuBata   = null;
    $jenisGenteng   = null;
    $jenisPengiriman = null;

    // Mapping tipe berdasarkan produk
    if ($produk->nama_produk === 'batu bata') {
        $tipeBatuBata = $request->tipe;
    } elseif ($produk->nama_produk === 'genteng') {
        $jenisGenteng = $request->tipe;
    } elseif ($produk->nama_produk === 'pengiriman') {
        $jenisPengiriman = $request->tipe;
    }

    Pesanan::create([
        'nama_pembeli'        => $request->nama_pembeli,
        'produk'              => $produk->nama_produk,
        'tipe_batu_bata'      => $tipeBatuBata,
        'jenis_genteng'       => $jenisGenteng,
        'jenis_pengiriman'    => $jenisPengiriman,
        'jumlah'              => $request->jumlah,
        'satuan'              => $satuan,
        'alamat'              => $request->alamat,
        'alamat_penjemputan'  => $request->alamat_penjemputan,
        'catatan'             => $request->catatan,
        'whatsapp'            => $request->whatsapp,
        'status'              => 'pending',
    ]);

    return redirect()->route('pemesanan.index')
        ->with('success', 'Pesanan berhasil dikirim!');
})->name('pemesanan.store');


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

Route::post('/admin/logout', function () {
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

Route::get('/admin/dashboard', function (Request $request) {

    if (!session('is_admin')) {
        return redirect()->route('admin.login');
    }

    $status = $request->query('status');

    // Ringkasan status
    $totalPending  = Pesanan::where('status', 'pending')->count();
    $totalDiterima = Pesanan::where('status', 'diterima')->count();
    $totalDitolak  = Pesanan::where('status', 'ditolak')->count();

    // List pesanan hanya jika klik card
    $pesanans = null;

    if (in_array($status, ['pending', 'diterima', 'ditolak'])) {
        $pesanans = Pesanan::where('status', $status)
            ->latest()
            ->get();
    }

    return view('admin.dashboard', compact(
        'totalPending',
        'totalDiterima',
        'totalDitolak',
        'pesanans',
        'status'
    ));
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


/*
|--------------------------------------------------------------------------
| LIST PESANAN (HANYA YANG SUDAH DITERIMA)
|--------------------------------------------------------------------------
*/
Route::get('/admin/pesanan', function () {
    if (!session('is_admin')) {
        return redirect()->route('admin.login');
    }

    $pesanan = Pesanan::where('status', 'diterima')
        ->latest()
        ->get();

    return view('admin.pesanan.index', compact('pesanan'));
})->name('admin.pesanan');


/*
|--------------------------------------------------------------------------
| LIST PESANAN PENDING (UNTUK DIPUTUSKAN ADMIN)
|--------------------------------------------------------------------------
*/
Route::get('/admin/pesanan/pending', function () {
    if (!session('is_admin')) {
        return redirect()->route('admin.login');
    }

    $pesanan = Pesanan::where('status', 'pending')
        ->latest()
        ->get();

    return view('admin.pesanan.pending', compact('pesanan'));
})->name('admin.pesanan.pending');


/*
|--------------------------------------------------------------------------
| TERIMA PESANAN
|--------------------------------------------------------------------------
*/
Route::put('/admin/pesanan/{pesanan}/terima', function (Pesanan $pesanan) {

    if (!session('is_admin')) {
        return redirect()->route('admin.login');
    }

    // proteksi status
    if ($pesanan->status !== 'pending') {
        abort(403, 'Pesanan tidak valid');
    }

    // update status pesanan
    $pesanan->update([
        'status' => 'diterima',
        'status_pengiriman' => 'antrian',
    ]);

    // simpan ke riwayat
    Riwayat::create([
        'aksi'   => 'Pesanan Diterima',
        'judul' => $pesanan->nama_pembeli,
        'detail'=> json_encode([
            'pesanan_id' => $pesanan->id,
            'produk'     => $pesanan->produk,
            'status'     => 'diterima',
        ]),
    ]);

    // 🔥 REDIRECT LANGSUNG KE HALAMAN PESANAN
    return redirect('/admin/pesanan')
        ->with('success', 'Pesanan berhasil diterima');

})->name('admin.pesanan.terima');


/*
|--------------------------------------------------------------------------
| TOLAK PESANAN
|--------------------------------------------------------------------------
*/
Route::put('/admin/pesanan/{pesanan}/tolak', function (Pesanan $pesanan) {

    if (!session('is_admin')) {
        return redirect()->route('admin.login');
    }

    if ($pesanan->status !== 'pending') {
        abort(403, 'Pesanan tidak valid');
    }

    // update status
    $pesanan->update([
        'status' => 'ditolak',
    ]);

    // simpan ke riwayat
    Riwayat::create([
        'aksi'   => 'Pesanan Ditolak',
        'judul' => $pesanan->nama_pembeli,
        'detail'=> json_encode([
            'pesanan_id' => $pesanan->id,
            'produk'     => $pesanan->produk,
            'status'     => 'ditolak',
        ]),
    ]);

    // 🔥 REDIRECT LANGSUNG KE RIWAYAT
    return redirect('/admin/riwayat')
        ->with('success', 'Pesanan berhasil ditolak');

})->name('admin.pesanan.tolak');

/*
|--------------------------------------------------------------------------
| FORM EDIT STATUS PENGIRIMAN
|--------------------------------------------------------------------------
*/
Route::get('/admin/pesanan/{pesanan}/edit', function (Pesanan $pesanan) {
    if (!session('is_admin')) {
        return redirect()->route('admin.login');
    }

    if ($pesanan->status !== 'diterima') {
        abort(403);
    }

    return view('admin.pesanan.edit', compact('pesanan'));
})->name('admin.pesanan.edit');


/*
|--------------------------------------------------------------------------
| UPDATE STATUS PENGIRIMAN
|--------------------------------------------------------------------------
*/
Route::put('/admin/pesanan/{pesanan}', function (Request $request, Pesanan $pesanan) {
    if (!session('is_admin')) {
        return redirect()->route('admin.login');
    }

    // Pastikan hanya pesanan diterima yang bisa diubah status pengirimannya
    if ($pesanan->status !== 'diterima') {
        abort(403);
    }

    $request->validate([
        'status_pengiriman' => 'required|in:antrian,diproses,dikirim,terkirim',
    ]);

    // Simpan ke database
    $pesanan->update([
        'status_pengiriman' => $request->status_pengiriman,
    ]);

    // Catat riwayat
    Riwayat::create([
        'aksi'  => 'update pengiriman',
        'judul' => $pesanan->nama_pembeli,
        'detail'=> [
            'pesanan_id'         => $pesanan->id,
            'status_pengiriman'  => $request->status_pengiriman,
        ],
    ]);

    return redirect()->route('admin.pesanan')
        ->with('success', 'Status pengiriman diperbarui');
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
