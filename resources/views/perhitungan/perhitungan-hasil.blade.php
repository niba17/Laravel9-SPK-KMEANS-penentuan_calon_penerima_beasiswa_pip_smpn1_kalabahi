@extends('layouts.master')
@section('title', 'KMEANS | Hasil Perhitungan KMEANS')
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
                                <h5 class="m-b-10"><span>Perhitungan</span></h5>
                            </div>
                            <ul class="breadcrumb">
                                {{-- <li class="breadcrumb-item"><a href="../navigation/index.html">Kecamatan &
                                    Kelurahan</a></li> --}}
                                {{-- <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li> --}}
                                <li class="breadcrumb-item" aria-current="page">hasil</li>
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
                            <h5>Hasil Perhitungan K-MEANS Clustering </h5>
                            <div class="text-start">
                                <a href="/cetak-hasil" target="_blank" class="btn btn-sm bg-blue-100">Cetak / Export PDF
                                    <i class="fa-solid fa-print ms-2"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-header text-start pt-3 pb-1">
                            <h4>Total <span class="text-primary">{{ count($kmeans) }}</span> Iterasi pada <span
                                    class="text-primary">{{ count($siswa) }}</span> Siswa</h4>
                        </div>
                        <div class="card-body">
                            {{-- <div class="bd-example"> --}}
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="accordion mb-4" id="accordionExample">
                                        @php
                                            $i_myTable = 1;
                                        @endphp
                                        @foreach ($kmeans as $key_item_kmeans => $item_kmeans)
                                            @php
                                                $i_myTable++;
                                            @endphp
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading{{ $loop->iteration }}">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse{{ $loop->iteration }}"
                                                        aria-expanded="false"
                                                        aria-controls="collapse{{ $loop->iteration }}">
                                                        Iterasi ke {{ $loop->iteration }}
                                                    </button>
                                                </h2>
                                                <div id="collapse{{ $loop->iteration }}" class="accordion-collapse collapse"
                                                    aria-labelledby="heading{{ $loop->iteration }}"
                                                    data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <table class="table table-hover"
                                                            @if ($loop->iteration > 1) id = "myTable{{ $loop->iteration }}" @else id="myTable" @endif>
                                                            <div class="text-center">
                                                                <span class="fw-bold h3">Hasil Perhitungan Iterasi ke
                                                                    {{ $loop->iteration }}</span>
                                                            </div>
                                                            <hr>
                                                            <ul>
                                                                <li> <span class="fw-bold">C1 :
                                                                        <span
                                                                            class="text-primary">{{ $item_kmeans['total_C1'] }}</span>
                                                                        Siswa</span>
                                                                </li>
                                                                <li>
                                                                    <span class="fw-bold">C2 :
                                                                        <span
                                                                            class="text-primary">{{ $item_kmeans['total_C2'] }}</span>
                                                                        Siswa</span>
                                                                </li>
                                                            </ul>


                                                            <hr>
                                                            <thead class="bg-blue-100">
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Siswa</th>
                                                                    <th>NIS</th>
                                                                    <th>C1</th>
                                                                    <th>C2</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($item_kmeans as $key_item_kmeans_deeper => $item_kmeans_deeper)
                                                                    @if ($key_item_kmeans_deeper !== 'total_C1' && $key_item_kmeans_deeper !== 'total_C2')
                                                                        <tr>
                                                                            <td>{{ $loop->iteration }}</td>
                                                                            <td>{{ $item_kmeans_deeper['siswa_nama'] }}
                                                                            </td>
                                                                            <td>{{ $item_kmeans_deeper['siswa_nis'] }}</td>
                                                                            <td>
                                                                                @if ($item_kmeans_deeper['C1'] == true)
                                                                                    *
                                                                                @endif
                                                                            </td>
                                                                            <td>
                                                                                @if ($item_kmeans_deeper['C2'] == true)
                                                                                    *
                                                                                @endif
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading-kesimpulan">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapse-kesimpulan"
                                                    aria-expanded="false" aria-controls="collapse-kesimpulan">
                                                    Kesimpulan
                                                </button>
                                            </h2>
                                            <div id="collapse-kesimpulan" class="accordion-collapse collapse"
                                                aria-labelledby="heading-kesimpulan" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <p>Terlihat bahwa posisi cluster data iterasi ke <span
                                                            class="text-primary fw-bold">{{ count($kmeans) }}</span>
                                                        sudah tidak mengalami perubahan
                                                        dari posisi cluster data iterasi ke <span
                                                            class="text-primary fw-bold">{{ count($kmeans) - 1 }}</span>,
                                                        sehingga proses iterasi
                                                        sudah dapat
                                                        dihentikan.
                                                        Dari hasil cluster data perhitungan didapatkan informasi sebagai
                                                        berikut :
                                                    </p>
                                                    <table class="table table-hover" id="myTable{{ $i_myTable }}">
                                                        <div class="text-center">
                                                        </div>
                                                        <thead class="bg-blue-100">
                                                            <tr>
                                                                <th>Iterasi</th>
                                                                <th>Cluster data 1</th>
                                                                <th>Cluster data 2</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($kmeans as $key_kmeans => $item_kmeans)
                                                                <tr>
                                                                    <td>
                                                                        <span
                                                                            class="text-primary fw-bold">{{ $loop->iteration }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span
                                                                            class="text-primary fw-bold">{{ $item_kmeans['total_C1'] }}</span>
                                                                        Siswa
                                                                    </td>
                                                                    <td>
                                                                        <span
                                                                            class="text-primary fw-bold">{{ $item_kmeans['total_C2'] }}</span>
                                                                        Siswa
                                                                    </td>
                                                                    {{-- <td>{{ $item_kmeans_deeper['siswa_nis'] }}
                                                                    </td> --}}
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <hr>
                                                    <p>
                                                        Dari semua hasil cluster data perhitungan dapat disimpulkan hasil
                                                        akhir siswa yang <span class="text-danger fw-bold">Tidak
                                                            Diterima</span>
                                                        adalah : <span
                                                            class="text-danger fw-bold">{{ end($kmeans)['total_C2'] }}</span>
                                                        siswa dan yang
                                                        <span class="text-success fw-bold">Diterima</span> adalah <span
                                                            class="text-success fw-bold">{{ end($kmeans)['total_C1'] }}</span>
                                                        siswa dalam
                                                        seleksi penerimaan beasiswa
                                                    </p>
                                                    <table class="table table-hover" id="myTable{{ $i_myTable + 1 }}">
                                                        <thead class="bg-blue-100">
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama</th>
                                                                <th>NIS</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach (end($kmeans) as $key_kmeans => $item_kmeans)
                                                                @if ($key_kmeans !== 'total_C1' && $key_kmeans !== 'total_C2')
                                                                    <tr
                                                                        @if ($item_kmeans['C2'] == true) class="table-danger" @else class="table-success" @endif>
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td>{{ $item_kmeans['siswa_nama'] }}
                                                                        </td>
                                                                        <td>{{ $item_kmeans['siswa_nis'] }}
                                                                        </td>
                                                                        @if ($item_kmeans['C2'] == true)
                                                                            <td>Tidak Diterima</td>
                                                                        @else
                                                                            <td>Diterima</td>
                                                                        @endif
                                                                    </tr>
                                                                @endif
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--
                        </div> --}}
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
