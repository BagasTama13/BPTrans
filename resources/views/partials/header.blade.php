@php
    $isDashboard = request()->is('/');
    $isUserPage = request()->is('pesan') || request()->is('pemesanan*');
@endphp

<header class="bg-white shadow-sm sticky top-0 z-50">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
          crossorigin="anonymous" referrerpolicy="no-referrer" />

    <div class="container mx-auto px-6">
        <div class="flex items-center justify-between h-16">

            {{-- Logo --}}
            <a href="{{ $isDashboard ? '#beranda-section' : '/#beranda-section' }}"
               class="flex items-center gap-3">
                <img src="{{ asset('images/Logo2.png') }}" alt="Logo" class="h-10">
                <span class="font-semibold text-lg text-brand-brown">
                    BP Transportation
                </span>
            </a>

            {{-- Desktop Menu --}}
            <nav class="hidden md:flex items-center gap-8 text-sm font-medium">

                <a href="{{ $isDashboard ? '#beranda-section' : '/#beranda-section' }}"
                   class="text-gray-700 hover:text-brand-brown">
                    Beranda
                </a>

                <a href="{{ $isDashboard ? '#about-section' : '/#about-section' }}"
                   class="text-gray-700 hover:text-brand-brown">
                    About
                </a>

                <a href="{{ $isDashboard ? '#layanan-section' : '/#layanan-section' }}"
                   class="text-gray-700 hover:text-brand-brown">
                    Layanan
                </a>

                <a href="{{ $isDashboard ? '#ketentuan-section' : '/#ketentuan-section' }}"
                   class="text-gray-700 hover:text-brand-brown">
                    Ketentuan
                </a>

                {{-- Pesan --}}
                <a href="{{ route('pesan.index') }}"
                   class="text-gray-700 hover:text-brand-brown">
                    Pesan
                </a>

                {{-- Admin (HANYA MUNCUL DI DASHBOARD / ADMIN PAGE) --}}
                @if(!$isUserPage)
                    <a href="/admin/login"
                       class="bg-brand-brown text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition">
                        Admin
                    </a>
                @endif
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

            <a href="{{ $isDashboard ? '#beranda-section' : '/#beranda-section' }}">Beranda</a>
            <a href="{{ $isDashboard ? '#about-section' : '/#about-section' }}">About</a>
            <a href="{{ $isDashboard ? '#layanan-section' : '/#layanan-section' }}">Layanan</a>
            <a href="{{ $isDashboard ? '#ketentuan-section' : '/#ketentuan-section' }}">Ketentuan</a>
            <a href="{{ route('pesan.index') }}">Pesan</a>

            {{-- Admin Mobile --}}
            @if(!$isUserPage)
                <a href="/admin/login"
                   class="mt-2 px-4 py-2 bg-brand-orange text-white rounded-lg text-center">
                    Admin
                </a>
            @endif
        </nav>
    </div>
</header>

<script>
    document.getElementById('mobile-menu-btn')
        ?.addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
</script>
