@extends('public.layouts.main')

@section('content')
@push('meta')
<meta property="og:image" content="{{ asset('storage/' . $berita->image) }}">
@endpush

    <div class="max-w-[1200px] container my-10 lg:px-16">
        <div class="flex flex-col justify-between lg:flex-row-reverse items-center">
            <x-breadcrumbs class="font-neutrif" />
            <h1 class="font-neutrif lg:text-lg font-bold text-slate-600 text-md mb-2">{{ $berita->title }}</h1>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            <div class="grid grid-cols-1 lg:col-span-2">
                <div class="flex flex-col bg-white shadow-sm">
                    <div class="w-full h-auto overflow-hidden mb-1">
                        <img src="{{ asset('storage/' . $berita->image) }}" alt="{{ $berita->slug }}"
                            class="w-full object-cover">
                    </div>
                    <div class="p-4">
                        <div class="w-full flex flex-wrap items-center gap-1 lg:gap-2">
                            <p class="text-[12px] text-gray-500">
                                <i class="uil uil-calendar-alt"></i>
                                {{ $berita->created_at->format('d M Y') }}
                            </p>
                            <p class="text-[12px] text-gray-500"> <i class="uil uil-user"></i> Created by <span
                                    class="text-cyan-500">{{ $berita->user->name }}</span></p>
                            <div class="p-1 text-[10px] text-white bg-cyan-500 rounded-lg mt-2 flex gap-1 items-center">

                                <p> <i class="uil uil-tag"></i> {{ $berita->kategoriBerita->name }}</p>
                            </div>
                            <p
                                class="text-[10px] cursor-pointer lg:text-[10px] bg-cyan-500 text-white py-1 px-2 rounded-lg font-neutrif">
                                <i class="uil uil-eye"></i> views : {{ $berita->logVisitBeritas->count() }}
                            </p>
                        </div>

                        <hr class="my-4">
                        <div class="mt-4 font-tinos text-justify">
                            {!! $berita->body !!}
                        </div>


                        {{-- share --}}
                        <hr class="my-4">
                        <div>
                            <i class="uil uil-share-alt text-2xl text-cyan-400"></i>
                            <div class="flex items-center gap-2">
                                <p class="font-neutrif to-slate-400 text-sm lg:text-lg capitalize">share :</p>

                                <div class="flex items-center gap-1">
                                    <!-- Share ke WhatsApp -->
                                    <a href="https://api.whatsapp.com/send?text={{ urlencode($berita->title . ' ' . url()->current()) }}"
                                        target="_blank">
                                        <i class="uil uil-whatsapp-alt text-green-700 text-2xl"></i>
                                    </a>

                                    <!-- Share ke YouTube (tidak relevan, bisa dihapus atau ganti Twitter) -->
                                    <a href="https://twitter.com/intent/tweet?text={{ urlencode($berita->title . ' ' . url()->current()) }}"
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

        </div>
    </div>
@endsection
