<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pesan | BP Transportation</title>

    <script src="https://cdn.tailwindcss.com?plugins=line-clamp"></script>
</head>
<body class="bg-gray-100">

@include('partials.header')

<section class="py-16">
    <div class="container mx-auto px-6">

        <div class="mb-10 text-center">
            <h1 class="text-3xl font-bold text-brand-brown mb-2">
                Etalase Produk
            </h1>
            <p class="text-gray-600 text-sm">
                Pilih barang yang ingin Anda pesan
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

            @foreach($produkList as $produk)
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition flex flex-col h-full">

                {{-- Gambar --}}
                <img src="{{ asset('storage/' . $produk['image']) }}"
                     alt="{{ $produk['nama_produk'] }}"
                     class="w-full h-48 object-cover">

                <div class="p-5 flex flex-col flex-grow">

                    {{-- Nama Produk --}}
                    <h3 class="font-semibold text-lg mb-1 capitalize">
                        {{ str_replace('_',' ', $produk['nama_produk']) }}
                    </h3>

                    {{-- Deskripsi singkat --}}
                    <p class="text-sm text-gray-600 line-clamp-3 mb-2">
                        Produk {{ str_replace('_',' ', $produk['nama_produk']) }} berkualitas siap kirim.
                    </p>

                    {{-- Harga --}}
                    <p class="text-sm font-semibold text-brand-brown mb-4">
                        Rp {{ number_format($produk['harga_min'],0,',','.') }}
                        ~
                        {{ number_format($produk['harga_max'],0,',','.') }}
                    </p>

                    {{-- Tombol Pesan --}}
                    <a href="{{ route('pemesanan.index', ['produk' => $produk['nama_produk']]) }}"
                       class="mt-auto block text-center bg-gradient-to-br from-[#14532d] via-[#052e16] to-[#020617]
                              text-white py-2 rounded-lg hover:opacity-90 transition">
                        Pesan
                    </a>

                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

</body>
</html>
