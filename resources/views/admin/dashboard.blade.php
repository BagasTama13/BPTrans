@extends('admin.layout')

@section('content')
<div class="p-8">

    {{-- Page Title --}}
    <h1 class="text-2xl font-semibold text-brand-brown mb-2">
        Dashboard
    </h1>
    <p class="text-sm text-gray-600 mb-8">
        Panel administrasi BP Transportation
    </p>

    {{-- Welcome Card --}}
    <div class="bg-white rounded-xl shadow p-8 max-w-3xl">

        <h2 class="text-xl font-semibold mb-3">
            Selamat Datang, Admin 👋
        </h2>

        <p class="text-gray-700 leading-relaxed">
            Melalui panel ini Anda dapat mengelola produk pada etalase,
            memproses pesanan pelanggan, serta melihat riwayat aktivitas
            sistem BP Transportation.
        </p>

        <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">

            <div class="border rounded-lg p-4">
                <h3 class="font-semibold mb-1">Etalase</h3>
                <p class="text-sm text-gray-600">
                    Kelola produk dan harga
                </p>
            </div>

            <div class="border rounded-lg p-4">
                <h3 class="font-semibold mb-1">Pesanan</h3>
                <p class="text-sm text-gray-600">
                    Terima dan proses pesanan
                </p>
            </div>

            <div class="border rounded-lg p-4">
                <h3 class="font-semibold mb-1">Riwayat</h3>
                <p class="text-sm text-gray-600">
                    Pantau seluruh aktivitas
                </p>
            </div>

        </div>
    </div>

</div>
@endsection
