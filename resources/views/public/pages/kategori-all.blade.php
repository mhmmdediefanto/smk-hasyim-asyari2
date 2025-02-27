@extends('public.layouts.main')

@section('content')
    <div class="w-full container my-10">
        <div class="w-full bg-cyan-200 shadow-sm p-10 mb-5 rounded-lg  text-center">
            <h2 class="font-neutrif text-2xl font-semibold capitalize">Daftar list kategori berita</h2>
        </div>
        <div class="flex flex-wrap gap-3 items-center justify-center">
            @forelse ($kategories as $kategori)
                <a href="{{ route('berita.kategori', ['slug' => $kategori->slug]) }}" data-aos="fade-up">
                    <div class="lg:w-[350px] md:w-[330px] w-full h-auto p-5 rounded-lg bg-cyan-300 shadow-md">
                        <div class="flex flex-col">
                            <h1 class="font-neutrif font-semibold text-lg">{{ $kategori->name }}</h1>
                        </div>
                    </div>
                </a>
            @empty
                <p>Kategori Masih Kosong</p>
            @endforelse
        </div>
    </div>
@endsection
