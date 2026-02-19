<section id="about-section" class="py-20 bg-white">
    <div class="container mx-auto px-6">
        
        {{-- Judul --}}
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">
                Tentang <span class="text-green-600">BP Transportation</span>
            </h2>
            <p class="text-gray-700 max-w-2xl mx-auto text-lg leading-relaxed">
                BP Transportation hadir untuk mendukung industri lokal dengan layanan pengiriman bahan baku dan produk jadi secara Mudah, Cepat, dan Terpercaya.
            </p>
        </div>

        {{-- Konten --}}
        <div class="grid md:grid-cols-2 gap-12 items-center">

            {{-- Gambar ilustrasi --}}
            <div class="flex justify-center">
                <img src="{{ asset('images/pick-up2.png') }}" alt="BP Transportation" class="rounded-xl shadow-lg max-w-full">
            </div>

            {{-- Visi & Misi --}}
            <div class="space-y-8">

                {{-- Visi --}}
                <div class="flex items-start gap-4">
                    <i class="fas fa-bullseye text-green-600 text-3xl mt-1"></i>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Visi</h3>
                        <p class="text-gray-700 text-sm">
                            Menjadi perusahaan pengiriman lokal terpercaya yang mendukung rantai pasok bahan baku dan produk jadi untuk industri batu bata dan genteng.
                        </p>
                    </div>
                </div>

                {{-- Misi --}}
                <div class="flex items-start gap-4">
                    <i class="fas fa-truck text-green-600 text-3xl mt-1"></i>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Misi</h3>
                        <ul class="text-gray-700 text-sm list-disc ml-5 space-y-1">
                            <li>Mensuplai bahan bakar untuk produksi batu bata dan genteng berupa kayu dan serbuk gergaji.</li>
                            <li>Mendistribusikan hasil jadi seperti batu bata dan genteng ke para pembeli secara cepat dan aman.</li>
                            <li>Menerapkan layanan Mudah, Cepat, dan Terpercaya dalam seluruh proses pengiriman.</li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>
