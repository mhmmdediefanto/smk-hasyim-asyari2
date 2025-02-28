<div class="container footer-top bg-cyan-900 text-white">
    <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
            <a href="index.html" class="logo d-flex align-items-center">
                @if ($image_footer)
                    <img src="{{ Storage::url($image_footer) }}" alt="{{ $title ?? '' }}"
                        width="{{ $width ? $width : '' }}">
                @else
                    <img src="{{ asset('logo/logotagline.png') }}" alt="">
                @endif
            </a>
            <div class="footer-contact pt-3">
                <p class="font-neutrif">Jl. Sudimoro, Sudimoro, Karangmalang, Kec. Gebog, Kabupaten Kudus, Jawa Tengah
                    59333</p>

                <p class="mt-3 font-neutrif"><strong>Phone:</strong> <span>(0291) 431063 / 085725091919</span></p>
                <p class="font-neutrif"><strong>Email:</strong> <a
                        href="mailto:smk_nuha2@yahoo.com"><span>smk_nuha2@yahoo.com</span></a></p>
            </div>
            <div class="social-links d-flex mt-4">
                <a href="" class="text-white"><i class="bi bi-twitter-x text-white"></i></a>
                <a href="" class="text-white"><i class="bi bi-facebook text-white"></i></a>
                <a href="" class="text-white"><i class="bi bi-instagram text-white"></i></a>
                <a href="" class="text-white"><i class="bi bi-linkedin text-white"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-md-3 footer-links text-white">
            <h4 class="text-white font-neutrif">Navigasi</h4>
            <ul>
                <li><a href="{{ route('home') }}" class="text-white font-neutrif">Home</a></li>
                <li><a href="{{ route('visi-misi') }}" class="text-white font-neutrif">Profile</a></li>
                <li><a href="{{ route('program-keahlian') }}"
                        class="text-white font-neutrif hover:text-cyan-600">Program Keahlian</a></li>
                <li><a href="{{ route('berita') }}" class="text-white font-neutrif">Berita / Pengumuman</a></li>
                <li><a href="{{ route('agenda-kegiatan') }}" class="text-white font-neutrif">Agenda Sekolah</a></li>
            </ul>
        </div>

        <div class="col-lg-4 col-md-3 footer-links text-white">
            <h4 class="text-white">Layanan</h4>
            <ul>
                <li><a href="#"
                        class="text-white font-neutrif hover:text-cyan-200 transition-all ease-in-out duration-300">Bursa
                        kerja Khusus (BKK)</a></li>
                <li><a href="#"
                        class="text-white font-neutrif hover:text-cyan-200 transition-all ease-in-out duration-300">Praktek
                        Kerja Industri (Prakerin)</a></li>
                <li><a href="#"
                        class="text-white font-neutrif hover:text-cyan-200 transition-all ease-in-out duration-300">E-Raport</a>
                </li>
                <li><a href="#"
                        class="text-white font-neutrif hover:text-cyan-200 transition-all ease-in-out duration-300">Perpustakaan
                        Digital</a></li>
                <li><a href="#"
                        class="text-white font-neutrif hover:text-cyan-200 transition-all ease-in-out duration-300">Ekstra
                        Kulikuler</a></li>
            </ul>
        </div>

    </div>
</div>

<div class="container copyright text-center bg-cyan-950 text-white">
    <p class="font-neutrif">© <span>Copyright</span> <strong class="px-1 sitename"><a href="{{ route('home') }}">SMK NU
                HASYIM ASY'ARI 2
                KUDUS</a></strong> <span>All Rights Reserved</span></p>
</div>
