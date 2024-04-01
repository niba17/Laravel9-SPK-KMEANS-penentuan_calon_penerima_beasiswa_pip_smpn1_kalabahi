<!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="/home" class="b-brand">
                <!-- ========   Change your logo from here   ============ -->
                {{-- <img src="{{ asset('template') }}/dist/assets/images/logo-dark.svg" alt="" class="logo logo-lg" /> --}}
                <span class="fw-bold h3 text-gray-700">SPK | KMEANS</span>
            </a>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                {{-- <li class="pc-item pc-caption">
                    <label>Dashboard</label>
                    <i class="ti ti-dashboard"></i>
                </li> --}}
                {{-- <li class="pc-item">
                    <a href="../dashboard/index.html" class="pc-link"><span class="pc-micon"><i
                                class="ti ti-dashboard"></i></span><span class="pc-mtext">Dashboard</span></a>
                </li>
                <li class="pc-item pc-caption">
                    <label>Pages</label>
                    <i class="ti ti-news"></i>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link"><span class="pc-micon"><i class="ti ti-key"></i></span><span
                            class="pc-mtext">Authentication</span><span class="pc-arrow"><i
                                class="ti ti-chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" target="_blank" href="../pages/login-v3.html">Login</a>
                        </li>
                        <li class="pc-item"><a class="pc-link" target="_blank"
                                href="../pages/register-v3.html">register</a></li>
                    </ul>
                </li> --}}

                {{-- <li class="pc-item pc-caption">
                    <label>Elements</label>
                    <i class="ti ti-apps"></i>
                </li> --}}
                <li class="pc-item @if (Request::route()->getName() == 'home') active @endif">
                    <a href="/home" class="pc-link">
                        <span class="pc-micon">
                            <i class="fa-solid fa-house"></i>
                        </span>
                        <span class="pc-mtext">Home</span>
                    </a>
                </li>
                <li class="pc-item pc-hasmenu @if (Request::route()->getName() == 'akun' ||
                        Request::route()->getName() == 'akun-edit' ||
                        Request::route()->getName() == 'kriteria_sub_kriteria' ||
                        Request::route()->getName() == 'kriteria_sub_kriteria-add' ||
                        Request::route()->getName() == 'kriteria_sub_kriteria-edit' ||
                        Request::route()->getName() == 'kriteria-add' ||
                        Request::route()->getName() == 'kriteria-edit' ||
                        Request::route()->getName() == 'siswa-add' ||
                        Request::route()->getName() == 'siswa-edit' ||
                        Request::route()->getName() == 'tingkat_kelas' ||
                        Request::route()->getName() == 'tingkat_kelas-add' ||
                        Request::route()->getName() == 'tingkat_kelas-edit' ||
                        Request::route()->getName() == 'tingkat-add' ||
                        Request::route()->getName() == 'tingkat-edit' ||
                        Request::route()->getName() == 'kelas-add' ||
                        Request::route()->getName() == 'kelas-edit' ||
                        Request::route()->getName() == 'kecamatan_kelurahan' ||
                        Request::route()->getName() == 'kecamatan_kelurahan-add' ||
                        Request::route()->getName() == 'kecamatan_kelurahan-edit' ||
                        Request::route()->getName() == 'kecamatan-add' ||
                        Request::route()->getName() == 'kecamatan-edit' ||
                        Request::route()->getName() == 'kelurahan-add' ||
                        Request::route()->getName() == 'kelurahan-edit' ||
                        Request::route()->getName() == 'perhitungan') active pc-trigger @endif">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="fa-solid fa-box"></i>
                        </span><span class="pc-mtext">Data</span>
                        <span class="pc-arrow">
                            <i class="ti ti-chevron-right"></i>
                        </span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item @if (Request::route()->getName() == 'akun' || Request::route()->getName() == 'akun-edit') active @endif">
                            <a class="pc-link" href="/akun">Akun</a>
                        </li>
                        <li class="pc-item @if (Request::route()->getName() == 'kriteria' ||
                                Request::route()->getName() == 'kriteria-add' ||
                                Request::route()->getName() == 'kriteria-edit') active @endif">
                            <a class="pc-link" href="/kriteria">Kriteria </a>
                        </li>
                        <li class="pc-item @if (Request::route()->getName() == 'siswa_kriteria' ||
                                Request::route()->getName() == 'siswa_kriteria-add' ||
                                Request::route()->getName() == 'siswa_kriteria-edit' ||
                                Request::route()->getName() == 'siswa-add' ||
                                Request::route()->getName() == 'siswa-edit') active @endif">
                            <a class="pc-link" href="/siswa_kriteria">Siswa & Kriteria</a>
                        </li>
                        <li class="pc-item @if (Request::route()->getName() == 'tingkat_kelas' ||
                                Request::route()->getName() == 'tingkat_kelas-add' ||
                                Request::route()->getName() == 'tingkat_kelas-edit' ||
                                Request::route()->getName() == 'tingkat-add' ||
                                Request::route()->getName() == 'tingkat-edit' ||
                                Request::route()->getName() == 'kelas-add' ||
                                Request::route()->getName() == 'kelas-edit') active @endif">
                            <a class="pc-link" href="/tingkat_kelas">Tingkat &
                                Kelas</a>
                        </li>
                        <li class="pc-item @if (Request::route()->getName() == 'kecamatan_kelurahan' ||
                                Request::route()->getName() == 'kecamatan_kelurahan-add' ||
                                Request::route()->getName() == 'kecamatan_kelurahan-edit' ||
                                Request::route()->getName() == 'kecamatan-add' ||
                                Request::route()->getName() == 'kecamatan-edit' ||
                                Request::route()->getName() == 'kelurahan-add' ||
                                Request::route()->getName() == 'kelurahan-edit') active @endif">
                            <a class="pc-link" href="/kecamatan_kelurahan">Kecamatan &
                                Kelurahan</a>
                        </li>
                        <li class="pc-item @if (Request::route()->getName() == 'perhitungan') active @endif">
                            <a class="pc-link" href="#" onclick="kmeans()">Perhitungan</a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="pc-item">
                    <a href="../elements/bc_color.html" class="pc-link"><span class="pc-micon"><i
                                class="ti ti-brush"></i></span><span class="pc-mtext">Color</span></a>
                </li>
                <li class="pc-item">
                    <a href="https://tablericons.com" class="pc-link" target="_blank"><span class="pc-micon"><i
                                class="ti ti-plant-2"></i></span><span class="pc-mtext">Tabler</span><span
                            class="pc-arrow"></a>
                </li>

                <li class="pc-item pc-caption">
                    <label>Other</label>
                    <i class="ti ti-brand-chrome"></i>
                </li>
                <li class="pc-item"><a href="../other/sample-page.html" class="pc-link"><span class="pc-micon"><i
                                class="ti ti-brand-chrome"></i></span><span class="pc-mtext">Sample page</span></a></li>
                <li class="pc-item"><a href="https://codedthemes.gitbook.io/berry-bootstrap/" target="_blank"
                        class="pc-link"><span class="pc-micon"><i class="ti ti-vocabulary"></i></span><span
                            class="pc-mtext">Document</span></a></li> --}}
            </ul>
            {{-- <div class="pc-navbar-card bg-primary rounded">
                <h4 class="text-white">Berry Pro</h4>
                <p class="text-white opacity-75">Checkout Berry pro features</p>
                <a href="https://codedthemes.com/item/berry-bootstrap-5-admin-template/" target="_blank"
                    class="btn btn-light text-primary">Pro</a>
            </div> --}}
        </div>
    </div>
</nav>
<!-- [ Sidebar Menu ] end -->
