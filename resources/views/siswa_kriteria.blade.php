@extends('layouts.master')
@section('title', 'KMEANS | Siswa')
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
                                <h5 class="m-b-10"><a href="/siswa_kriteria">Siswa</a></h5>
                            </div>
                            <ul class="breadcrumb">
                                {{-- <li class="breadcrumb-item_siswa"><a href="../navigation/index.html">Siswa</a></li> --}}
                                {{-- <li class="breadcrumb-item_siswa"><a href="javascript: void(0)">Dashboard</a></li>
                                <li class="breadcrumb-item_siswa" aria-current="page">Sample Page</li> --}}
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <h5>Siswa & Kriteria</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    {{-- <a href="/siswa_kriteria-add" class="btn btn-sm bg-blue-100 mb-3">Tambah
                                        Relasi
                                        <i class="fa-solid fa-plus"></i>
                                    </a> --}}
                                    <table class="table table-hover" id="myTable3">
                                        <thead class="bg-blue-100">
                                            <tr>
                                                <th>No</th>
                                                <th>Siswa</th>
                                                <th>Kriteria</th>
                                                <th>Bobot</th>
                                                <th>Atur</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($siswa as $item_siswa)
                                                <tr>
                                                    <td><span class="fw-bold ms-1">{{ $loop->iteration }}</span></td>
                                                    <td>{{ $item_siswa->nama }}</td>
                                                    <td>
                                                        @foreach ($kriteria as $item_kriteria)
                                                            <li>
                                                                {{ $item_kriteria->nama }}
                                                            </li>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @if (isset($item_siswa->siswa_kriteria) && count($item_siswa->siswa_kriteria) > 0)
                                                            @foreach ($kriteria as $item_kriteria2)
                                                                @php
                                                                    $miss = true;
                                                                @endphp
                                                                @foreach ($item_siswa->siswa_kriteria as $item_siswa_kriteria)
                                                                    @if ($item_kriteria2->id == $item_siswa_kriteria->kriteria_id)
                                                                        @php
                                                                            $miss = false;
                                                                        @endphp
                                                                        <li>
                                                                            {{ $item_siswa_kriteria->bobot }}
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                                @if ($miss == true)
                                                                    <li>
                                                                        <span class="text-danger">
                                                                            <span class="badge bg-danger-faded text-danger">
                                                                                Bobot belum
                                                                                diisi!
                                                                            </span>
                                                                        </span>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            @foreach ($kriteria as $item_kriteria3)
                                                                <li>
                                                                    <span class="text-danger">
                                                                        <span class="badge bg-danger-faded text-danger">
                                                                            Bobot belum
                                                                            diisi!
                                                                        </span>
                                                                    </span>
                                                                </li>
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="siswa_kriteria-set/{{ $item_siswa->id }}">
                                                            <i class="fa-solid fa-user-gear fa-2x text-primary"></i>
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

                <!-- [ sample-page ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->

@endsection
