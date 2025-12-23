@extends('admin.layout')

@section('title', 'Daftar Pesanan')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h1 class="text-2xl font-bold text-brand-brown mb-6">Daftar Pesanan</h1>

    <table class="min-w-full bg-white shadow rounded-lg overflow-hidden">
        <thead class="bg-brand-brown text-white">
            <tr>
                <th class="py-2 px-4 text-left">No</th>
                <th class="py-2 px-4 text-left">Nama Pembeli</th>
                <th class="py-2 px-4 text-left">Jenis Produk</th>
                <th class="py-2 px-4 text-left">Jumlah</th>
                <th class="py-2 px-4 text-left">Status</th>
                <th class="py-2 px-4 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pesanan as $item)
            <tr class="border-b">
                <td class="py-2 px-4">{{ $loop->iteration }}</td>
                <td class="py-2 px-4">{{ $item->nama_pembeli }}</td>
                <td class="py-2 px-4">{{ ucfirst($item->jenis_produk) }}</td>
                <td class="py-2 px-4">{{ $item->jumlah }} {{ $item->satuan ?? '' }}</td>
                <td class="py-2 px-4">
                    <span class="px-2 py-1 rounded text-white 
                        @if($item->status == 'proses') bg-yellow-500
                        @elseif($item->status == 'pengiriman') bg-blue-500
                        @elseif($item->status == 'terkirim') bg-green-500
                        @elseif($item->status == 'ditolak') bg-red-500
                        @endif">
                        {{ ucfirst($item->status) }}
                    </span>
                </td>
                <td class="py-2 px-4 space-x-2">
                    <a href="{{ route('admin.pesanan.show', $item->id) }}" 
                       class="px-2 py-1 bg-brand-brown text-white rounded hover:bg-opacity-90">
                        Detail
                    </a>
                    <a href="{{ route('admin.pesanan.edit', $item->id) }}" 
                       class="px-2 py-1 bg-brand-orange text-white rounded hover:bg-opacity-90">
                        Update Status
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="py-4 text-center text-gray-500">Belum ada pesanan</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
