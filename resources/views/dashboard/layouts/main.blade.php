<!DOCTYPE html>
<html lang="en" data-sidebar-color="light" data-topbar-color="light" data-sidebar-view="default">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <!-- App css -->
    <link href="{{ asset('assets/css/theme.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/@iconscout/unicons/css/line.css') }}" type="text/css" rel="stylesheet">

    <!-- Head Js -->
    <script src="{{ asset('assets/js/head.js') }}"></script>

    {{-- link inport tailwind --}}
    @vite('resources/css/app.css')


    <title>Dashboard - SKAHADA</title>
</head>

<body>


    <div class="app-wrapper">
        {{-- partials sidebar --}}
        @include('dashboard.partials.sidebar')
        <div class="app-content">
            {{-- partial topbar --}}
            @include('dashboard.partials.topbar')
            {{-- main --}}
            <main class="p-6">
                @yield('main')
            </main>
        </div>
    </div>

    <!-- Plugin Js -->
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/preline/preline.js') }}"></script>

    <!-- App Js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
</body>

</html>
