@extends('admin.layout')

@section('content')
<div class="p-6 space-y-6">

    {{-- JUDUL --}}
    <h1 class="text-2xl font-bold text-gray-800">
        Dashboard Pesanan
    </h1>

    {{-- CARD RINGKASAN --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        {{-- PENDING (TETAP DI DASHBOARD) --}}
        <a href="{{ route('admin.dashboard', ['status' => 'pending']) }}"
           class="bg-yellow-100 border border-yellow-300 rounded-xl p-6 hover:shadow transition">
            <p class="text-sm text-yellow-800">Pending</p>
            <p class="text-3xl font-bold text-yellow-900">
                {{ $totalPending }}
            </p>
            <p class="text-xs text-yellow-700 mt-2">
                Menunggu keputusan
            </p>
        </a>

        {{-- DITERIMA (LANGSUNG KE PESANAN) --}}
        <a href="{{ route('admin.pesanan') }}"
           class="bg-green-100 border border-green-300 rounded-xl p-6 hover:shadow transition">
            <p class="text-sm text-green-800">Diterima</p>
            <p class="text-3xl font-bold text-green-900">
                {{ $totalDiterima }}
            </p>
            <p class="text-xs text-green-700 mt-2">
                Kelola pengiriman
            </p>
        </a>

        {{-- DITOLAK (LANGSUNG KE RIWAYAT) --}}
        <a href="{{ route('admin.riwayat') }}"
           class="bg-red-100 border border-red-300 rounded-xl p-6 hover:shadow transition">
            <p class="text-sm text-red-800">Ditolak</p>
            <p class="text-3xl font-bold text-red-900">
                {{ $totalDitolak }}
            </p>
            <p class="text-xs text-red-700 mt-2">
                Lihat riwayat
            </p>
        </a>

    </div>

    {{-- LIST PENDING (UNTUK KEPUTUSAN ADMIN) --}}
    @isset($pesanans)
    <div class="bg-white rounded-xl shadow p-6">

        <h2 class="text-lg font-semibold mb-4">
            Pesanan Pending
        </h2>

        @if($pesanans->isEmpty())
            <p class="text-gray-500 text-sm">
                Tidak ada pesanan pending.
            </p>
        @else
            <div class="overflow-x-auto">
                <table class="w-full border text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-2 border">Nama</th>
                            <th class="p-2 border">Produk</th>
                            <th class="p-2 border">Jumlah</th>
                            <th class="p-2 border">WhatsApp</th>
                            <th class="p-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pesanans as $pesanan)
                        <tr>
                            <td class="p-2 border">{{ $pesanan->nama_pembeli }}</td>
                            <td class="p-2 border">{{ $pesanan->produk }}</td>
                            <td class="p-2 border">{{ $pesanan->jumlah ?? '-' }}</td>
                            <td class="p-2 border">{{ $pesanan->whatsapp }}</td>
                            <td class="p-2 border flex gap-2">

                                {{-- TERIMA --}}
                                <form method="POST"
                                      action="{{ route('admin.pesanan.terima', $pesanan->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <button
                                        class="px-3 py-1 bg-green-600 text-white rounded text-xs">
                                        Terima
                                    </button>
                                </form>

                                {{-- TOLAK --}}
                                <form method="POST"
                                      action="{{ route('admin.pesanan.tolak', $pesanan->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <button
                                        class="px-3 py-1 bg-red-600 text-white rounded text-xs">
                                        Tolak
                                    </button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

    </div>
    @endisset

</div>
@endsection
