@extends('admin.layout')

@section('content')
<div class="p-8 max-w-3xl mx-auto bg-white rounded-lg shadow">
    <h1 class="text-2xl font-semibold text-brand-brown mb-6">
        Edit Produk
    </h1>

    <form action="{{ route('admin.etalase.update', $product->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        {{-- JANGAN pakai PUT karena route POST --}}

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">
                Nama Produk
            </label>
            <input type="text"
                   name="name"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                   value="{{ $product->name }}"
                   required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">
                Tipe / Jenis (opsional)
            </label>
            <input type="text"
                   name="type"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                   value="{{ $product->type }}">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">
                Harga
            </label>
            <input type="number"
                   name="price"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                   value="{{ $product->price }}"
                   required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">
                Gambar Produk
            </label>
            <input type="file" name="image" class="mt-1 block w-full">

            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}"
                     class="mt-2 h-20 w-20 object-cover rounded">
            @endif
        </div>

        <button type="submit"
                class="bg-brand-brown text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition">
            Update Produk
        </button>
    </form>
</div>
@endsection
