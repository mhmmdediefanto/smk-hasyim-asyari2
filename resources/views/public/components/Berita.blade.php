@extends('public.layouts.main')

@section('content')
    <section class="mt-10 w-full bg-slate-50 ">
        <div class="container ">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 ">
                <div class="grid grid-cols-1  lg:col-span-2">

                    <div class="flex justify-center ">
                        <h1 class="text-xl font-bold mb-4  text-slate-800 border-b-2 inline border-cyan-500">Berita
                            Terbaru</h1>
                    </div>


                    <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-4 gap-4 ">
                        @foreach ($beritas as $berita)
                            <div class="w-full h-auto overflow-hidden ">
                                <div class="w-full overflow-hidden shadow-sm">
                                    <img src="{{ asset('storage/' . $berita->image) }}" alt=""
                                        class="w-full h-[215px] lg:h-[230px] hover:scale-110 transition duration-500 ease-in-out">
                                </div>
                                <div class="w-full h-full relative top-[-50px]">
                                    <div
                                        class="w-[300px]  md:w-[550px] lg:w-[360px] h-full mx-auto bg-white hover:border-t-4 hover:border-t-cyan-400 p-3 transition duration-500 ease-in-out shadow-sm">
                                        <span
                                            class="text-[12px] lg:text-[10px] text-gray-500">{{ $berita->created_at->diffForHumans() }}</span>
                                        <div class="w-full title">
                                            @php
                                                // Potong excerpt menjadi 100 karakter
                                                $excerptTitle = substr($berita->title, 0, 100);
                                                // Menambahkan "..." jika teks terpotong
                                                $excerptForTitle = rtrim($excerptTitle, '.') . '...';
                                            @endphp
                                            <h2
                                                class="text-[15px] lg:text-sm font-bold text-slate-800 text-clip hover:underline hover:text-cyan-500 transition duration-500 ease-in-out cursor-pointer leading-tight">
                                                {{ $excerptForTitle }}
                                            </h2>
                                        </div>

                                        @php
                                            // Potong excerpt menjadi 100 karakter
                                            $excerpt = substr($berita->excerpt, 0, 75);
                                            // Menambahkan "..." jika teks terpotong
                                            $excerpt = rtrim($excerpt, '.') . '...';
                                        @endphp

                                        <p class="text-slate-500 mt-2  text-[13px] lg:text-[12px]">
                                            {!! $excerpt !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
                <div class="gap-4 flex flex-col mt-10 lg:mt-0 ">
                    <div class="flex justify-center ">
                        <h1 class="text-xl font-bold  text-slate-800 border-b-2 block border-cyan-500">Agenda
                            Terbaru</h1>
                    </div>
                    <div class="grid grid-cols-1">
                        <div
                            class="w-full shadow-sm rounded-lg overflow-hidden bg-white p-2 flex flex-row gap-2 items-center">
                            <div class="w-24 h-24 rounded-lg overflow-hidden">
                                <img src="{{ asset('assets/img/services.jpg') }}" alt=""
                                    class="w-24 h-24 object-cover rounded-lg">
                            </div>

                            <div>
                                <h2 class="text-[14px] font-bold text-slate-800">Lorem ipsum dolor sit amet consectetur
                                </h2>
                                <span class="text-[10px] text-gray-500">12-12-2021</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
