<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesanan;

class PesananController extends Controller
{
    // Tampilkan semua pesanan
    public function index()
    {
        $pesanan = Pesanan::latest()->get();
        return view('admin.pesanan.index', compact('pesanan'));
    }

    // Tampilkan detail pesanan
    public function show($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        return view('admin.pesanan.show', compact('pesanan'));
    }

    // Form edit status pesanan
    public function edit($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        return view('admin.pesanan.edit', compact('pesanan'));
    }

    // Update status pesanan
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:proses,pengiriman,terkirim,ditolak',
        ]);

        $pesanan = Pesanan::findOrFail($id);
        $pesanan->status = $request->status;
        $pesanan->save();

        return redirect()->route('admin.pesanan.index')->with('success', 'Status pesanan berhasil diupdate.');
    }
}
