<section id="beranda-section"
         class="relative py-24 md:py-32
                bg-gradient-to-br from-[#14532d] via-[#052e16] to-[#020617]">

    <div class="container mx-auto px-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">

            {{-- Text Content --}}
            <div class="text-white">

                <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-6">
                    Solusi Pengiriman
                    <span class="text-green-300">Bahan Produksi</span>
                    Andal
                </h1>

                <p class="text-lg text-white/80 leading-relaxed mb-8">
                    BP Transportation melayani pengiriman kayu, serbuk gergaji,
                    batu bata, dan genteng untuk mendukung industri lokal
                    dengan layanan tepat waktu dan terpercaya.
                </p>

                <div class="flex flex-wrap gap-4">
                    <a href="https://wa.me/6285877653585" target="_blank"
                       class="px-7 py-3 bg-green-800 text-white font-semibold
                              rounded-lg hover:bg-green-700 transition">
                        Hubungi Kami
                    </a>

                    <a href="{{ route('pesan.index') }}"
                       class="px-7 py-3 border border-white/30 text-white
                              rounded-lg hover:bg-white/10 transition">
                        Lihat Etalase
                    </a>
                </div>

            </div>

            {{-- Image Content --}}
            <div class="relative">


                <img src="{{ asset('images/Logo2.png') }}"
                     alt="BP Transportation">
            </div>

        </div>

    </div>
</section>
