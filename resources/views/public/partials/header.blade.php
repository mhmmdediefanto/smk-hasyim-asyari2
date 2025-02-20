<div class="branding d-flex align-items-center px-3">
    <div class="max-w-[1200px] position-relative flex items-center justify-between w-full mx-auto">
        <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto">
            <img src="{{ asset('logo/logotagline.png') }}" alt="" class="w-52">
        </a>

        <nav id="navmenu" class="navmenu justify-end">
            <ul>
                <li><a href="{{ route('home') }}" class=""><span
                            class="font-neutrif text-slate-900 {{ Route::is('home') ? 'active' : '' }} ">Home</span></a>
                </li>

                {{-- Profile --}}
                <li class="dropdown">
                    <a href="#"><span
                            class="font-neutrif text-slate-900 {{ Route::is('sejarah-sekolah', 'visi-misi', 'kepala-sekolah', 'wakil-kepala-sekolah', 'kepala-tata-usaha', 'guru', 'tenaga-kependidikan', 'data-peserta-didik') ? 'active' : '' }}">Profile</span>
                        <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li class="dropdown">
                            <a href="#"><span class="font-neutrif text-slate-950">Tentang Sekolah</span> <i
                                    class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="{{ route('sejarah-sekolah') }}"><span
                                            class="font-neutrif text-slate-950">Sejarah
                                            Sekolah</span></a></li>
                                <li><a href="{{ route('visi-misi') }}"><span class="font-neutrif text-slate-950">Visi
                                            dan
                                            Misi</span></a></li>
                            </ul>
                        </li>
                        <li class="dropdown font-neutrif">
                            <a href="#"><span class="font-neutrif text-slate-950">Civitas Akademik</span> <i
                                    class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="{{ route('kepala-sekolah') }}"><span
                                            class="font-neutrif text-slate-950">Kepala
                                            Sekolah</span></a></li>
                                <li><a href="{{ route('wakil-kepala-sekolah') }}"><span
                                            class="font-neutrif text-slate-950">Wakil Kepala Sekolah</span></a></li>
                                <li><a href="{{ route('kepala-tata-usaha') }}"><span
                                            class="font-neutrif text-slate-950">Kepala Tata Usaha</span></a></li>
                                <li><a href="{{ route('guru') }}"><span
                                            class="font-neutrif text-slate-950">Guru</span></a></li>
                                <li><a href="{{ route('tenaga-kependidikan') }}"><span
                                            class="font-neutrif text-slate-950">Tenaga Kependidikan</span></a></li>
                                <li><a href="{{ route('data-peserta-didik') }}"><span
                                            class="font-neutrif text-slate-950">Data Peserta Didik</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                {{-- Kejuruan --}}
                <li class="dropdown ">
                    <a href="#"><span class="font-neutrif text-slate-950">Kejuruan</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{ route('busana-fashion') }}"><span class="font-neutrif text-slate-950">Busana
                                    Fashion</span></a></li>
                        <li><a href="{{ route('tjkt') }}"><span class="font-neutrif text-slate-950">Teknik Jaringan
                                    Komputer
                                    dan Telekomunikasi</span></a></li>
                    </ul>
                </li>

                {{-- Ekstra Kulikuler --}}
                <li class="dropdown">
                    <a href="#"><span class="font-neutrif text-slate-950">Ekstra Kulikuler</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{ route('pramuka') }}"><span
                                    class="font-neutrif text-slate-950">Pramuka</span></a></li>
                        <li><a href="{{ route('bola-volly') }}"><span class="font-neutrif text-slate-950">Bola
                                    Volly</span></a></li>
                        <li><a href="{{ route('pmr') }}"><span class="font-neutrif text-slate-950">PMR</span></a></li>
                        <li><a href="{{ route('rebana-qiroah') }}"><span class="font-neutrif text-slate-950">Rebana
                                    Qiroah</span></a></li>
                        <li><a href="{{ route('futsal') }}"><span class="font-neutrif text-slate-950">Futsal</span></a>
                        </li>
                        <li><a href="{{ route('bulu-tangkis') }}"><span class="font-neutrif text-slate-950">Bulu
                                    Tangkis</span></a>
                        </li>
                    </ul>
                </li>

                {{-- Sarana dan Prasarana --}}
                <li class="dropdown">
                    <a href="#"><span class="font-neutrif text-slate-950">Sarana dan Prasarana</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{ route('ruang-kelas') }}"><span class="font-neutrif text-slate-950">Ruang
                                    Kelas</span></a></li>
                        <li><a href="{{ route('lab-busana') }}"><span class="font-neutrif text-slate-950">Laboratorium
                                    Busana</span></a></li>
                        <li><a href="{{ route('lab-tjkt') }}"><span class="font-neutrif text-slate-950">Laboratorium
                                    TJKT</span></a></li>
                        <li><a href="{{ route('perpustakaan') }}"><span
                                    class="font-neutrif text-slate-950">Perpustakaan</span></a></li>
                        <li><a href="{{ route('musholla') }}"><span
                                    class="font-neutrif text-slate-950">Musholla</span></a></li>
                        <li><a href="{{ route('ruang-kesenian') }}"><span class="font-neutrif text-slate-950">Ruang
                                    Kesenian</span></a></li>
                        <li><a href="{{ route('ruang-guru') }}"><span class="font-neutrif text-slate-950">Ruang
                                    Guru</span></a></li>
                        <li><a href="{{ route('kantor-tu') }}"><span class="font-neutrif text-slate-950">Kantor
                                    TU</span></a></li>
                    </ul>
                </li>

                {{-- Portal --}}
                <li class="dropdown">
                    <a href="#"><span class="font-neutrif text-slate-950">Portal Skahada</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{ route('ppdb') }}"><span class="font-neutrif text-slate-950">PPDB</span></a>
                        </li>
                        <li><a href="{{ route('absensi-pkl') }}"><span class="font-neutrif text-slate-950">Absensi
                                    PKL</span></a></li>
                    </ul>
                </li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
    </div>
</div>
