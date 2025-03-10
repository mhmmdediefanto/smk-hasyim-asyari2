<!-- Sidebar Menu Start -->
<div class="app-menu">

    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="logo-box">
        <img src="{{ asset('logo/logo_smk_fiks.png') }}" class="logo-light h-6" alt="Smk Nu Hasyim Asy'ari 2 Kudus">
        <img src="{{ asset('logo/logo_smk_fiks.png') }}" class="logo-dark h-6" alt="Smk Nu Hasyim Asy'ari 2 Kudus">
    </a>

    <!--- Menu -->
    <div data-simplebar>
        <ul class="menu">
            <li class="menu-title">Menu</li>

            <li class="menu-item">
                <a href="{{ route('dashboard') }}" class="menu-link {{ Request::is('dashboard') ? 'active' : '' }} ">
                    <span class="menu-icon"><i class="uil uil-estate"></i></span>
                    <span class="menu-text"> Dashboard </span>
                    <span class="badge bg-primary rounded ms-auto">01</span>
                </a>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-hs-collapse="#beritaInformasi"
                    class="menu-link {{ Request::is('dashboard/berita*') ? 'active' : '' }}">
                    <span class="menu-icon"><i class="uil uil-file-plus"></i></span>
                    <span class="menu-text"> Berita - Informasi </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul id="beritaInformasi" class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="{{ route('dashboard.berita') }}"
                            class="menu-link {{ Request::is('dashboard/berita') ? 'active text-cyan-500' : '' }}">
                            <span class="menu-dot"></span>
                            <span class="menu-text">Berita</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('dashboard.kategori-berita') }}"
                            class="menu-link {{ Request::is('dashboard/kategori-berita') ? 'active text-cyan-500' : '' }}">
                            <span class="menu-dot"></span>
                            <span class="menu-text">Kategori Berita</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0)" data-hs-collapse="#agendaKegiatan"
                    class="menu-link {{ Request::is('dashboard/agenda-kegiatan*') ? 'active' : '' }}">
                    <span class="menu-icon"><i class="uil uil-bookmark-full"></i></span>
                    <span class="menu-text"> Agenda Kegiatan </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul id="agendaKegiatan" class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="{{ route('dashboard.agenda-kegiatan') }}"
                            class="menu-link {{ Request::is('dashboard/agenda-kegiatan') ? 'active text-cyan-500' : '' }}">
                            <span class="menu-dot"></span>
                            <span class="menu-text">Agenda</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-title">Content</li>

            <li class="menu-item">
                <a href="{{ route('dashboard.settings') }}"
                    class="menu-link {{ Request::is('dashboard/settings') ? 'active' : '' }}">
                    <span class="menu-icon"><i class="uil uil-setting"></i></span>
                    <span class="menu-text"> Settings </span>
                </a>
                <a href="{{ route('dashboard.carousel-management') }}"
                    class="menu-link {{ Request::is('dashboard/carousel-management') ? 'active' : '' }}">
                    <span class="menu-icon"><i class="uil uil-coronavirus"></i></span>
                    <span class="menu-text"> Carousel </span>
                </a>
            </li>

            <li class="menu-title">Akademik</li>

            {{-- <li class="menu-item">
                <a href="javascript:void(0)" data-hs-collapse="#sidenavExtraPages" class="menu-link">
                    <span class="menu-icon"><i class="uil uil-file-plus"></i></span>
                    <span class="menu-text"> Extra Pages </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul id="sidenavExtraPages" class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="pages-starter.html" class="menu-link">
                            <span class="menu-dot"></span>
                            <span class="menu-text">Starter</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="pages-invoice.html" class="menu-link">
                            <span class="menu-dot"></span>
                            <span class="menu-text">Invoice</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="pages-maintenance.html" class="menu-link">
                            <span class="menu-dot"></span>
                            <span class="menu-text">Maintenance</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-hs-collapse="#sidenavAuthPages" class="menu-link">
                    <span class="menu-icon"><i class="uil uil-sign-in-alt"></i></span>
                    <span class="menu-text"> Auth Pages </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul id="sidenavAuthPages" class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="auth-login.html" class="menu-link">
                            <span class="menu-dot"></span>
                            <span class="menu-text">Log In</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="auth-register.html" class="menu-link">
                            <span class="menu-dot"></span>
                            <span class="menu-text">Register</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="auth-recoverpw.html" class="menu-link">
                            <span class="menu-dot"></span>
                            <span class="menu-text">Recover Password</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="auth-lock-screen.html" class="menu-link">
                            <span class="menu-dot"></span>
                            <span class="menu-text">Lock Screen</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-hs-collapse="#sidenavErrorPages" class="menu-link">
                    <span class="menu-icon"><i class="uil uil-sync-exclamation"></i></span>
                    <span class="menu-text"> Error Pages </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul id="sidenavErrorPages" class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="pages-404.html" class="menu-link">
                            <span class="menu-dot"></span>
                            <span class="menu-text">Error 404</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="pages-500.html" class="menu-link">
                            <span class="menu-dot"></span>
                            <span class="menu-text">Error 500</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-title">Elements</li>

            <li class="menu-item">
                <a href="ui-components.html" class="menu-link">
                    <span class="menu-icon"><i class="uil uil-apps"></i></span>
                    <span class="menu-text"> Components </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-hs-collapse="#sidenavForms" class="menu-link">
                    <span class="menu-icon"><i class="uil uil-file-alt"></i></span>
                    <span class="menu-text"> Forms </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul id="sidenavForms" class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="forms-elements.html" class="menu-link">
                            <span class="menu-dot"></span>
                            <span class="menu-text">Form Elements</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="forms-masks.html" class="menu-link">
                            <span class="menu-dot"></span>
                            <span class="menu-text">Masks</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="forms-editor.html" class="menu-link">
                            <span class="menu-dot"></span>
                            <span class="menu-text">Editor</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="forms-validation.html" class="menu-link">
                            <span class="menu-dot"></span>
                            <span class="menu-text">Validation</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="forms-layout.html" class="menu-link">
                            <span class="menu-dot"></span>
                            <span class="menu-text">Form Layout</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-hs-collapse="#sidenavMaps" class="menu-link">
                    <span class="menu-icon"><i class="uil uil-map-marker"></i></span>
                    <span class="menu-text"> Maps </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul id="sidenavMaps" class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="maps-vector.html" class="menu-link">
                            <span class="menu-dot"></span>
                            <span class="menu-text">Vector Maps</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="maps-google.html" class="menu-link">
                            <span class="menu-dot"></span>
                            <span class="menu-text">Google Maps</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="tables-basic.html" class="menu-link">
                    <span class="menu-icon"><i class="uil uil-th"></i></span>
                    <span class="menu-text"> Tables </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="charts-apex.html" class="menu-link">
                    <span class="menu-icon"><i class="uil uil-chart"></i></i></span>
                    <span class="menu-text"> Chart </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-hs-collapse="#sidenavLevel" class="menu-link">
                    <span class="menu-icon">
                        <i class="uil uil-share-alt"></i>
                    </span>
                    <span class="menu-text"> Level </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul id="sidenavLevel" class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="javascript: void(0)" class="menu-link">
                            <span class="menu-dot"></span>
                            <span class="menu-text">Item 1</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="javascript: void(0)" class="menu-link">
                            <span class="menu-dot"></span>
                            <span class="menu-text">Item 2</span>
                            <span class="badge bg-info rounded ms-auto">New</span>
                        </a>
                    </li>
                </ul>
            </li> --}}

            <li class="menu-item">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button href="javascript:void(0)" class="menu-link">
                        <span class="menu-icon">
                            <i class="uil uil-arrow-circle-right"></i>
                        </span>
                        <span class="menu-text"> Logout </span>

                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>
<!-- Sidebar Menu End  -->
