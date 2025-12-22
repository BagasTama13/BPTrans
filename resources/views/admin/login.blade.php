@extends('layouts.app')

@section('title', 'Login Admin')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">

    <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md">

        <h2 class="text-2xl font-bold text-center mb-6 text-brand-brown">
            Login Admin
        </h2>

        @if (session('error'))
            <div class="bg-red-100 text-red-600 p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="/admin/login" class="space-y-4">
            @csrf

            <input
                type="text"
                name="username"
                placeholder="Username"
                class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-orange-300"
                required
            >

            <input
                type="password"
                name="password"
                placeholder="Password"
                class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-orange-300"
                required
            >

            <button
                type="submit"
                class="w-full bg-orange-500 text-white font-bold py-2 rounded-lg hover:bg-orange-600 transition">
                Login
            </button>
        </form>

    </div>
</div>
@endsection
