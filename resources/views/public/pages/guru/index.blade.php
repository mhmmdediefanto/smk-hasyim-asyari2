@extends('public.layouts.main')

@section('content')
    <div class="container mx-auto py-10 bg-gradient-to-br from-white to-cyan-400"  >
       <div class="flex flex-col items-center space-y-2 lg:space-y-4 mb-8">
        <h1 class="text-2xl font-bold text-center font-neutrif text-gray-800 lg:text-3xl">Galeri Foto Guru</h1>
        <h2 class="text-2xl font-bold text-center font-neutrif text-gray-800 lg:text-3xl">SMK NU Hasyim Asy'ari 2 Kudus</h2>
        <p class="text-center font-neutrif italic text-slate-700 text-sm">Tahun 2024/2025</p>
       </div>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 ">
            <!-- Contoh looping foto guru -->
            @forelse ($guruPhotos as $guru)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden p-4 text-center w-full " data-aos="fade-up">
                    <div class="w-full h-[270px] lg:h-[220px] flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('FOTO_GURU/' . $guru['file']) }}" alt="{{ $guru['name'] }}"
                            class="lg:w-[250px] w-[290px] hover:scale-125 transition-all ease-in-out duration-700 h-auto mx-auto mt-28 rounded-lg overflow-hidden">
                    </div>
                    <div class="mt-2">

                        <p class="text-sm text-slate-800 font-neutrif">{{ $guru['name'] }}</p>
                    </div>
                </div>
            @empty
                <p>Tidak ada data foto guru</p>
            @endforelse

        </div>
    </div>
@endsection
