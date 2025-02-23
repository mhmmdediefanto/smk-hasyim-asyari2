@extends('public.layouts.main')

@section('content')
    <div class= "container py-10 w-full" style="background-color: #fbfbfb">
        <div class="container mx-auto px-4 text-center mb-5">
            <h1 class="text-3xl font-bold font-neutrif">Agenda & Kegiatan SMK NU Hasyim Asy'ari 2 Kudus</h1>
            <p class="mt-2 text-lg opacity-90 text-slate-700 font-neutrif">Tetap terupdate dengan kegiatan, pengumuman, dan
                prestasi terbaru.</p>
            <x-breadcrumbs />
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-4 gap-4 ">


            <div class="lg:col-span-2 grid grid-cols-1 gap-4">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">

                    @foreach ($agendas as $agenda)
                        <div class="w-full h-auto overflow-hidden bg-white shadow-md" data-aos="fade-up">
                            <div class="w-full overflow-hidden shadow-sm">
                                <img src="{{ asset('storage/' . $agenda->image) }}"
                                    alt="{{ $agenda->slug }}-smk-nu-hasyim-asy'ari-2-kudus"
                                    class="w-full h-[150px] lg:h-[150px] hover:scale-110 transition duration-500 ease-in-out object-center">
                            </div>
                            <div class="w-full h-full bg-white ">
                                <div
                                    class=" bg-white hover:border-t-4 hover:border-t-cyan-400 p-3 transition duration-500 ease-in-out h-full ">

                                    <div class="w-full">
                                        @php
                                            // Potong excerpt menjadi 100 karakter
                                            $excerptTitle = substr($agenda->title, 0, 75);
                                            // Menambahkan "..." jika teks terpotong
                                            $excerptForTitle = rtrim($excerptTitle, '.') . '...';
                                        @endphp
                                        <a href="{{ route('agenda-kegiatan.show', $agenda->slug) }}"
                                            class="font-neutrif text-[15px] lg:text-lg font-bold text-slate-700 text-clip hover:underline hover:text-cyan-500 transition duration-500 ease-in-out cursor-pointer leading-tight">
                                            {{ $excerptForTitle }}
                                        </a>
                                        <div class="w-full flex gap-2 items-center my-2">
                                            <span
                                                class="text-[12px] lg:text-[10px] text-white font-neutrif bg-cyan-500 rounded-lg py-1 px-2">{{ Carbon\Carbon::parse($agenda->created_at)->format('d M Y H:i:s') }}</span>


                                            <p
                                                class="text-[10px] cursor-pointer lg:text-[10px] bg-cyan-500 text-white py-1 px-2 rounded-lg font-neutrif">
                                                <i class="uil uil-eye"></i> views : 12
                                            </p>
                                        </div>
                                        @php
                                            // Potong excerpt menjadi 100 karakter
                                            $excerpt = substr($agenda->body, 0, 125);
                                            // Menambahkan "..." jika teks terpotong
                                            $excerpt = rtrim($excerpt, '.') . '...';
                                        @endphp

                                        <p class="text-slate-600 mt-2  text-[12px] lg:text-[12px] font-neutrif">
                                            {!! $excerpt !!}
                                        </p>
                                    </div>
                                    <div class="w-full flex justify-end mt-3">
                                        <a href="{{ route('agenda-kegiatan.show', $agenda->slug) }}"
                                            class="text-[12px] cursor-pointer lg:text-[14px] text-white py-1 px-2 rounded-lg font-neutrif bg-gray-400 hover:bg-cyan-500">Baca
                                            Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="w-full flex gap-2 mb-3">
                    {{ $agendas->links('vendor.pagination.tailwind') }}
                </div>
            </div>

            <div class="flex flex-col w-full bg-white shadow-md">
                <h2>halaman berita terbaru</h2>
            </div>
        </div>
    </div>
@endsection
