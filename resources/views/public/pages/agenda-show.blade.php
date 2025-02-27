@extends('public.layouts.main')

@section('content')
    @push('meta')
        <meta property="og:image" content="{{ asset('storage/' . $agenda->image) }}">
    @endpush
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
                        {{-- share  --}}
                        <div>
                            <i class="uil uil-share-alt text-2xl text-cyan-400"></i>
                            <div class="flex items-center gap-2">
                                <p class="font-neutrif to-slate-400 text-sm lg:text-lg capitalize">share :</p>

                                <div class="flex items-center gap-1">
                                    <!-- Share ke WhatsApp -->
                                    <a href="https://api.whatsapp.com/send?text={{ urlencode($agenda->title . ' ' . url()->current()) }}"
                                        target="_blank">
                                        <i class="uil uil-whatsapp-alt text-green-700 text-2xl"></i>
                                    </a>

                                    <!-- Share ke YouTube (tidak relevan, bisa dihapus atau ganti Twitter) -->
                                    <a href="https://twitter.com/intent/tweet?text={{ urlencode($agenda->title . ' ' . url()->current()) }}"
                                        target="_blank">
                                        <i class="uil uil-twitter text-blue-500 text-2xl"></i>
                                    </a>

                                    <!-- Share ke Facebook -->
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                        target="_blank">
                                        <i class="uil uil-facebook text-blue-700 text-2xl"></i>
                                    </a>

                                    <!-- Share ke Instagram (Instagram tidak mendukung direct sharing, bisa diarahkan ke profil) -->
                                    <a href="https://www.instagram.com/" target="_blank">
                                        <i class="uil uil-instagram-alt text-pink-600 text-2xl"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col w-full bg-white shadow-md p-3">

                @include('public.components.Cari')

                <div class="my-3 flex flex-col gap-4">
                    <div class="grid grid-cols-1 lg:gap-4 gap-3">
                        @foreach ($agendasTerbaru as $agendaNew)
                            <div data-aos="zoom-in-up"
                                class="w-full shadow-sm rounded-lg overflow-hidden bg-white px-3 py-3 flex flex-row gap-2 items-center">
                                <div class="w-16 h-16 rounded-lg overflow-hidden flex items-center justify-center flex-col "
                                    style="background-color: #F1F1F1">
                                    <p class="font-neutrif font-bold text-slate-900 text-[16px]">
                                        {{ \Carbon\Carbon::parse($agendaNew->tanggal_mulai)->format('M') }}</p>
                                    <p class="font-neutrif font-bold text-slate-900 text-[16px]">
                                        {{ \Carbon\Carbon::parse($agendaNew->tanggal_mulai)->format(' d') }}</p>
                                </div>
                    
                                <div class="flex flex-col w-[310px]">
                                    <a href="{{ route('agenda-kegiatan.show', $agendaNew->slug) }}"
                                        class="text-[16px] lg:text-[16px] font-semibold font-neutrif text-slate-800 cursor-pointer hover:text-cyan-500 transition-all ease-in-out duration-300 capitalize">{{ $agendaNew->title }}
                                    </a>
                                    <span class="text-[10px] text-slate-500 font-neutrif lg:text-sm"> <i
                                            class="uil uil-calender text-lg"></i> {{ $agendaNew->tanggal_mulai_formatted }}</span>
                                    <p class=" text-[12px] text-slate-500 lg:text-sm font-neutrif"> <i
                                            class="uil uil-map-marker text-lg"></i> {{ $agendaNew->tempat }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
