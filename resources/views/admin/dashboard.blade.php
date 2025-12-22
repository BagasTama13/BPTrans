@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container mx-auto px-6 py-20">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-brand-brown">
            Dashboard Admin
        </h1>

        <form method="POST" action="/admin/logout">
            @csrf
            <button
                class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                Logout
            </button>
        </form>
    </div>

    <p class="text-gray-600">
        Selamat datang di halaman dashboard admin.
    </p>

</div>
@endsection
