<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pesan | BP Transportation</title>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com?plugins=line-clamp"></script>

    {{-- Custom Color --}}
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-brown': '#7a4a2e',
                        'brand-orange': '#f97316',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100">

{{-- HEADER --}}
@include('partials.header')

{{-- CONTENT --}}
<section class="py-16">
    <div class="container mx-auto px-6">

        {{-- Judul --}}
        <div class="mb-10 text-center">
            <h1 class="text-3xl font-bold text-brand-brown mb-2">
                Etalase Produk
            </h1>
            <p class="text-gray-600 text-sm">
                Pilih barang yang ingin Anda pesan
            </p>
        </div>

        {{-- GRID PRODUK --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

            {{-- Kayu Bakar --}}
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition flex flex-col h-full">
                <img src="{{ asset('images/kayu.jpg') }}"
                     alt="Kayu Bakar"
                     class="w-full h-48 object-cover">

                <div class="p-5 flex flex-col flex-grow">
                    <h3 class="font-semibold text-lg mb-1">Kayu Bakar</h3>

                    <p class="text-sm text-gray-600 line-clamp-3 mb-2">
                        Kayu bakar untuk bahan bakar produksi batu bata dan genteng.
                    </p>

                    <p class="text-sm font-semibold text-brand-brown mb-4">
                        Rp 150.000 / bak
                    </p>

                    <a href="{{ route('pemesanan.index', ['produk' => 'kayu']) }}"
                       class="mt-auto block text-center bg-brand-brown text-white py-2 rounded-lg hover:bg-opacity-90 transition">
                        Pesan
                    </a>
                </div>
            </div>

            {{-- Serbuk Gergaji --}}
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition flex flex-col h-full">
                <img src="{{ asset('images/serbuk-gergaji.jpg') }}"
                     alt="Serbuk Gergaji"
                     class="w-full h-48 object-cover">

                <div class="p-5 flex flex-col flex-grow">
                    <h3 class="font-semibold text-lg mb-1">Serbuk Gergaji</h3>

                    <p class="text-sm text-gray-600 line-clamp-3 mb-2">
                        Serbuk gergaji berkualitas untuk bahan bakar pembakaran.
                    </p>

                    <p class="text-sm font-semibold text-brand-brown mb-4">
                       Rp 8.000 ~ 11.000 / sak
                    </p>

                    <a href="{{ route('pemesanan.index', ['produk' => 'serbuk']) }}"
                       class="mt-auto block text-center bg-brand-brown text-white py-2 rounded-lg hover:bg-opacity-90 transition">
                        Pesan
                    </a>
                </div>
            </div>

            {{-- Batu Bata --}}
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition flex flex-col h-full">
                <img src="{{ asset('images/batu-bata.png') }}"
                     alt="Batu Bata"
                     class="w-full h-48 object-cover">

                <div class="p-5 flex flex-col flex-grow">
                    <h3 class="font-semibold text-lg mb-1">Batu Bata</h3>

                    <p class="text-sm text-gray-600 line-clamp-3 mb-2">
                        Batu bata merah siap kirim ke lokasi Anda.
                    </p>

                    <p class="text-sm font-semibold text-brand-brown mb-4">
                        Rp 800 ~ 1.200 / pcs
                    </p>

                    <a href="{{ route('pemesanan.index', ['produk' => 'batu_bata']) }}"
                       class="mt-auto block text-center bg-brand-brown text-white py-2 rounded-lg hover:bg-opacity-90 transition">
                        Pesan
                    </a>
                </div>
            </div>

            {{-- Genteng --}}
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition flex flex-col h-full">
                <img src="{{ asset('images/genteng.jpg') }}"
                     alt="Genteng"
                     class="w-full h-48 object-cover">

                <div class="p-5 flex flex-col flex-grow">
                    <h3 class="font-semibold text-lg mb-1">Genteng</h3>

                    <p class="text-sm text-gray-600 line-clamp-3 mb-2">
                        Genteng berkualitas untuk kebutuhan bangunan.
                    </p>

                    <p class="text-sm font-semibold text-brand-brown mb-4">
                      Rp 1.500 ~ 2.500 / pcs
                    </p>

                    <a href="{{ route('pemesanan.index', ['produk' => 'genteng']) }}"
                       class="mt-auto block text-center bg-brand-brown text-white py-2 rounded-lg hover:bg-opacity-90 transition">
                        Pesan
                    </a>
                </div>
            </div>

            {{-- Pengiriman Barang --}}
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition flex flex-col h-full">
                <img src="{{ asset('images/pick-up.png') }}"
                     alt="Pengiriman Barang"
                     class="w-full h-48 object-cover">

                <div class="p-5 flex flex-col flex-grow">
                    <h3 class="font-semibold text-lg mb-1">Pengiriman Barang</h3>

                    <p class="text-sm text-gray-600 line-clamp-3 mb-2">
                        Layanan pengiriman barang sesuai kebutuhan Anda.
                    </p>

                    <p class="text-sm font-semibold text-brand-brown mb-4">
                        Mulai dari Rp 100.000
                    </p>

                    <a href="{{ route('pemesanan.index', ['produk' => 'pengiriman']) }}"
                       class="mt-auto block text-center bg-brand-brown text-white py-2 rounded-lg hover:bg-opacity-90 transition">
                        Pesan
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

</body>
</html>
