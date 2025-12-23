@extends('admin.layout') {{-- layout admin utama --}}

@section('content')
<div class="container mx-auto px-6 py-10">
    <h1 class="text-2xl font-bold mb-6">Etalase Produk</h1>

    <a href="{{ route('admin.etalase.create') }}"
       class="mb-4 inline-block bg-brand-brown text-white px-4 py-2 rounded hover:bg-opacity-90">
       Tambah Produk
    </a>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow rounded-lg">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 text-left">Nama Produk</th>
                    <th class="px-4 py-2 text-left">Harga</th>
                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $product->name }}</td>
                        <td class="px-4 py-2">{{ $product->price }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('admin.etalase.edit', $product->id) }}"
                               class="text-blue-600 hover:underline mr-2">Edit</a>
                            <form action="{{ route('admin.etalase.delete', $product->id) }}"
                                  method="POST" class="inline">
                                @csrf
                                <button type="submit"
                                        class="text-red-600 hover:underline"
                                        onclick="return confirm('Yakin hapus produk ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-6 text-gray-500">
                            Belum ada produk di etalase.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
