@extends('admin.layout')

@section('content')
<div class="p-8 max-w-5xl mx-auto">
    <h1 class="text-2xl font-semibold mb-6">Riwayat Aktivitas Admin</h1>

    <div class="space-y-4">
        @forelse($riwayat as $item)

            @php
                $namaProduk = is_array($item->detail) && isset($item->detail['produk'])
                    ? $item->detail['produk']
                    : $item->judul;

                $waktu = $item->created_at->format('d-m-Y H:i');
            @endphp

            <div class="flex gap-4 items-start p-4 bg-gray-50 rounded-lg">
                <!-- Icon -->
                <div class="mt-1">
                    @if(str_contains(strtolower($item->aksi), 'tambah'))
                        <span class="text-green-600">➕</span>
                    @elseif(str_contains(strtolower($item->aksi), 'update'))
                        <span class="text-blue-600">✏️</span>
                    @elseif(str_contains(strtolower($item->aksi), 'hapus'))
                        <span class="text-red-600">🗑️</span>
                    @else
                        <span class="text-gray-500">📌</span>
                    @endif
                </div>

                <!-- Content -->
                <div class="flex-1">
                    @if(str_contains(strtolower($item->aksi), 'tambah'))
                        <p>
                            Admin <strong>menambahkan</strong> produk
                            <strong>{{ $namaProduk }}</strong>
                        </p>

                    @elseif(str_contains(strtolower($item->aksi), 'update'))
                        <p>
                            Admin <strong>memperbarui</strong> produk
                            <strong>{{ $namaProduk }}</strong>
                        </p>

                    @elseif(str_contains(strtolower($item->aksi), 'hapus'))
                        <p>
                            Admin <strong>menghapus</strong> produk
                            <strong>{{ $namaProduk }}</strong>
                        </p>

                    @elseif(str_contains(strtolower($item->aksi), 'pesanan'))
                        <p>
                            Admin <strong>memperbarui</strong> pesanan
                            <strong>{{ $item->judul }}</strong>
                        </p>

                    @else
                        <p>{{ $item->aksi }} - {{ $item->judul }}</p>
                    @endif

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
