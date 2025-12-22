@extends('layouts.app')

@section('content')


    {{-- Beranda --}}
    @include('components.beranda')

    {{-- About --}}
    @include('components.about')

    {{-- Etalase --}}
    @include('components.etalase')

    {{-- Radius Pengiriman --}}
    @include('components.location')

    {{-- Hubungi Kami --}}
    @include('components.contact')

    {{-- Footer --}}
    @include('partials.footer')

@endsection
