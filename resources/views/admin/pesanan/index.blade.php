@extends('admin.layout')

@section('title', 'Daftar Pesanan')

@section('content')
<div class="container mx-auto px-6 py-10">

    {{-- JUDUL --}}
    <h1 class="text-2xl font-bold text-brand-brown mb-6">
        Daftar Pesanan (Diterima)
    </h1>

    {{-- FLASH MESSAGE --}}
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-200 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- TABLE --}}
    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="w-full table-auto border-collapse border border-gray-200">

            <thead class="bg-gray-100 text-sm">
                <tr>
                    <th class="border px-4 py-2">#</th>
                    <th class="border px-4 py-2">Nama Pembeli</th>
                    <th class="border px-4 py-2">Produk</th>
                    <th class="border px-4 py-2">Tipe / Jenis</th>
                    <th class="border px-4 py-2">Jumlah</th>
                    <th class="border px-4 py-2">Alamat Penjemputan</th>
                    <th class="border px-4 py-2">Alamat Tujuan</th>
                    <th class="border px-4 py-2">Kontak</th>
                    <th class="border px-4 py-2">Status Pengiriman</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($pesanan as $index => $item)
                <tr class="text-center text-sm">

                    <td class="border px-4 py-2">
                        {{ $index + 1 }}
                    </td>

                    <td class="border px-4 py-2">
                        {{ $item->nama_pembeli }}
                    </td>

                    <td class="border px-4 py-2 capitalize">
                        {{ $item->produk }}
                    </td>

                    <td class="border px-4 py-2">
                        {{ $item->tipe_batu_bata
                            ?? $item->jenis_genteng
                            ?? $item->jenis_pengiriman
                            ?? '-' }}
                    </td>

                    <td class="border px-4 py-2">
                        {{ $item->jumlah ?? '-' }}
                        {{ $item->satuan ?? '' }}
                    </td>

                    <td class="border px-4 py-2">
                        {{ $item->alamat_penjemputan ?? '-' }}
                    </td>

                    <td class="border px-4 py-2">
                        {{ $item->alamat }}
                    </td>

                    <td class="border px-4 py-2">
                        {{ $item->whatsapp }}
                    </td>

                    {{-- STATUS PENGIRIMAN --}}
                    <td class="border px-4 py-2 font-semibold
                        @if($item->status_pengiriman == 'antrian') text-orange-500
                        @elseif($item->status_pengiriman == 'diproses') text-blue-600
                        @elseif($item->status_pengiriman == 'dikirim') text-green-600
                        @else text-gray-500
                        @endif
                    ">
                        {{ ucfirst($item->status_pengiriman ?? 'antrian') }}
                    </td>

                    {{-- AKSI --}}
                    <td class="border px-4 py-2">
                        <form
                            action="{{ route('admin.pesanan.update', $item->id) }}"
                            method="POST"
                        >
                            @csrf
                            @method('PUT')

                            <select
                                name="status_pengiriman"
                                onchange="this.form.submit()"
                                class="border rounded px-2 py-1 text-sm"
                            >
                                <option value="antrian"
                                    {{ $item->status_pengiriman == 'antrian' ? 'selected' : '' }}>
                                    Antrian
                                </option>

                                <option value="diproses"
                                    {{ $item->status_pengiriman == 'diproses' ? 'selected' : '' }}>
                                    Diproses
                                </option>

                                <option value="dikirim"
                                    {{ $item->status_pengiriman == 'dikirim' ? 'selected' : '' }}>
                                    Dikirim
                                </option>
                                <option value="terkirim"
                                    {{ $item->status_pengiriman == 'terkirim' ? 'selected' : '' }}>
                                    Diterima
                                </option>
                            </select>
                        </form>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="10" class="border px-4 py-6 text-center text-gray-500">
                        Belum ada pesanan diterima
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>
@endsection
