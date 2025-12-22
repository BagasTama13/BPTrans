@extends('layouts.app')

@section('title', 'BP Transportation')

@section('content')

    {{-- ================= HEADER / NAVBAR ================= --}}
    @include('partials.header')


    {{-- ================= BERANDA ================= --}}
    @include('components.beranda')


    {{-- ================= ABOUT ================= --}}
    @include('components.about')


    {{-- ================= LAYANAN ================= --}}
    @include('components.layanan')


    {{-- ================= LOKASI ================= --}}
    @include('components.ketentuan')


    {{-- ================= CONTACT ================= --}}
    @include('components.contact')


    {{-- ================= FOOTER ================= --}}
    @include('partials.footer')

@endsection
