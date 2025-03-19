@php
    $dataFront = App\Models\SettingsFront::first();
    // dump($dataFront);
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="robots" content="index, follow">
    <meta name="app-url" content="{{ env('APP_URL') }}">
    <title>{{ $dataFront ? $dataFront->title : 'SMK NU Hasyim Asy\'ari 2 Kudus' }}</title>
    <!-- Meta Description -->
    <meta name="description"
        content="SMK NU Hasyim Asy'ari 2 Kudus menyediakan sistem informasi sekolah berbasis web untuk mempermudah administrasi, absensi, dan layanan akademik siswa serta tenaga pendidik.">

    <!-- Meta Keywords -->
    <meta name="keywords"
        content="SMK NU Hasyim Asy'ari 2 Kudus, sistem informasi sekolah, absensi online, pendidikan, sekolah terbaik di Kudus, akademik SMK NU Kudus, sistem akademik digital">

    <!-- Meta Author -->
    <meta name="author" content="SMK NU Hasyim Asy'ari 2 Kudus">

    <meta name="google-site-verification" content="kode_verifikasi_google">
    <meta name="msvalidate.01" content="kode_verifikasi_bing">

    <meta property="og:locale" content="id_ID">

    {{-- twitter --}}
    <meta name="twitter:site" content="@smkhasyimasyari2kudus">
    <meta name="twitter:creator" content="@smkhasyimasyari2kudus">


    <!-- Open Graph untuk Facebook -->
    <meta property="og:title" content="SMK NU Hasyim Asy'ari 2 Kudus - Sistem Informasi Sekolah">
    <meta property="og:description"
        content="SMK NU Hasyim Asy'ari 2 Kudus menyediakan sistem informasi sekolah berbasis web untuk kemudahan akademik dan administrasi siswa serta guru.">
    <meta property="og:image" content="{{ asset('storage/logo/logo_smk_hasyim_asyari_2_kudus.png') }}">
    <meta property="og:image:alt" content="Logo SMK NU Hasyim Asy'ari 2 Kudus">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    @stack('meta')
    <!-- Ganti dengan URL gambar -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Meta Title -->
    <title>SMK NU Hasyim Asy'ari 2 Kudus - Sistem Informasi Sekolah Terintegrasi</title>


    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="SMK NU Hasyim Asy'ari 2 Kudus - Sistem Informasi Sekolah">
    <meta name="twitter:description"
        content="Sistem informasi sekolah digital untuk mendukung kegiatan akademik di SMK NU Hasyim Asy'ari 2 Kudus.">
    <meta name="twitter:image" content="{{ asset('logo/logo_smk_hasyim_asyari_2_kudus.png') }}">
    <!-- Ganti dengan URL gambar -->

    <!-- Canonical URL -->
    <link rel="canonical" href="https://www.example.com"> <!-- Ganti dengan URL website -->

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('logo/logo_smk_hasyim_asyari_2_kudus.png') }}" sizes="32x32"
        type="image/x-icon">
    <!-- Ganti dengan URL favicon -->

    <!-- Schema Markup JSON-LD -->
    <script type="application/ld+json">
        {
            "@context": "{{  env('APP_URL') }}",
            "@type": "EducationalOrganization",
            "name": "SMK NU Hasyim Asy'ari 2 Kudus",
            "description": "SMK NU Hasyim Asy'ari 2 Kudus adalah sekolah berbasis Islam yang menyediakan pendidikan berkualitas dan sistem informasi akademik digital.",
            "email": "info@smkhasyimasyari2kudus.ac.id",
            "url": "{{  env('APP_URL') }}",
            "logo": "{{ asset('logo/logo_smk_hasyim_asyari_2_kudus.png') }}",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "Jl. Sudimoro, Sudimoro, Karangmalang, Kec. Gebog",
                "addressLocality": "Kudus",
                "addressRegion": "Jawa Tengah",
                "postalCode": "59333",
                "addressCountry": "ID"
            },
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "+62 85725091919",
                "contactType": "customer service",
                "availableLanguage": "Indonesian"
            },
            "sameAs": [
                "https://www.facebook.com/smkhasyimasyari2kudus",
                "https://www.instagram.com/smkhasyimasyari2kudus"
            ]
        }
        </script>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link href="{{ asset('assets/@iconscout/unicons/css/line.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">

    {{-- bootstrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">


    {{-- link inport tailwind --}}
    @vite('resources/css/app.css')


</head>

<body class="index-page overflow-x-hidden bg-slate-50">
    <!-- ======= Top Bar ======= -->
    <header id="header" class="header sticky-top">
        @include('public.partials.header', [
            'image_header' => $dataFront ? $dataFront->image_header : null,
            'title' => $dataFront ? $dataFront->title : null,
            'width' => $dataFront ? $dataFront->width : null,
        ])
    </header>
    <!-- End Header -->

    <!-- ======= main Section ======= -->
    <div class="main">
        @yield('main')
    </div>
    <!-- End main Section -->


    <div class="content">
        @yield('content')
        <!-- Scroll Top -->
    </div>
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>



    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer bg-cyan-900 w-full ">
        @include('public.partials.footer', [
            'image_footer' => $dataFront ? $dataFront->image_footer : null,
            'title' => $dataFront ? $dataFront->title : null,
            'width' => $dataFront ? $dataFront->width : null,
        ])
    </footer>
    <!-- End Footer -->



    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <script src="{{ asset('assets/js/watermak-copy.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @vite('resources/js/app.js')

    {{-- bootstrap CDN  --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
