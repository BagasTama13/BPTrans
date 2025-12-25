@extends('admin.layout')

@section('content')
<div class="p-8 max-w-3xl mx-auto bg-white rounded-lg shadow">
    <h1 class="text-2xl font-semibold text-brand-brown mb-6">
        Tambah Produk Baru
    </h1>

    <form action="{{ route('admin.etalase.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Nama Produk --}}
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Nama Produk</label>
            <select name="nama_produk"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                    required>
                <option value="">-- Pilih Produk --</option>
                <option value="kayu">Kayu</option>
                <option value="serbuk gergaji">Serbuk Gergaji</option>
                <option value="batu bata">Batu Bata</option>
                <option value="genteng">Genteng</option>
                <option value="pengiriman">Pengiriman</option>
            </select>
        </div>

        {{-- Tipe Produk --}}
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">
                Tipe Produk (opsional)
            </label>
            <input type="text"
                   name="tipe_produk"
                   placeholder="Contoh: Mantili, Premium, Standar"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        {{-- Harga --}}
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">
                Harga
            </label>
            <input type="number"
                   name="harga"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                   required>
        </div>

        {{-- Gambar --}}
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">
                Gambar Produk
            </label>
            <input type="file"
                   name="image"
                   class="mt-1 block w-full"
                   required>
        </div>

        <button type="submit"
                class="bg-brand-brown text-white px-6 py-2 rounded-lg hover:bg-opacity-90 transition">
            Simpan Produk
        </button>
    </form>
</div>
@endsection
