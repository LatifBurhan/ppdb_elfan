@extends('layouts.app')

@section('content')
    {{-- Navbar --}}
    @include('landing.navbar')
    @include('landing.hero')
    @include('landing.flow')
    @include('landing.programs')
    @include('landing.faq')
    @include('landing.gallery')
    @include('landing.footer')
@endsection
