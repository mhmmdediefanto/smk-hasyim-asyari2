<div class="branding d-flex align-items-center px-3">
    <div class="max-w-[1200px] position-relative flex items-center justify-between w-full mx-auto">
        <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto">
            <img src="{{ asset('assets/img/logo.png') }}" alt="">
        </a>

        <nav id="navmenu" class="navmenu justify-end">
            <ul>
                <li><a href="{{ route('home') }}" class="active">Home</a></li>

                {{-- Profile --}}
                <li class="dropdown">
                    <a href="#"><span>Profile</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li class="dropdown">
                            <a href="#"><span>Tentang Sekolah</span> <i
                                    class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="{{ route('sejarah-sekolah') }}">Sejarah Sekolah</a></li>
                                <li><a href="{{ route('visi-misi') }}">Visi dan Misi</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#"><span>Civitas Akademik</span> <i
                                    class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="{{ route('kepala-sekolah') }}">Kepala Sekolah</a></li>
                                <li><a href="{{ route('wakil-kepala-sekolah') }}">Wakil Kepala Sekolah</a></li>
                                <li><a href="{{ route('kepala-tata-usaha') }}">Kepala Tata Usaha</a></li>
                                <li><a href="{{ route('guru') }}">Guru</a></li>
                                <li><a href="{{ route('tenaga-kependidikan') }}">Tenaga Kependidikan</a></li>
                                <li><a href="{{ route('data-peserta-didik') }}">Data Peserta Didik</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                {{-- Kejuruan --}}
                <li class="dropdown">
                    <a href="#"><span>Kejuruan</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{ route('busana-fashion') }}">Busana Fashion</a></li>
                        <li><a href="{{ route('tjkt') }}">Teknik Jaringan Komputer dan Telekomunikasi</a></li>
                    </ul>
                </li>

                {{-- Ekstra Kulikuler --}}
                <li class="dropdown">
                    <a href="#"><span>Ekstra Kulikuler</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{ route('pramuka') }}">Pramuka</a></li>
                        <li><a href="{{ route('bola-volly') }}">Bola Volly</a></li>
                        <li><a href="{{ route('pmr') }}">PMR</a></li>
                        <li><a href="{{ route('rebana-qiroah') }}">Rebana Qiroah</a></li>
                        <li><a href="{{ route('futsal') }}">Futsal</a></li>
                        <li><a href="{{ route('bulu-tangkis') }}">Bulu Tangkis</a></li>
                    </ul>
                </li>

                {{-- Sarana dan Prasarana --}}
                <li class="dropdown">
                    <a href="#"><span>Sarana dan Prasarana</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{ route('ruang-kelas') }}">Ruang Kelas</a></li>
                        <li><a href="{{ route('lab-busana') }}">Laboratorium Busana</a></li>
                        <li><a href="{{ route('lab-tjkt') }}">Laboratorium TJKT</a></li>
                        <li><a href="{{ route('perpustakaan') }}">Perpustakaan</a></li>
                        <li><a href="{{ route('musholla') }}">Musholla</a></li>
                        <li><a href="{{ route('ruang-kesenian') }}">Ruang Kesenian</a></li>
                        <li><a href="{{ route('ruang-guru') }}">Ruang Guru</a></li>
                        <li><a href="{{ route('kantor-tu') }}">Kantor TU</a></li>
                    </ul>
                </li>

                {{-- Portal --}}
                <li class="dropdown">
                    <a href="#"><span>Portal Skahada</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{ route('ppdb') }}">PPDB</a></li>
                        <li><a href="{{ route('absensi-pkl') }}">Absensi PKL</a></li>
                    </ul>
                </li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
    </div>
</div>
