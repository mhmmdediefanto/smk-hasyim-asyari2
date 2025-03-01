@extends('public.layouts.main')

@section('content')
    <div class= "container py-10 w-full" style="background-color: #fbfbfb">
        <div class="container mx-auto px-4 text-center mb-5">
            <h1 class="text-3xl font-bold font-neutrif">Informasi & Berita SMK NU Hasyim Asy'ari 2 Kudus</h1>
            <p class="mt-2 text-lg opacity-90 text-slate-700 font-neutrif">Tetap terupdate dengan kegiatan, pengumuman, dan
                prestasi terbaru.</p>
            <x-breadcrumbs />
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-4 gap-4 ">


            <div class="lg:col-span-2 grid grid-cols-1 gap-4">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">

                    @foreach ($beritas as $berita)
                        <div class="w-full h-[400px] bg-white overflow-hidden  shadow-md" data-aos="fade-up">
                            <div class="w-full overflow-hidden shadow-sm">
                                <img src="{{ asset('storage/' . $berita->image) }}"
                                    alt="{{ $berita->slug }}-smk-nu-hasyim-asy'ari-2-kudus"
                                    class="w-full h-[150px] lg:h-[170px] hover:scale-110 transition duration-500 ease-in-out object-center">
                            </div>
                            <div class="w-full h-full ">
                                <div
                                    class=" h-[150px] hover:border-t-4 hover:border-t-cyan-400 p-3 transition duration-500 ease-in-out">

                                    <div class="w-full">
                                        @php
                                            // Potong excerpt menjadi 100 karakter
                                            $excerptTitle = substr($berita->title, 0, 75);
                                            // Menambahkan "..." jika teks terpotong
                                            $excerptForTitle = rtrim($excerptTitle, '.') . '...';
                                        @endphp
                                        <a href="{{ route('berita.show', $berita->slug) }}"
                                            class="font-neutrif text-[15px] lg:text-lg font-bold text-slate-700 text-clip hover:underline hover:text-cyan-500 transition duration-500 ease-in-out cursor-pointer leading-tight">
                                            {{ $excerptForTitle }}
                                        </a>
                                        <div class="w-full flex flex-wrap gap-2 items-center my-2">
                                            <span
                                                class="text-[12px] lg:text-[10px] text-white font-neutrif bg-cyan-500 rounded-lg py-1 px-2">{{ Carbon\Carbon::parse($berita->created_at)->format('d M Y H:i:s') }}</span>

                                            <a href="{{ route('berita.kategori', ['slug' => $berita->kategoriBerita->slug]) }}"
                                                class="text-[10px] cursor-pointer lg:text-[10px] bg-cyan-500 text-white py-1 px-2 rounded-lg font-neutrif">{{ $berita->kategoriBerita->name }}</a>
                                            <p
                                                class="text-[10px] cursor-pointer lg:text-[10px] bg-cyan-500 text-white py-1 px-2 rounded-lg font-neutrif">
                                                <i class="uil uil-eye"></i> views : {{ $berita->logVisitBeritas->count() }}
                                            </p>
                                        </div>
                                        @php
                                            // Potong excerpt menjadi 100 karakter
                                            $excerpt = substr($berita->excerpt, 0, 125);
                                            // Menambahkan "..." jika teks terpotong
                                            $excerpt = rtrim($excerpt, '.') . '...';
                                        @endphp

                                        <p class="text-slate-600 mt-2  text-[12px] lg:text-[12px] font-neutrif">
                                            {!! $excerpt !!}
                                        </p>
                                    </div>
                                    <div class="w-full flex justify-end mt-3">
                                        <a href="{{ route('berita.show', $berita->slug) }}"
                                            class="text-[12px] lg:text-[14px] text-white py-1 px-2 rounded-lg font-neutrif bg-gray-400 hover:bg-cyan-500">Baca
                                            Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="w-full flex gap-2 mb-3">
                    {{ $beritas->links('vendor.pagination.tailwind') }}
                </div>
            </div>

            <div class="flex flex-col w-full bg-white shadow-md p-3">

                @include('public.components.Cari')

                <div class="mb-3 mt-3">
                    <h2
                        class="text-slate-900 font-neutrif font-bold text-lg capitalize mb-3 border-b-2 inline border-cyan-500">
                        berita terbaru</h2>
                </div>
                <div class="grid grid-cols-1 gap-4">
                    @foreach ($beritas->take(5) as $berita)
                        <div class="flex gap-3 items-center">
                            <div class="w-[70px] h-[40px] overflow-hidden">
                                <img src="{{ asset('storage/' . $berita->image) }}" alt="{{ $berita->slug }}"
                                    class="w-full h-full object-cover">
                            </div>

                            @php
                                // Potong excerpt menjadi 100 karakter
                                $title = substr($berita->title, 0, 100);
                                // Menambahkan "..." jika teks terpotong
                                $title = rtrim($title, '.') . '...';
                            @endphp
                            <div class="flex w-full flex-col">
                                <a href="{{ route('berita.show', $berita->slug) }}"
                                    class="font-bold text-slate-900 font-neutrif">{{ $title }}</a>
                                <p class="text-slate-400 italic text-sm font-neutrif mt-1">
                                    {{ $berita->created_at_formatted }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>


                <div class="my-3">
                    <h2
                        class="text-slate-900 font-neutrif font-bold text-lg capitalize mb-3 border-b-2 inline border-cyan-500">
                        Kategori berita</h2>
                    <div class="flex flex-wrap gap-2 mt-3">
                        @forelse ($kategories as $kategori)
                            <a href="{{ route('berita.kategori', ['slug' => $kategori->slug]) }}"
                                class="text-[10px] cursor-pointer lg:text-[10px] bg-cyan-500 text-white py-1 px-2 rounded-lg font-neutrif hover:bg-cyan-300 ">
                                {{ $kategori->name }} </a>
                        @empty
                            <p class="text-slate-600 mt-2  text-[12px] lg:text-[12px] font-neutrif"> Tidak ada kategori </p>
                        @endforelse
                    </div>
                </div>

                <div class="mb-3">
                    <h2
                        class="text-slate-900 font-neutrif font-bold text-lg capitalize mb-3 border-b-2 inline border-cyan-500">
                        berita terpopuler</h2>
                </div>
                <div class="grid grid-cols-1 gap-4">
                    @foreach ($beritaTerpopulers as $beritaTerpopuler)
                        <div class="flex gap-3 items-center">
                            <div class="w-[70px] h-[40px] overflow-hidden">
                                <img src="{{ asset('storage/' . $beritaTerpopuler->image) }}"
                                    alt="{{ $beritaTerpopuler->slug }}" class=" object-cover h-full w-full">
                            </div>
                            @php
                                // Potong excerpt menjadi 100 karakter
                                $title = substr($beritaTerpopuler->title, 0, 100);
                                // Menambahkan "..." jika teks terpotong
                                $title = rtrim($title, '.') . '...';
                            @endphp
                            <div class="flex w-full flex-col">
                                <a href="{{ route('berita.show', $beritaTerpopuler->slug) }}"
                                    class="font-bold text-slate-900 font-neutrif">{{ $title }}</a>
                                <p class="text-slate-400 italic text-sm font-neutrif mt-1">
                                    {{ $beritaTerpopuler->created_at_formatted }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
