@extends('layouts.master')
@section('title', 'KMEANS | Home')
@section('content')

    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">
            <!-- [ Beradcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10"><a href="/home">Home</a></h5>
                            </div>
                            <ul class="breadcrumb">
                                {{-- <li class="breadcrumb-item"><a href="../navigation/index.html">Akun</a></li> --}}
                                {{-- <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">Sample Page</li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- [ sample-page ] start -->



                <a href="/akun" class="col-xl-6 col-md-6">
                    <div class="card bg-blue-600 dashnum-card text-white overflow-hidden">
                        <span class="round small"></span>
                        <span class="round big"></span>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="avtar avtar-lg">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            <span class="text-white d-block f-18 f-w-500 my-2">Akun
                                <span><i class="fa-solid fa-caret-right px-3"></i>{{ count($akun) }}</span>
                            </span>
                            {{-- <p class="mb-0 opacity-50">{{ count($akun) }}</p> --}}
                        </div>
                    </div>
                </a>
                <a href="/kriteria" class="col-xl-6 col-md-6">
                    <div class="card bg-blue-600 dashnum-card text-white overflow-hidden">
                        <span class="round small"></span>
                        <span class="round big"></span>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="avtar avtar-lg">
                                        <i class="fa-solid fa-gears"></i>
                                    </div>
                                </div>
                            </div>
                            <span class="text-white d-block f-18 f-w-500 my-2">Kriteria
                                <span><i class="fa-solid fa-caret-right px-3"></i>{{ count($kriteria) }}
                                </span>
                            </span>
                        </div>
                    </div>
                </a>
                <a href="/siswa_kriteria" class="col-xl-6 col-md-6">
                    <div class="card bg-blue-600 dashnum-card text-white overflow-hidden">
                        <span class="round small"></span>
                        <span class="round big"></span>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="avtar avtar-lg">
                                        <i class="fa-solid fa-user-gear"></i>
                                    </div>
                                </div>
                            </div>
                            <span class="text-white d-block f-18 f-w-500 my-2">Siswa & Kriteria
                                <span><i class="fa-solid fa-caret-right px-3"></i>{{ count($siswa) }}<span
                                        class="p-2">|</span>{{ count($kriteria) }}
                                </span>
                        </div>
                    </div>
                </a>
                <a href="/tingkat_kelas" class="col-xl-6 col-md-6">
                    <div class="card bg-blue-600 dashnum-card text-white overflow-hidden">
                        <span class="round small"></span>
                        <span class="round big"></span>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="avtar avtar-lg">
                                        <i class="fa-solid fa-chart-simple"></i>
                                    </div>
                                </div>
                            </div>
                            <span class="text-white d-block f-18 f-w-500 my-2">Tingkat & Kelas
                                <span><i class="fa-solid fa-caret-right px-3"></i>{{ count($tingkat) }}<span
                                        class="p-2">|</span>{{ count($kelas) }}
                                </span>
                        </div>
                    </div>
                </a>
                <a href="/kecamatan_kelurahan" class="col-xl-6 col-md-6">
                    <div class="card bg-blue-600 dashnum-card text-white overflow-hidden">
                        <span class="round small"></span>
                        <span class="round big"></span>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="avtar avtar-lg">
                                        <i class="fa-solid fa-map-location-dot"></i>
                                    </div>
                                </div>
                            </div>
                            <span class="text-white d-block f-18 f-w-500 my-2">Kecamatan & Kelurahan
                                <span><i class="fa-solid fa-caret-right px-3"></i>{{ count($kecamatan) }}<span
                                        class="p-2">|</span>{{ count($kelurahan) }}
                                </span>
                        </div>
                    </div>
                </a>
                <a href="#" onclick="kmeans()" class="col-xl-6 col-md-6">
                    <div class="card bg-blue-600 dashnum-card text-white overflow-hidden">
                        <span class="round small"></span>
                        <span class="round big"></span>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="avtar avtar-lg">
                                        <i class="fa-solid fa-square-root-variable"></i>
                                    </div>
                                </div>
                            </div>
                            <span class="text-white d-block f-18 f-w-500 my-2">Perhitungan
                                <span><i class="fa-solid fa-caret-right px-3"></i>K - Means Clustering
                                </span>
                        </div>
                    </div>
                </a>
                <!-- [ sample-page ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->

@endsection
