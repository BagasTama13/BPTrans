<footer class="bg-brand-brown text-white py-14">
    <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-10">

        {{-- Brand Logo & Description --}}
        <div>
            <a href="#" target="_blank">
                <img src="{{ asset('images/Logo2.png') }}" alt="Brand Logo" class="h-16 mb-4 cursor-pointer hover:scale-105 transition-transform">
            </a>
            <p class="text-sm leading-relaxed">
                Tempat kursus bahasa Inggris dengan konsep interaktif dan modern.
            </p>

            <div class="flex gap-4 mt-4">
                <a href="#" class="hover:opacity-70 transition">
                    <img src="{{ asset('images/tiktok.svg') }}" class="h-6" alt="TikTok">
                </a>
                <a href="#" class="hover:opacity-70 transition">
                    <img src="{{ asset('images/instagram.svg') }}" class="h-6" alt="Instagram">
                </a>
                <a href="#" class="hover:opacity-70 transition">
                    <img src="{{ asset('images/whatsapp.svg') }}" class="h-6" alt="WhatsApp">
                </a>
            </div>
        </div>

        {{-- Useful Links --}}
        <div>
            <h4 class="text-lg font-semibold mb-4">Tautan</h4>
            <ul class="space-y-2 text-sm">
                <li><a href="#" class="hover:text-brand-orange transition">Tentang Kami</a></li>
                <li><a href="#" class="hover:text-brand-orange transition">Fitur</a></li>
                <li><a href="#" class="hover:text-brand-orange transition">Manfaat</a></li>
                <li><a href="#" class="hover:text-brand-orange transition">Program</a></li>
            </ul>
        </div>

        {{-- Support --}}
        <div>
            <h4 class="text-lg font-semibold mb-4">Dukungan</h4>
            <ul class="space-y-2 text-sm">
                <li><a href="#" class="hover:text-brand-orange transition">Pusat Bantuan</a></li>
                <li><a href="#" class="hover:text-brand-orange transition">Hubungi Kami</a></li>
                <li><a href="#" class="hover:text-brand-orange transition">FAQ</a></li>
                <li><a href="#" class="hover:text-brand-orange transition">Pembayaran</a></li>
                <li><a href="#" class="hover:text-brand-orange transition">Website Resmi</a></li>
            </ul>
        </div>

        {{-- Contact --}}
        <div>
            <h4 class="text-lg font-semibold mb-4">Informasi Kontak</h4>
            <ul class="space-y-4 text-sm">
                <li class="flex gap-3">
                    <img src="{{ asset('images/location.svg') }}" alt="Location" class="h-5 opacity-90">
                    <span>Alamat Kosong</span>
                </li>
                <li class="flex gap-3 items-center">
                    <img src="{{ asset('images/telephone.svg') }}" alt="Phone" class="h-5 opacity-90">
                    <span>Telepon Kosong</span>
                </li>
                <li class="flex gap-3 items-center">
                    <img src="{{ asset('images/email.svg') }}" alt="Email" class="h-5 opacity-90">
                    <span>Email Kosong</span>
                </li>
            </ul>
        </div>

    </div>

    {{-- Footer Bottom --}}
    <div class="mt-10 border-t border-white/20 pt-5 text-center text-xs opacity-80">
        © 2025 <a href="#" target="_blank">BrandName</a> — Semua Hak Dilindungi.
    </div>
</footer>
