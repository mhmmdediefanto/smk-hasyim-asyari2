@extends('public.layouts.main')


@section('content')
    <div class="container w-full my-10">
        <header class="bg-blue-600 text-white p-6 text-center ">
            <h1 class="text-3xl font-bold text-white">Kejuruan Busana Fashion</h1>
            <p class="text-lg">SMK NU Hasyim Asy'ari 2 Kudus</p>
        </header>

      <div class="flex justify-center items-center">
        <div class="lg:w-[80%]">
            <section class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-8">
                <img src="https://source.unsplash.com/800x400/?fashion,design" alt="Business Fashion"
                    class="w-full rounded-lg mb-6">
                <h2 class="text-2xl font-semibold mb-4 text-blue-600">Tentang Program Business Fashion</h2>
                <p class="text-gray-700 leading-relaxed">
                    Kejuruan <span class="text-cyan-400">Busana Fashion</span> di SMK NU Hasyim Asy'ari 2 Kudus bertujuan untuk mencetak siswa yang terampil
                    dalam industri fashion, mulai dari desain, produksi, hingga pemasaran produk fashion.
                </p>
            </section>
    
            <section class="max-w-4xl mx-auto p-6 mt-8">
                <h2 class="text-2xl font-semibold text-blue-600">Keunggulan Program</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                    <div class="p-4 bg-white shadow-md rounded-lg">
                        <h3 class="text-xl font-semibold">1. Desain Fashion</h3>
                        <p class="text-gray-600">Mempelajari teknik menggambar, pola busana, dan tren fashion terkini.</p>
                    </div>
                    <div class="p-4 bg-white shadow-md rounded-lg">
                        <h3 class="text-xl font-semibold">2. Produksi Pakaian</h3>
                        <p class="text-gray-600">Menguasai teknik menjahit, pemilihan bahan, dan finishing produk.</p>
                    </div>
                    <div class="p-4 bg-white shadow-md rounded-lg">
                        <h3 class="text-xl font-semibold">3. Pemasaran Produk</h3>
                        <p class="text-gray-600">Mempelajari strategi pemasaran digital dan branding produk fashion.</p>
                    </div>
                    <div class="p-4 bg-white shadow-md rounded-lg">
                        <h3 class="text-xl font-semibold">4. Wirausaha Fashion</h3>
                        <p class="text-gray-600">Membekali siswa dengan keterampilan bisnis untuk memulai usaha fashion sendiri.
                        </p>
                    </div>
                </div>
            </section>
    
        </div>
      </div>
    </div>
@endsection
