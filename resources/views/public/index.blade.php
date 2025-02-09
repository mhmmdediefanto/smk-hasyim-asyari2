@extends('public.layouts.main')

@section( 'content')
    <!-- Hero Section -->
    @include('public.components.Carousel')
    <!-- /Hero Section -->

    <!-- Berita Section -->
    @include('public.components.Berita')
    <!-- /Berita Section -->
@endsection

