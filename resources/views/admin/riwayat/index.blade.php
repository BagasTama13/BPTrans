@extends('admin.layout')

@section('title', 'Riwayat Aktivitas')

@section('content')
<div class="p-8 max-w-5xl mx-auto">

    <h1 class="text-2xl font-semibold mb-6">
        Riwayat Aktivitas
    </h1>

    <div class="space-y-4">

        @forelse($riwayat as $item)

            @php
                $aksi   = strtolower($item->aksi);
                $waktu  = $item->created_at->format('d-m-Y H:i');
            @endphp

            <div class="flex gap-4 items-start p-4 bg-gray-50 rounded-lg shadow-sm">

                {{-- ICON --}}
                <div class="mt-1 text-lg">
                    @if(str_contains($aksi, 'tambah'))
                        <span class="text-green-600">➕</span>
                    @elseif(str_contains($aksi, 'update produk'))
                        <span class="text-blue-600">✏️</span>
                    @elseif(str_contains($aksi, 'hapus'))
                        <span class="text-red-600">🗑️</span>
                    @elseif(str_contains($aksi, 'pesanan diterima'))
                        <span class="text-green-600">✅</span>
                    @elseif(str_contains($aksi, 'pesanan ditolak'))
                        <span class="text-red-600">❌</span>
                    @elseif(str_contains($aksi, 'status pengiriman'))
                        <span class="text-blue-600">🚚</span>
                    @else
                        <span class="text-gray-500">📌</span>
                    @endif
                </div>

                {{-- CONTENT --}}
                <div class="flex-1 text-sm">

                    {{-- UPDATE STATUS PENGIRIMAN --}}
                    @if(str_contains($aksi, 'status pengiriman'))
                        @php
                            $status = $item->detail['status_pengiriman'] ?? '-';
                        @endphp
                        <p>
                            Pesanan <strong>{{ $item->judul }}</strong>
                            sedang
                            <strong class="capitalize text-blue-600">{{ $status }}</strong>
                        </p>

                    {{-- TAMBAH PRODUK --}}
                    @elseif(str_contains($aksi, 'tambah produk'))
                        <p>
                            Produk <strong>{{ $item->judul }}</strong> berhasil ditambahkan
                        </p>

                    {{-- UPDATE PRODUK --}}
                    @elseif(str_contains($aksi, 'update produk'))
                        <p>
                            Produk <strong>{{ $item->judul }}</strong> diperbarui
                        </p>

                    {{-- HAPUS PRODUK --}}
                    @elseif(str_contains($aksi, 'hapus produk'))
                        <p>
                            Produk <strong>{{ $item->judul }}</strong> dihapus
                        </p>

                    {{-- PESANAN DITERIMA --}}
                    @elseif(str_contains($aksi, 'pesanan diterima'))
                        <p>
                            Pesanan <strong>{{ $item->judul }}</strong>
                            <span class="text-green-600 font-semibold">diterima</span>
                        </p>

                    {{-- PESANAN DITOLAK --}}
                    @elseif(str_contains($aksi, 'pesanan ditolak'))
                        <p>
                            Pesanan <strong>{{ $item->judul }}</strong>
                            <span class="text-red-600 font-semibold">ditolak</span>
                        </p>

                    {{-- DEFAULT --}}
                    @else
                        <p>
                            {{ $item->aksi }} - {{ $item->judul }}
                        </p>
                    @endif

                    {{-- WAKTU --}}
                    <p class="text-xs text-gray-500 mt-1">
                        {{ $waktu }}
                    </p>

                </div>
            </div>

        @empty
            <div class="text-center text-gray-500 py-10">
                Belum ada riwayat aktivitas
            </div>
        @endforelse

    </div>
</div>
@endsection
