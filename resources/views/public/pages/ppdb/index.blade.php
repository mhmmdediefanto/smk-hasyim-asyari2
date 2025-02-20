@extends('public.layouts.main')

@section('content')
    <div class="container w-full  flex justify-center items-center flex-col ">

        <div class="w-full lg:w-[85%] bg-white shadow-sm pt-8 pb-10">
            <div class=" w-full">
                <h2 class="font-bold text-3xl lg:text-5xl text-slate-800 text-center" data-aos-easing="linear" data-aos-duration="500"
                data-aos="zoom-in">Selamat Datang di <span
                        class="text-slate-900 font-bold font-nunito">PPDB SMK NU HASYIM ASY'ARI 2 KUDUS</span> Tahun Ajaran
                    2025/2026</h2>

            </div>
            <div class="mt-5 w-full flex justify-center items-center " data-aos="fade-up">
                <img src="{{ asset('assets/img/ppdb2.jpeg') }}" alt="ppdb Smk nu hasyim asy'ari 2 kudus"
                    class="lg:w-[70%] w-full">
            </div>

            <div class="mt-5 w-full">
                <div class="max-w-3xl mx-auto  p-6 ">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center" data-aos="fade-up">
                        Keunggulan SMK NU Hasyim Asy'ari 2 Kudus
                    </h2>

                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="p-4 font-nunito bg-white shadow-sm" data-aos-easing="linear" data-aos-duration="500"
                            data-aos="zoom-in">
                            <h3 class=" font-bold text-gray-800 mb-2 text-sm font-nunito"> <span
                                    class="text-blue-500 text-3xl font-bold mr-4 ">1.
                                </span> Kemudahan Akses</h3>
                            <p class="text-gray-600 text-[12px]">
                                SMK NU Hasyim Asy'ari 2 Kudus memiliki fasilitas yang memudahkan siswa dalam
                                mengakses informasi dan layanan pendidikan. Mulai dari jadwal pelajaran, informasi akademik,
                                dan fasilitas pendukung lainnya.
                            </p>
                        </div>
                        <div class="p-4 font-nunito bg-white shadow-sm" data-aos-easing="linear" data-aos-duration="500"
                            data-aos="zoom-in">
                            <h3 class=" font-bold text-gray-800 mb-2 text-sm font-nunito"> <span
                                    class="text-blue-500 text-3xl font-bold mr-4 ">2.
                                </span> Fasilitas Lengkap & Modern</h3>
                            <p class="text-gray-600 text-[12px]">
                                Didukung laboratorium, workshop, dan teknologi pembelajaran terkini.
                            </p>
                        </div>
                        <div class="p-4 font-nunito bg-white shadow-sm" data-aos-easing="linear" data-aos-duration="500"
                            data-aos="zoom-in">
                            <h3 class=" font-bold text-gray-800 mb-2 text-sm font-nunito"> <span
                                    class="text-blue-500 text-3xl font-bold mr-4 ">3.
                                </span> Program Magang & Kerjasama</h3>
                            <p class="text-gray-600 text-[12px]">
                                Menyediakan pengalaman kerja nyata melalui kemitraan dengan perusahaan ternama.
                            </p>
                        </div>
                        <div class="p-4 font-nunito bg-white shadow-sm" data-aos-easing="linear" data-aos-duration="500"
                            data-aos="zoom-in">
                            <h3 class=" font-bold text-gray-800 mb-2 text-sm font-nunito"> <span
                                    class="text-blue-500 text-3xl font-bold mr-4 ">4.
                                </span> Pembinaan Karakter & Keagamaan</h3>
                            <p class="text-gray-600 text-[12px]">
                                Mengutamakan pendidikan akhlak dan nilai-nilai keislaman dalam setiap aspek pembelajaran.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="mt-6 flex flex-col items-center text-center px-5 font-poppins" data-aos-easing="linear" data-aos-duration="500"
            data-aos="zoom-in">
                <p class="text-gray-800 font-medium">Jangan lewatkan kesempatan untuk menjadi bagian dari sekolah unggulan
                    ini!</p>
                <p class="text-gray-600 text-sm mb-4">Bergabunglah dengan kami dan wujudkan masa depan cerah bersama SMK NU
                    Hasyim Asy'ari 2 Kudus.</p>

                <div class="flex flex-col md:flex-row gap-4 justify-center">
                    <a href="https://bit.ly/PPDBSMKHA2" target="_blank" data-aos-easing="linear" data-aos-duration="500"
                            data-aos="zoom-in"
                        class="bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg shadow-md 
                    hover:bg-blue-700 transition-transform transform hover:scale-105 hover:shadow-lg 
                    active:scale-95 duration-300 ease-in-out hover:animate-wiggle">
                        📌 Daftar Sekarang
                    </a>
                    <a href="#" data-aos-easing="linear" data-aos-duration="500"
                            data-aos="zoom-in"
                        class="bg-gray-200 text-gray-800 font-semibold py-3 px-6 rounded-lg shadow-md hover:bg-gray-300 transition">
                        🔍 Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes wiggle {

            0%,
            100% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(-3deg);
            }

            50% {
                transform: rotate(3deg);
            }

            75% {
                transform: rotate(-3deg);
            }
        }

        .animate-wiggle {
            animation: wiggle 0.3s ease-in-out;
        }
    </style>
@endsection
