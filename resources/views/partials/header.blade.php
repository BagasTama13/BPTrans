<header class="bg-white shadow-sm sticky top-0 z-50">
    <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Po0hkuFz8BrVhrN48k2GzH63Rb7l+QdKx6e+0t4x7xG93I+Y0N6flD3kg5mkI3bP1LZz5dpL5xOZcH7D2Yw1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <div class="container mx-auto px-6">
        <div class="flex items-center justify-between h-16">

            {{-- Logo --}}
            <a href="#beranda-section" class="flex items-center gap-3">
                <img src="{{ asset('images/Logo2.png') }}" alt="Logo" class="h-10">
                <span class="font-semibold text-lg text-brand-brown">
                    BP Transportation
                </span>
            </a>

            {{-- Desktop Menu --}}
            <nav class="hidden md:flex items-center gap-8 text-sm font-medium">

                <a href="#beranda-section" class="text-gray-700 hover:text-brand-brown">
                    Beranda
                </a>

                <a href="#about-section" class="text-gray-700 hover:text-brand-brown">
                    About
                </a>

                <a href="#layanan-section" class="text-gray-700 hover:text-brand-brown">
                    Layanan
                </a>

                <a href="#etalase-section" class="text-gray-700 hover:text-brand-brown">
                    Etalase
                </a>

                <a href="#ketentuan-section" class="text-gray-700 hover:text-brand-brown">
                    Ketentuan
                </a>

                {{-- Admin --}}
                <a href="/admin/login"
                   class="bg-brand-brown text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition">
                    Admin
                </a>
            </nav>

            {{-- Mobile Button --}}
            <button id="mobile-menu-btn" class="md:hidden">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

        </div>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t px-6 py-4">
        <nav class="flex flex-col gap-4 text-sm font-medium">

            <a href="#beranda-section" class="hover:text-brand-orange">Beranda</a>
            <a href="#about-section" class="hover:text-brand-orange">About</a>
            <a href="#layanan-section" class="hover:text-brand-orange">Layanan</a>
            <a href="#etalase-section" class="hover:text-brand-orange">Etalase</a>
            <a href="#lokasi-section" class="hover:text-brand-orange">Lokasi</a>

            <a href="/admin/login"
               class="mt-2 px-4 py-2 bg-brand-orange text-white rounded-lg hover:bg-orange-600 text-center">
                Admin
            </a>
        </nav>
    </div>
</header>

<script>
    document.getElementById('mobile-menu-btn').addEventListener('click', () => {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>
