<footer class="bg-black text-white py-14">
    <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-10">

        {{-- Brand Logo & Description --}}
        <div>
            <a href="#beranda-section">
                <img src="{{ asset('images/Logo2.png') }}"
                     alt="BP Transportation"
                     class="h-16 mb-4 cursor-pointer hover:scale-105 transition-transform">
            </a>

            <p class="text-sm leading-relaxed">
                BP Transportation adalah layanan pengiriman barang lokal yang fokus pada
                distribusi bahan baku dan produk jadi seperti kayu, serbuk gergaji,
                batu bata, dan genteng dengan layanan cepat, tepat, dan terpercaya.
            </p>


        </div>

        {{-- Navigasi --}}
        <div>
            <h4 class="text-lg font-semibold mb-4">Navigasi</h4>
            <ul class="space-y-2 text-sm">
                <li><a href="#beranda-section" class="hover:text-brand-orange transition">Beranda</a></li>
                <li><a href="#about-section" class="hover:text-brand-orange transition">Tentang Kami</a></li>
                <li><a href="#layanan-section" class="hover:text-brand-orange transition">Layanan</a></li>
                <li><a href="#etalase-section" class="hover:text-brand-orange transition">Etalase</a></li>
                <li><a href="#ketentuan-section" class="hover:text-brand-orange transition">Ketentuan</a></li>
            </ul>
        </div>

        {{-- Layanan --}}
        <div>
            <h4 class="text-lg font-semibold mb-4">Layanan Kami</h4>
            <ul class="space-y-2 text-sm">
                <li>Pengiriman Kayu & Serbuk Gergaji</li>
                <li>Distribusi Batu Bata & Genteng</li>
                <li>Pengiriman Barang Lokal</li>
                <li>Pengiriman Tepat Waktu</li>
                <li>
                    <a href="/admin/login" class="hover:text-brand-orange transition">
                        Akses Admin
                    </a>
                </li>
            </ul>
        </div>

        {{-- Kontak --}}
            <div>
                <h4 class="text-lg font-semibold mb-4">Informasi Kontak</h4>

                <ul class="space-y-4 text-sm">

                    <!-- Alamat -->
                    <li class="flex gap-3 items-start">
                        <i class="fas fa-location-dot mt-1 opacity-90"></i>
                        <a href="https://www.google.com/maps/search/?api=1&query=Dusun+2,+Gemiring+Kidul,+Kec.+Nalumsari,+Kabupaten+Jepara,+Jawa+Tengah+59466"
                        target="_blank">
                            Dusun 2, Gemiring Kidul, Kec. Nalumsari, Kabupaten Jepara, Jawa Tengah 59466
                        </a>
                    </li>

                    <!-- WhatsApp -->
                    <li class="flex gap-3 items-center">
                        <i class="fab fa-whatsapp opacity-90"></i>
                        <a href="https://wa.me/6285877653585" target="_blank">
                            0858-7765-3585
                        </a>
                    </li>

                    <!-- Email -->
                    <li class="flex gap-3 items-center">
                        <i class="fas fa-envelope opacity-90"></i>
                        <a href="mailto:bptransportation@gmail.com">
                            bptransportation@gmail.com
                        </a>
                    </li>

                </ul>
            </div>



    </div>

    {{-- Footer Bottom --}}
    <div class="mt-10 border-t border-white/20 pt-5 text-center text-xs opacity-80">
        © {{ date('Y') }} <span class="font-semibold">BP Transportation</span> —
        Semua Hak Dilindungi.
    </div>
</footer>
