<section id="layanan-section" class="py-24 bg-gradient-to-br from-[#14532d] via-[#052e16] to-[#020617]">
    <div class="container mx-auto px-6 text-center">

        {{-- Judul Section --}}
        <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4">
            Layanan Kami
        </h2>
        <p class="text-white/80 text-lg max-w-3xl mx-auto mb-12">
            BP Transportation menyediakan pengiriman bahan bakar dan distribusi produk jadi dengan cepat, tepat, dan terpercaya.
        </p>

        {{-- Kartu Layanan --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

            {{-- Serbuk Gergaji --}}
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-green-500/40 transition transform hover:-translate-y-2">
                <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center bg-green-100 rounded-full">
                    <img src="{{ asset('images/serbuk-gergaji.jpg') }}" alt="Serbuk Gergaji" class="w-16 h-16 rounded-full">
                </div>
                <h3 class="text-xl font-semibold mb-2 text-green-800">Serbuk Gergaji</h3>
                <p class="text-gray-700 text-sm">
                    Pengiriman serbuk gergaji halus dan kasar untuk kebutuhan industri.
                </p>
            </div>

            {{-- Batu Bata & Genteng --}}
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-green-500/40 transition transform hover:-translate-y-2">
                <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center ">
                    <img src="{{ asset('images/batu-bata.png') }}" alt="Batu Bata & Genteng" class="w-16 h-16 rounded-full">
                </div>
                <h3 class="text-xl font-semibold mb-2 text-green-800">Batu Bata & Genteng</h3>
                <p class="text-gray-700 text-sm">
                    Distribusi batu bata & genteng berbagai kualitas sesuai kebutuhan.
                </p>
            </div>

            {{-- Kayu --}}
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-green-500/40 transition transform hover:-translate-y-2">
                <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center bg-green-100 rounded-full">
                    <img src="{{ asset('images/kayu.jpg') }}" alt="Kayu" class="w-16 h-16 rounded-full">
                </div>
                <h3 class="text-xl font-semibold mb-2 text-green-800">Kayu</h3>
                <p class="text-gray-700 text-sm">
                    Menyuplai kayu untuk bahan bakar produksi batu bata & genteng.
                </p>
            </div>

            {{-- Barang Besar / Kuantitas Banyak --}}
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-green-500/40 transition transform hover:-translate-y-2">
                <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center bg-green-100 rounded-full">
                    <img src="{{ asset('images/perabot.jpg') }}" alt="Barang Besar" class="w-16 h-16 rounded-full">
                </div>
                <h3 class="text-xl font-semibold mb-2 text-green-800">Barang Besar & Banyak</h3>
                <p class="text-gray-700 text-sm">
                    Pengiriman barang dalam kuantitas besar atau benda berukuran besar seperti motor, lemari, dan lainnya.
                </p>
            </div>

        </div>

        {{-- CTA --}}
        <div class="mt-12">
            <a href="#etalase-section"
               class="inline-block px-8 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition">
                Pesan Sekarang
            </a>
        </div>

    </div>
</section>
