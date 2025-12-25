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
                    <th class="px-4 py-2 text-left">Tipe</th>
                    <th class="px-4 py-2 text-left">Harga</th>
                    <th class="px-4 py-2 text-left">Gambar</th>
                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr class="border-b">
                        <td class="px-4 py-2 capitalize">
                            {{ $product->nama_produk }}
                        </td>

                        <td class="px-4 py-2">
                            {{ $product->tipe_produk ?? '-' }}
                        </td>

                        <td class="px-4 py-2">
                            Rp {{ number_format($product->harga, 0, ',', '.') }}
                        </td>

                        <td class="px-4 py-2">
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}"
                                     class="w-16 h-16 object-cover rounded">
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>

                        <td class="px-4 py-2">
                            <a href="{{ route('admin.etalase.edit', $product->id) }}"
                               class="text-blue-600 hover:underline mr-2">
                               Edit
                            </a>

                            <form action="{{ route('admin.etalase.destroy', $product->id) }}"
                                method="POST"
                                onsubmit="return confirm('Apakah anda yakin ingin menghapus {{ $product->name }} ?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                    Hapus
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5"
                            class="text-center py-6 text-gray-500">
                            Belum ada produk di etalase.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
