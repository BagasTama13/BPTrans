@extends('admin.layout')

@section('content')
<div class="p-8 max-w-3xl mx-auto bg-white rounded-lg shadow">
    <h1 class="text-2xl font-semibold text-brand-brown mb-6">Tambah Produk Baru</h1>

    <form action="{{ route('admin.etalase.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Nama Produk</label>
            <input type="text" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Tipe / Jenis (opsional)</label>
            <input type="text" name="type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Harga</label>
            <input type="number" name="price" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Satuan / Unit</label>
            <input type="text" name="unit" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Gambar Produk</label>
            <input type="file" name="image" class="mt-1 block w-full" required>
        </div>

        <button type="submit"
                class="bg-brand-brown text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition">
            Simpan Produk
        </button>
    </form>
</div>
@endsection
