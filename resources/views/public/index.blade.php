@extends('public.layouts.main')


@section('main')
    <!-- Hero Section -->
    @include('public.components.Carousel')
    <!-- /Hero Section -->
@endsection
@section('content')
    <!-- Berita Section -->
    @include('public.components.Berita')
    <!-- /Berita Section -->

    {{--    <!-- Maps Section --}}
    @include('public.components.map-location')
    <!-- /Maps Section -->
@endsection
