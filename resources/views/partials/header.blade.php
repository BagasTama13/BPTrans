<header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="container mx-auto px-6">
        <div class="flex items-center justify-between h-16">

            {{-- Logo --}}
            <div class="flex items-center space-x-3">
                <img src="{{ asset('images/logobpt.png') }}" alt="Logo" class="h-10 w-auto">
                <span class="font-semibold text-lg text-brand-brown">
                    BP Transportation
                </span>
            </div>

            {{-- Desktop Menu --}}
            <nav class="hidden md:flex items-center space-x-8 text-sm font-medium">
                <a href="{{ url('/') }}" class="text-gray-700 hover:text-brand-brown transition">
                    Beranda
                </a>
                <a href="{{ url('/services') }}" class="text-gray-700 hover:text-brand-brown transition">
                    Layanan
                </a>
                <a href="{{ url('/location') }}" class="text-gray-700 hover:text-brand-brown transition">
                    Lokasi
                </a>
                <a href="{{ url('/about') }}" class="text-gray-700 hover:text-brand-brown transition">
                    Tentang Kami
                </a>
                <a href="{{ url('/contact') }}"
                   class="bg-brand-brown text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition">
                    Hubungi Kami
                </a>
            </nav>

            {{-- Mobile Button --}}
            <button id="mobile-menu-button" class="md:hidden text-gray-700 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t">
        <nav class="flex flex-col px-6 py-4 space-y-4 text-sm font-medium">
            <a href="{{ url('/') }}" class="text-gray-700 hover:text-brand-brown">
                Beranda
            </a>
            <a href="{{ url('/services') }}" class="text-gray-700 hover:text-brand-brown">
                Layanan
            </a>
            <a href="{{ url('/location') }}" class="text-gray-700 hover:text-brand-brown">
                Lokasi
            </a>
            <a href="{{ url('/about') }}" class="text-gray-700 hover:text-brand-brown">
                Tentang Kami
            </a>
            <a href="{{ url('/contact') }}"
               class="bg-brand-brown text-white text-center px-4 py-2 rounded-lg">
                Hubungi Kami
            </a>
        </nav>
    </div>
</header>

{{-- Mobile Menu Script --}}
<script>
    const btn = document.getElementById('mobile-menu-button');
    const menu = document.getElementById('mobile-menu');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>
