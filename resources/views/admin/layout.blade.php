<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin BP Transportation</title>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Custom Color --}}
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-brown': '#7a4a2e',
                        'brand-orange': '#f97316',
                        'brand-gray': '#f3f3f3',
                    }
                }
            }
        }
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
          crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="flex h-screen bg-brand-gray">

    {{-- Sidebar --}}
    <aside class="w-60 bg-white shadow flex flex-col">
        <div class="p-6">
            <img src="{{ asset('images/Logo2.png') }}" alt="Logo" class="h-12 mb-3">
            <h1 class="text-lg font-semibold text-brand-brown">Admin Panel</h1>
        </div>

        <nav class="flex-1 px-4">
            @php
                $currentRoute = request()->route()->getName();
            @endphp

            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 p-3 rounded-lg mb-2
               {{ $currentRoute === 'admin.dashboard' ? 'bg-brand-brown text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                <i class="fas fa-home w-5"></i>
                Dashboard
            </a>

            <a href="{{ route('admin.etalase') }}"
               class="flex items-center gap-3 p-3 rounded-lg mb-2
               {{ $currentRoute === 'admin.etalase' ? 'bg-brand-brown text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                <i class="fas fa-box-open w-5"></i>
                Etalase
            </a>

            <a href="{{ route('admin.pesanan') }}"
               class="flex items-center gap-3 p-3 rounded-lg mb-2
               {{ $currentRoute === 'admin.pesanan' ? 'bg-brand-brown text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                <i class="fas fa-receipt w-5"></i>
                Pesanan
            </a>

            <a href="{{ route('admin.riwayat') }}"
               class="flex items-center gap-3 p-3 rounded-lg mb-2
               {{ $currentRoute === 'admin.riwayat' ? 'bg-brand-brown text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                <i class="fas fa-history w-5"></i>
                Riwayat
            </a>
        </nav>

        <div class="p-4">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit"
                        class="w-full flex items-center gap-3 justify-center p-3 bg-brand-orange text-white rounded-lg hover:bg-orange-600">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    {{-- Konten Halaman --}}
    <main class="flex-1 overflow-y-auto p-6">
        @yield('content')
    </main>

</body>
</html>
