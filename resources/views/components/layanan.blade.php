<section id="layanan-section" class="py-24 bg-gradient-to-br from-[#14532d] via-[#052e16] to-[#020617]">
    <div class="container mx-auto px-6 text-center">

        {{-- Judul --}}
        <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4">
            Layanan Kami
        </h2>
        <p class="text-white/80 text-lg max-w-3xl mx-auto mb-12">
            BP Transportation menyediakan pengiriman bahan bakar dan distribusi produk jadi dengan cepat, tepat, dan terpercaya.
        </p>

        {{-- Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-8">

            {{-- Serbuk Gergaji --}}
            <a href="{{ route('pemesanan.index', ['produk' => 'serbuk']) }}">
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-green-500/40
                            transition transform hover:-translate-y-2 h-full cursor-pointer">
                    <div class="w-16 h-16 mx-auto mb-4 bg-green-100 rounded-full flex items-center justify-center">
                        <img src="{{ asset('images/serbuk-gergaji.jpg') }}" class="w-16 h-16 rounded-full">
                    </div>
                    <h3 class="text-xl font-semibold text-green-800 mb-2">Serbuk Gergaji</h3>
                    <p class="text-gray-700 text-sm">
                        Pengiriman serbuk gergaji halus dan kasar untuk kebutuhan industri.
                    </p>
                </div>
            </a>

            {{-- Batu Bata --}}
            <a href="{{ route('pemesanan.index', ['produk' => 'batu_bata']) }}">
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-green-500/40
                            transition transform hover:-translate-y-2 h-full cursor-pointer">
                    <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                        <img src="{{ asset('images/batu-bata.png') }}" class="w-16 h-16 rounded-full">
                    </div>
                    <h3 class="text-xl font-semibold text-green-800 mb-2">Batu Bata</h3>
                    <p class="text-gray-700 text-sm">
                        Distribusi batu bata merah berbagai kualitas siap kirim.
                    </p>
                </div>
            </a>

            {{-- Genteng --}}
            <a href="{{ route('pemesanan.index', ['produk' => 'genteng']) }}">
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-green-500/40
                            transition transform hover:-translate-y-2 h-full cursor-pointer">
                    <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                        <img src="{{ asset('images/genteng.jpg') }}" class="w-16 h-16 rounded-full">
                    </div>
                    <h3 class="text-xl font-semibold text-green-800 mb-2">Genteng</h3>
                    <p class="text-gray-700 text-sm">
                        Genteng tanah liat berbagai tipe dan kualitas.
                    </p>
                </div>
            </a>

            {{-- Kayu --}}
            <a href="{{ route('pemesanan.index', ['produk' => 'kayu']) }}">
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-green-500/40
                            transition transform hover:-translate-y-2 h-full cursor-pointer">
                    <div class="w-16 h-16 mx-auto mb-4 bg-green-100 rounded-full flex items-center justify-center">
                        <img src="{{ asset('images/kayu.jpg') }}" class="w-16 h-16 rounded-full">
                    </div>
                    <h3 class="text-xl font-semibold text-green-800 mb-2">Kayu</h3>
                    <p class="text-gray-700 text-sm">
                        Kayu bakar untuk bahan bakar produksi bata & genteng.
                    </p>
                </div>
            </a>

            {{-- Pengiriman Barang --}}
            <a href="{{ route('pemesanan.index', ['produk' => 'pengiriman']) }}">
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-green-500/40
                            transition transform hover:-translate-y-2 h-full cursor-pointer">
                    <div class="w-16 h-16 mx-auto mb-4 bg-green-100 rounded-full flex items-center justify-center">
                        <img src="{{ asset('images/perabot.jpg') }}" class="w-16 h-16 rounded-full">
                    </div>
                    <h3 class="text-xl font-semibold text-green-800 mb-2">Pengiriman Barang</h3>
                    <p class="text-gray-700 text-sm">
                        Pengiriman barang besar dan kuantitas banyak.
                    </p>
                </div>
            </a>

        </div>
    </div>
</section>
