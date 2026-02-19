@extends('layouts.app')

@section('title', 'BP Transportation')

@section('content')

    {{-- Header / Navbar --}}
    @include('partials.header')

    {{-- Sections --}}
    @include('components.beranda')
    @include('components.about')
    @include('components.layanan')
    @include('components.ketentuan')

    {{-- Footer --}}
    @include('partials.footer')

@endsection
