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

                    <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-4 gap-4">
                        <div class="w-full  h-[320px] lg:h-[320px] md:h-[300px]  ">
                            <div class="w-full  overflow-hidden  shadow-sm ">

                                <img src="{{ asset('assets/img/services.jpg') }}" alt=""
                                    class="w-full h-[215px] lg:h-[230px] object-cover hover:scale-110 transition duration-500 ease-in-out">
                            </div>
                            <div class="w-full relative top-[-70px] md:top-[-50px] ">
                                <div
                                    class="w-[300px] md:w-[550px] lg:w-[305px] mx-auto bg-white hover:border-t-4 hover:border-t-cyan-400 p-3 transition duration-500 ease-in-out  shadow-sm">
                                    <span class="text-sm lg:text-xs text-gray-500">12-12-2021</span>
                                    <div class="w-full title">
                                        <h2
                                            class="text-lg lg:text-sm font-bold text-slate-800 text-clip 
                                            hover:text-cyan-500 transition duration-500 ease-in-out
                                            cursor-pointer leading-tight">
                                            Lorem ipsum dolor sit amet consectetur adipisicing
                                            elit. Maiores provident fuga</h2>
                                    </div>
                                    <p class="text-slate-500 mt-2 text-justify text-[13px] lg:text-[12px]">Lorem ipsum dolor
                                        sit
                                        amet
                                        consectetur
                                        adipisicing elit. Quisquam,
                                        asperiores.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="gap-4 flex flex-col mt-10 lg:mt-0 ">
                    <div class="flex justify-center ">
                        <h1 class="text-xl font-bold  text-slate-800 border-b-2 block border-cyan-500">Agenda
                            Terbaru</h1>
                    </div>
                    <div class="grid grid-cols-1">
                        <div class="w-full shadow-sm rounded-lg overflow-hidden bg-white p-2 flex flex-row gap-2 items-center">
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
