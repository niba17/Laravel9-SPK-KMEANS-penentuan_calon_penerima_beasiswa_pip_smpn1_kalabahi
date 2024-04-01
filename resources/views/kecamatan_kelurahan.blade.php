@extends('layouts.master')
@section('title', 'KMEANS | Kecamatan & Kelurahan')
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
                                <h5 class="m-b-10"><a href="/kriteria_sub_kriteria">Kecamatan & Kelurahan</a></h5>
                            </div>
                            <ul class="breadcrumb">
                                {{-- <li class="breadcrumb-item"><a href="../navigation/index.html">Kecamatan & Kelurahan</a></li> --}}
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

                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <h5>Kecamatan & Kelurahan</h5>
                        </div>
                        <div class="card-body">
                            {{-- <div class="bd-example"> --}}
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="/kecamatan-add" class="btn btn-sm bg-blue-100 mb-3">Tambah Kecamatan
                                        <i class="fa-solid fa-plus"></i>
                                    </a>
                                    <table class="table table-hover" id="myTable">
                                        <thead class="bg-blue-100">
                                            <tr>
                                                <th>No</th>
                                                <th>Kecamatan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kecamatan as $item_kriteria)
                                                <tr>
                                                    <th>{{ $loop->iteration }}</th>
                                                    <td>{{ $item_kriteria->nama }}</td>
                                                    <td>
                                                        <a href="kecamatan-edit/{{ $item_kriteria->id }}">
                                                            <i class="fa-solid fa-pen-to-square text-primary"></i>
                                                        </a>
                                                        <span class="px-1">|</span>
                                                        <a href="#"
                                                            onclick="hapus('{{ $item_kriteria->id }}','kecamatan')">
                                                            <i class="fa-regular fa-trash-can text-danger"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-6">
                                    <a href="/kelurahan-add" class="btn btn-sm bg-blue-100 mb-3">Tambah Kelurahan
                                        <i class="fa-solid fa-plus"></i>
                                    </a>
                                    <table class="table table-hover" id="myTable2">
                                        <thead class="bg-blue-100">
                                            <tr>
                                                <th>No</th>
                                                <th>Kelurahan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kelurahan as $item_sub_kriteria)
                                                <tr>
                                                    <th>{{ $loop->iteration }}</th>
                                                    <td>{{ $item_sub_kriteria->nama }}</td>
                                                    <td>
                                                        <a href="kelurahan-edit/{{ $item_sub_kriteria->id }}">
                                                            <i class="fa-solid fa-pen-to-square text-primary"></i>
                                                        </a>
                                                        <span class="px-1">|</span>
                                                        <a href="#"
                                                            onclick="hapus('{{ $item_sub_kriteria->id }}','kelurahan')">
                                                            <i class="fa-regular fa-trash-can text-danger"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <h5>Relasi Kecamatan & Kelurahan</h5>
                        </div>
                        <div class="card-body">
                            {{-- <div class="bd-example"> --}}
                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="/kecamatan_kelurahan-add" class="btn btn-sm bg-blue-100 mb-3">Tambah
                                        Relasi
                                        <i class="fa-solid fa-plus"></i>
                                    </a>
                                    <table class="table table-hover" id="myTable3">
                                        <thead class="bg-blue-100">
                                            <tr>
                                                <th>No</th>
                                                <th>Kecamatan</th>
                                                <th>Kelurahan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kecamatan as $item)
                                                <tr>
                                                    <td><span class="fw-bold ms-1">{{ $loop->iteration }}</span></td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>
                                                        @if (isset($item->kecamatan_kelurahan) && count($item->kecamatan_kelurahan) > 0)
                                                            @foreach ($item->kecamatan_kelurahan as $item2)
                                                                <li>
                                                                    {{ $item2->kelurahan->nama }}
                                                                </li>
                                                            @endforeach
                                                        @else
                                                            <span class="text-danger">
                                                                <span class="badge bg-danger-faded text-danger">Kelurahan
                                                                    belum dipilih!
                                                                </span>
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @foreach ($item->kecamatan_kelurahan as $item4)
                                                            <a href="kecamatan_kelurahan-edit/{{ $item4->id }}">
                                                                <i class="fa-solid fa-pen-to-square text-primary"></i>
                                                            </a>
                                                            <span class="px-1 fw-bold">|</span>
                                                            <a href="#"
                                                                onclick="hapus('{{ $item4->id }}','kecamatan_kelurahan')">
                                                                <i class="fa-regular fa-trash-can text-danger"></i>
                                                            </a>
                                                            <br>
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>

                <!-- [ sample-page ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->

@endsection
