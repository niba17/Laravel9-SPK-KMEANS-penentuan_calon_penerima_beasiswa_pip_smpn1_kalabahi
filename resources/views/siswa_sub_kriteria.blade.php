@extends('layouts.master')
@section('title', 'KMEANS | Siswa & Sub Kriteria')
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
                                <h5 class="m-b-10"><a href="/siswa_sub_kriteria">Siswa & Sub Kriteria</a></h5>
                            </div>
                            <ul class="breadcrumb">
                                {{-- <li class="breadcrumb-item"><a href="../navigation/index.html">Siswa & Sub Kriteria</a></li> --}}
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
                            <h5>Siswa</h5>
                        </div>
                        <div class="card-body">
                            {{-- <div class="bd-example"> --}}
                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="/siswa-add" class="btn btn-sm bg-blue-100 mb-3">Tambah Siswa
                                        <i class="fa-solid fa-plus"></i>
                                    </a>
                                    <table class="table table-hover" id="myTable">
                                        <thead class="bg-blue-100">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>NIS</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Kecamatan</th>
                                                <th>Kelurahan</th>
                                                <th>Tingkat</th>
                                                <th>Kelas</th>
                                                <th style="width: 50px;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($siswa as $item_siswa)
                                                <tr>
                                                    <th>{{ $loop->iteration }}</th>
                                                    <td>{{ $item_siswa->nama }}</td>
                                                    <td>{{ $item_siswa->nis }}</td>
                                                    <td>{{ $item_siswa->jk }}</td>
                                                    <td>{{ $item_siswa->tgl_lahir }}</td>
                                                    <td>{{ $item_siswa->kecamatan->nama ?? 'Belum ada data' }}</td>
                                                    <td>{{ $item_siswa->kelurahan->nama ?? 'Belum ada data' }}</td>
                                                    <td>{{ $item_siswa->tingkat->nama ?? 'Belum ada data' }}</td>
                                                    <td>{{ $item_siswa->kelas->nama ?? 'Belum ada data' }}</td>
                                                    <td>
                                                        <a href="siswa-edit/{{ $item_siswa->id }}">
                                                            <i class="fa-solid fa-pen-to-square text-primary"></i>
                                                        </a>
                                                        <span class="px-1">|</span>
                                                        <a href="#" onclick="hapus('{{ $item_siswa->id }}','siswa')">
                                                            <i class="fa-regular fa-trash-can text-danger"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{-- <div class="col-lg-6">
                                    <a href="/sub_kriteria-add" class="btn btn-sm bg-blue-100 mb-3">Tambah Sub Kriteria
                                        <i class="fa-solid fa-plus"></i>
                                    </a>
                                    <table class="table table-hover" id="myTable2">
                                        <thead class="bg-blue-100">
                                            <tr>
                                                <th>No</th>
                                                <th>Sub Kriteria</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sub_kriteria as $item_sub_kriteria)
                                                <tr>
                                                    <th>{{ $loop->iteration }}</th>
                                                    <td>{{ $item_sub_kriteria->nama }}</td>
                                                    <td>
                                                        <a href="sub_kriteria-edit/{{ $item_sub_kriteria->id }}">
                                                            <i class="fa-solid fa-pen-to-square text-primary"></i>
                                                        </a>
                                                        <span class="px-1">|</span>
                                                        <a href="#"
                                                            onclick="hapus('{{ $item_sub_kriteria->id }}','sub_kriteria')">
                                                            <i class="fa-regular fa-trash-can text-danger"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div> --}}
                            </div>
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <h5>Relasi Siswa & Sub Kriteria</h5>
                        </div>
                        <div class="card-body">
                            {{-- <div class="bd-example"> --}}
                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="/siswa_sub_kriteria-add" class="btn btn-sm bg-blue-100 mb-3">Tambah
                                        Relasi
                                        <i class="fa-solid fa-plus"></i>
                                    </a>
                                    <table class="table table-hover" id="myTable3">
                                        <thead class="bg-blue-100">
                                            <tr>
                                                <th>No</th>
                                                <th>Siswa</th>
                                                <th>Kriteria</th>
                                                <th>Sub Kriteria</th>
                                                <th>Bobot</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($siswa as $item)
                                                <tr>
                                                    <td><span class="fw-bold ms-1">{{ $loop->iteration }}</span></td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>
                                                        @if (isset($item->siswa_sub_kriteria) && count($item->siswa_sub_kriteria) > 0)
                                                            @foreach ($item->siswa_sub_kriteria as $item2)
                                                                @if (isset($item2->kriteria->nama) && $item2->kriteria->nama !== null)
                                                                    <li>
                                                                        {{ $item2->kriteria->nama }}
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <span class="text-danger">
                                                                <span class="badge bg-danger-faded text-danger"> Kriteria
                                                                    belum dipilih!
                                                                </span>
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (isset($item->siswa_sub_kriteria) && count($item->siswa_sub_kriteria) > 0)
                                                            @foreach ($item->siswa_sub_kriteria as $item2)
                                                                <li>
                                                                    {{ $item2->sub_kriteria->nama }}

                                                                    {{-- <span class="text-danger">
                                                                            <span
                                                                                class="badge bg-danger-faded text-danger">Bobot
                                                                                belum diisi!
                                                                            </span>
                                                                        </span> --}}

                                                                </li>
                                                            @endforeach
                                                        @else
                                                            <span class="text-danger">
                                                                <span class="badge bg-danger-faded text-danger">Sub Kriteria
                                                                    belum dipilih!
                                                                </span>
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (isset($item->siswa_sub_kriteria) && count($item->siswa_sub_kriteria) > 0)
                                                            @foreach ($item->siswa_sub_kriteria as $item2)
                                                                <li>
                                                                    @foreach ($kriteria_sub_kriteria as $item3)
                                                                        @if ($item2->sub_kriteria_id == $item3->sub_kriteria_id)
                                                                            @if ($item2->kriteria_id == $item3->kriteria_id)
                                                                                {{ $item3->bobot }}
                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                </li>
                                                            @endforeach
                                                            {{-- @else
                                                            <span class="text-danger">
                                                                <span class="badge bg-danger-faded text-danger">Sub Kriteria
                                                                    belum diisi!
                                                                </span>
                                                            </span> --}}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (isset($item->siswa_sub_kriteria) && count($item->siswa_sub_kriteria) > 0)
                                                            @foreach ($item->siswa_sub_kriteria as $item4)
                                                                <a href="siswa_sub_kriteria-edit/{{ $item4->id }}">
                                                                    <i class="fa-solid fa-pen-to-square text-primary"></i>
                                                                </a>
                                                                <span class="px-1 fw-bold">|</span>
                                                                <a href="#"
                                                                    onclick="hapus('{{ $item4->id }}','siswa_sub_kriteria')">
                                                                    <i class="fa-regular fa-trash-can text-danger"></i>
                                                                </a>
                                                                <br>
                                                            @endforeach
                                                        @endif
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
