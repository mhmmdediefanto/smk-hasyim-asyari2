@extends('public.layouts.main')

@section('content')
    <div class="max-w-[1200px] container my-10 lg:px-16">
        <div class="flex flex-col justify-between lg:flex-row-reverse items-center">
            <x-breadcrumbs  class="font-neutrif"/>
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
                        </div>

                        <hr class="my-4">
                        <div class="mt-4 font-tinos text-justify">
                            {!! $berita->body !!}
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
