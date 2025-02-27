@extends('public.layouts.main')

@section('content')
    <div class="w-full container my-10">
        <header class="bg-blue-600 text-white p-6 text-center">
            <h1 class="text-3xl font-bold text-white font-neutrif">Kejuruan Teknik Komputer Jaringan dan Telekomunikasi</h1>
            <p class="text-lg">SMK NU Hasyim Asy'ari 2 Kudus</p>
        </header>

        <div class="flex justify-center items-center">
            <div class="lg:w-[80%]">
                <section class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-8">
                    <img src="https://source.unsplash.com/800x400/?technology,network" alt="Teknik Komputer dan Jaringan"
                        class="w-full rounded-lg mb-6">
                    <h2 class="text-2xl font-semibold mb-4 text-blue-600">Tentang Program Teknik Komputer Jaringan dan
                        Telekomunikasi
                    </h2>
                    <p class="text-gray-700 leading-relaxed font-neutrif">
                        Kejuruan **Teknik Komputer Jaringan dan Telekomunikasi (TJKT)** di SMK NU Hasyim Asy'ari 2 Kudus
                        bertujuan
                        untuk mencetak siswa yang ahli dalam bidang jaringan komputer, sistem keamanan, serta teknologi
                        telekomunikasi modern.
                    </p>
                </section>

                <section class="max-w-4xl mx-auto p-6 mt-8">
                    <h2 class="text-2xl font-semibold text-blue-600">Keunggulan Program</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                        <div class="p-4 bg-white shadow-md rounded-lg  font-neutrif">
                            <h3 class="text-xl font-semibold">1. Administrasi Jaringan</h3>
                            <p class="text-gray-600">Mempelajari konfigurasi dan manajemen jaringan komputer berbasis LAN
                                dan WAN.
                            </p>
                        </div>
                        <div class="p-4 bg-white shadow-md rounded-lg  font-neutrif">
                            <h3 class="text-xl font-semibold">2. Keamanan Jaringan</h3>
                            <p class="text-gray-600">Menguasai teknik keamanan data, firewall, dan enkripsi untuk melindungi
                                sistem
                                jaringan.</p>
                        </div>
                        <div class="p-4 bg-white shadow-md rounded-lg  font-neutrif">
                            <h3 class="text-xl font-semibold">3. Internet of Things (IoT)</h3>
                            <p class="text-gray-600">Mempelajari teknologi IoT untuk membangun sistem berbasis sensor dan
                                komunikasi.</p>
                        </div>
                        <div class="p-4 bg-white shadow-md rounded-lg  font-neutrif">
                            <h3 class="text-xl font-semibold">4. Telekomunikasi Digital</h3>
                            <p class="text-gray-600">Memahami dasar-dasar teknologi komunikasi seperti fiber optic, VoIP,
                                dan
                                jaringan seluler.</p>
                        </div>
                    </div>
                </section>
            </div>
        </div>


    </div>
@endsection
