<!DOCTYPE html>
<html lang="en" data-sidebar-color="light" data-topbar-color="light" data-sidebar-view="default">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Favicon -->
    <link rel="icon" href="{{ asset('logo/logo_smk_hasyim_asyari_2_kudus.png') }}" sizes="32x32"
        type="image/x-icon">
    <!-- App css -->
    <link href="{{ asset('assets/css/theme.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/@iconscout/unicons/css/line.css') }}" type="text/css" rel="stylesheet">

    <!-- Head Js -->
    <script src="{{ asset('assets/js/head.js') }}"></script>

    {{-- flowbite  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.0/flowbite.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    {{-- link inport tailwind --}}
    @vite('resources/css/app.css')

    @stack('styles')

    @include('sweetalert::alert')

    {{-- CKEditor CDN --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <title>Dashboard - SKAHADA</title>
</head>

<body>


    <div class="app-wrapper">
        <div class="app-menu">
            {{-- partials sidebar --}}
            @include('dashboard.partials.sidebar')
        </div>
        <div class="app-content">
            {{-- partial topbar --}}
            @include('dashboard.partials.topbar')
            {{-- main --}}
            <main class="p-6">
                <x-breadcrumbs />
                @yield('main')
            </main>

            @include('dashboard.partials.footer')
        </div>
        @include('dashboard.partials.right-menu')
    </div>


    @stack('scripts')

    @vite(['resources/js/app.js'])
    <!-- Plugin Js -->
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/preline/preline.js') }}"></script>


    <!-- App Js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
</body>

</html>
