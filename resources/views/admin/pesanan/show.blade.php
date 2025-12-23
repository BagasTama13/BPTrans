@extends('admin.layout')

@section('title', 'Detail Pesanan')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h1 class="text-2xl font-bold text-brand-brown mb-6">Detail Pesanan</h1>

    <div class="bg-white shadow rounded-lg p-6 space-y-4">
        <p><strong>Nama Pembeli:</strong> {{ $pesanan->nama_pembeli }}</p>
        <p><strong>Jenis Produk:</strong> {{ ucfirst($pesanan->jenis_produk) }}</p>
        @if($pesanan->tipe_produk)
            <p><strong>Tipe Produk:</strong> {{ $pesanan->tipe_produk }}</p>
        @endif
        <p><strong>Jumlah:</strong> {{ $pesanan->jumlah }} {{ $pesanan->satuan ?? '' }}</p>
        @if($pesanan->alamat_penjemputan)
            <p><strong>Alamat Penjemputan:</strong> {{ $pesanan->alamat_penjemputan }}</p>
        @endif
        <p><strong>Alamat Tujuan:</strong> {{ $pesanan->alamat_tujuan }}</p>
        <p><strong>Kontak:</strong> {{ $pesanan->kontak }}</p>
        <p><strong>Detail:</strong> {{ $pesanan->detail }}</p>
        @if($pesanan->harga)
            <p><strong>Harga:</strong> Rp {{ number_format($pesanan->harga,0,',','.') }}</p>
        @endif
        <p><strong>Status:</strong> {{ ucfirst($pesanan->status) }}</p>
    </div>

    <div class="mt-6 space-x-2">
        <a href="{{ route('admin.pesanan.index') }}" 
           class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-opacity-90">
            Kembali
        </a>
        <a href="{{ route('admin.pesanan.edit', $pesanan->id) }}" 
           class="px-4 py-2 bg-brand-orange text-white rounded hover:bg-opacity-90">
            Update Status
        </a>
    </div>
</div>
@endsection
