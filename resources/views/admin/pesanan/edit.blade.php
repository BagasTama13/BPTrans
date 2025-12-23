@extends('admin.layout')

@section('title', 'Update Status Pesanan')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h1 class="text-2xl font-bold text-brand-brown mb-6">Update Status Pesanan</h1>

    <form action="{{ route('admin.pesanan.update', $pesanan->id) }}" method="POST" class="bg-white shadow rounded-lg p-6 space-y-4">
        @csrf
        @method('PUT')

        <p><strong>Nama Pembeli:</strong> {{ $pesanan->nama_pembeli }}</p>
        <p><strong>Jenis Produk:</strong> {{ ucfirst($pesanan->jenis_produk) }}</p>
        @if($pesanan->tipe_produk)
            <p><strong>Tipe Produk:</strong> {{ $pesanan->tipe_produk }}</p>
        @endif

        <div>
            <label class="block mb-1 font-semibold">Status</label>
            <select name="status" class="w-full border rounded px-3 py-2">
                <option value="proses" {{ $pesanan->status=='proses'?'selected':'' }}>Proses</option>
                <option value="pengiriman" {{ $pesanan->status=='pengiriman'?'selected':'' }}>Pengiriman</option>
                <option value="terkirim" {{ $pesanan->status=='terkirim'?'selected':'' }}>Terkirim</option>
                <option value="ditolak" {{ $pesanan->status=='ditolak'?'selected':'' }}>Ditolak</option>
            </select>
        </div>

        <button type="submit" class="px-4 py-2 bg-brand-brown text-white rounded hover:bg-opacity-90">
            Simpan
        </button>
    </form>
</div>
@endsection
