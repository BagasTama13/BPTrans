<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'BP Transportation')</title>

    {{-- Meta SEO --}}
    <meta name="description" content="@yield('meta_description', 'Jasa pengiriman barang lokal cepat, tepat, dan terpercaya')">

    {{-- Tailwind CSS --}}
    @vite('resources/css/app.css')

    {{-- Custom Font (opsional) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>

    @stack('styles')
</head>
<body class="bg-gray-50 text-gray-800">

    {{-- Header --}}
    @include('partials.header')

    {{-- Main Content --}}
    <main class="min-h-screen">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

    {{-- Scripts --}}
    @vite('resources/js/app.js')
    @stack('scripts')

</body>
</html>
