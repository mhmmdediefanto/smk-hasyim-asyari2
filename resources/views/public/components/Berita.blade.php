<section class="mt-10 w-full bg-slate-50 ">
    <div class="container">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 ">
            <div class="grid grid-cols-1  lg:col-span-2">

                <div class="flex justify-center ">
                    <h1 data-aos="fade-up"
                        class="text-xl font-bold mb-4  font-neutrif text-slate-800 border-b-2 inline border-cyan-500">
                        Berita
                        Terbaru</h1>
                </div>


                <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-4 gap-4 ">

                    {{-- @foreach ($beritas as $berita)
                            <div class="max-w-md mx-auto bg-white  shadow-md overflow-hidden ">
                                <div class="">
                                    <img src="{{ asset('storage/'. $berita->image) }}" alt="Berita"
                                        class="w-full h-56 object-cover">
                                </div>
                                <div class="p-4 -mt-10 bg-white  shadow-lg mx-4 relative">
                                    <div class="flex items-center text-gray-500 text-sm space-x-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2"></path>
                                        </svg>
                                        <span>13 Feb 2025 13:00 WIB</span>
                                    </div>
                                    @php
                                                // Potong excerpt menjadi 100 karakter
                                                $excerptTitle = substr($berita->title, 0, 75);
                                                // Menambahkan "..." jika teks terpotong
                                                $excerptForTitle = rtrim($excerptTitle, '.') . '...';
                                            @endphp
                                    <h2 class="text-lg font-bold text-slate-800 mt-2 hover:underline cursor-pointer">
                                        {{ $excerptForTitle }}
                                    </h2>

                                    @php
                                                // Potong excerpt menjadi 100 karakter
                                                $excerpt = substr($berita->excerpt, 0, 125);
                                                // Menambahkan "..." jika teks terpotong
                                                $excerpt = rtrim($excerpt, '.') . '...';
                                            @endphp
                                    <p class="text-gray-600 text-sm mt-1">
                                        {{ $excerpt }}
                                    </p>
                                </div>
                            </div>
                        @endforeach --}}
                    @foreach ($beritas as $berita)
                        <div class="w-full h-auto overflow-hidden " data-aos="fade-up">
                            <div class="w-full overflow-hidden shadow-sm">
                                <img src="{{ asset('storage/' . $berita->image) }}" alt=""
                                    class="w-full h-[215px] lg:h-[230px] hover:scale-110 transition duration-500 ease-in-out">
                            </div>
                            <div class="w-full h-full relative top-[-50px]">
                                <div
                                    class="w-[320px]  md:w-[550px] lg:w-[360px] h-auto mx-auto bg-white hover:border-t-4 hover:border-t-cyan-400 p-3 transition duration-500 ease-in-out shadow-sm">
                                    <div class="w-full flex justify-between items-center mb-2">
                                        <span
                                            class="text-[12px] lg:text-[10px] text-gray-500 font-neutrif">{{ $berita->created_at->diffForHumans() }}</span>

                                        <a href=""
                                            class="text-[10px] cursor-pointer lg:text-[10px] bg-cyan-500 text-white py-1 px-2 rounded-lg font-neutrif">{{ $berita->kategoriBerita->name }}</a>
                                    </div>
                                    <div class="w-full">
                                        @php
                                            // Potong excerpt menjadi 100 karakter
                                            $excerptTitle = substr($berita->title, 0, 75);
                                            // Menambahkan "..." jika teks terpotong
                                            $excerptForTitle = rtrim($excerptTitle, '.') . '...';
                                        @endphp
                                        <a href="{{ route('berita.show', $berita->slug) }}"
                                            class="font-neutrif text-[15px] lg:text-sm font-bold text-slate-700 text-clip hover:underline hover:text-cyan-500 transition duration-500 ease-in-out cursor-pointer leading-tight">
                                            {{ $excerptForTitle }}
                                        </a>
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

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="flex justify-center flex-col items-center gap-2">
                    <div class="text-center">
                        <p class="text-lg font-neutrif capitalize font-semibold text-gray-800 ">
                            Dapatkan berita terbaru dan terlengkap dari berbagai kategori hanya di sini!
                        </p>
                    </div>
                    <div class="flex justify-center items-center gap-2">
                        👉
                        <a
                            class="font-neutrif text-sm rounded-full cursor-pointer p-2 bg-cyan-600 border hover:bg-cyan-500 hover:text-white transition duration-500 ease-in-out border-cyan-700">Lihat Semua
                            Berita</a> 👈
                    </div>

                </div>
            </div>
            <div class="gap-4 flex flex-col mt-10 lg:mt-0 ">
                <div class="flex justify-center ">
                    <h1 data-aos="fade-up"
                        class="text-xl font-bold  font-neutrif text-slate-800 border-b-2 block border-cyan-500">
                        Agenda
                        Terbaru</h1>
                </div>
                <div class="grid grid-cols-1">
                    <div data-aos="zoom-in-up"
                        class="w-full shadow-sm rounded-lg overflow-hidden bg-white px-3 py-2 flex flex-row gap-2 items-center">
                        <div class="w-20 h-20 rounded-lg overflow-hidden">
                            <img src="{{ asset('assets/img/services.jpg') }}" alt=""
                                class="w-20 h-20 object-cover rounded-lg shadow-lg">
                        </div>

                        <div>
                            <h2 class="text-[14px] font-semibold font-neutrif text-slate-800">Lorem ipsum dolor sit amet
                                consectetur
                            </h2>
                            <span class="text-[10px] text-gray-500 font-neutrif">12-12-2021</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
