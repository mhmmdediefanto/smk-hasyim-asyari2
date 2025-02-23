@extends('public.layouts.main')

@section('content')
    <div class= "container py-10 w-full" style="background-color: #fbfbfb">
        <div class="container mx-auto px-4 text-center mb-5">
            <h1 class="text-3xl font-bold font-neutrif">Agenda & Kegiatan SMK NU Hasyim Asy'ari 2 Kudus</h1>
            <p class="mt-2 text-lg opacity-90 text-slate-700 font-neutrif">Tetap terupdate dengan kegiatan, pengumuman, dan
                prestasi terbaru.</p>
            <x-breadcrumbs />
        </div>

        <div class="w-full lg:w-1/2 ">
            <h1 class="font-neutrif lg:text-2xl  text-slate-600 text-md mb-3">{{ $agenda->title }}</h1>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-4 gap-4 ">


            <div class="lg:col-span-2 grid grid-cols-1 gap-4 w-full shadow-md pb-5" style="background-color: #fbfbfb">
                <div class="grid grid-cols-1 gap-4">

                    <div class="w-full">
                        <img src="{{ asset('storage/' . $agenda->image) }}" alt="" class="w-full">
                    </div>
                    <div class="w-full md:px-5 px-3 py-2 flex flex-col ">
                        <h1 class="font-neutrif lg:text-2xl font-bold text-slate-900 text-md mb-3">{{ $agenda->title }}</h1>

                        <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3">
                            <div class="w-full p-4 bg-white border rounded-lg border-gray-400  ">
                                <div class="flex items-center gap-3">
                                    <div>
                                        <i class="uils uil-calendar-alt lg:text-4xl text-2xl text-cyan-300"></i>
                                    </div>
                                    <div>
                                        <p class="font-neutrif text-slate-500 text-[16px]">Tanggal Mulai</p>
                                        <hr>
                                        <p class="font-neutrif text-cyan-700 text-[16px]">
                                            {{ $agenda->tanggal_mulai_formatted }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full p-4 bg-white border rounded-lg border-cyan-300  ">
                                <div class="flex items-center gap-3">
                                    <div>
                                        <i class="uils uil-calendar-alt lg:text-4xl text-2xl text-cyan-300"></i>
                                    </div>
                                    <div>
                                        <p class="font-neutrif text-slate-500 text-[16px]">Tanggal Selesai</p>
                                        <hr>
                                        <p class="font-neutrif text-cyan-700 text-[16px]">
                                            {{ $agenda->tanggal_selesai_formatted }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full p-4 bg-white border rounded-lg border-cyan-300  ">
                                <div class="flex items-center gap-3">
                                    <div>
                                        <i class="uils uil-location-point lg:text-4xl text-2xl text-cyan-300"></i>
                                    </div>
                                    <div>
                                        <p class="font-neutrif text-slate-500 text-[16px]">Lokasi</p>
                                        <hr>
                                        <p class="font-neutrif text-cyan-700 text-[16px]">
                                            {{ $agenda->tempat }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full p-4 bg-white border rounded-lg border-cyan-300  ">
                                <div class="flex items-center gap-3">
                                    <div>
                                        <i class="uils uil-vector-square-alt lg:text-4xl text-2xl text-cyan-300"></i>
                                    </div>
                                    <div>
                                        <p class="font-neutrif text-slate-500 text-[16px]">Penyelenggara</p>
                                        <hr>
                                        <p class="font-neutrif text-cyan-700 text-[16px] capitalize">
                                            {{ $agenda->penyelenggara }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- body --}}

                        <p class="font-neutrif mt-4">{!! $agenda->body !!}</p>

                        <hr class="text-slate-400">
                        <div>
                            <i class="uil uil-share-alt text-2xl text-cyan-400"></i>
                            <p class="font-neutrif to-slate-400 text-sm lg:text-lg capitalize">share :</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col w-full bg-white shadow-md">
                <h2>halaman berita terbaru</h2>
            </div>
        </div>
    </div>
@endsection
