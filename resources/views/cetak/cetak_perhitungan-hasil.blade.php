@extends('layouts.cetak_master')
@section('title', 'KMEANS | Cetak Hasil Perhitungan KMEANS')
@section('content')

    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">
            <!-- [ Beradcrumb ] start -->

            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- [ sample-page ] start -->

                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <h5>Hasil Perhitungan K-MEANS </h5>

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
                                        @foreach ($kmeans as $key_item_kmeans => $item_kmeans)
                                            <table class="table table-hover">

                                                <tr class="bg-blue-100">
                                                    <th colspan="5" class="text-center h4 fw-bold">Iterasi ke
                                                        {{ $loop->iteration }}</th>
                                                </tr>
                                                <tr class="bg-blue-100">
                                                    <th>No</th>
                                                    <th>Siswa</th>
                                                    <th>NIS</th>
                                                    <th>C1 (Diterima)</th>
                                                    <th>C2 (Tidak Diterima)</th>
                                                </tr>

                                                <tbody>
                                                    @foreach ($item_kmeans as $key_item_kmeans_deeper => $item_kmeans_deeper)
                                                        @if ($key_item_kmeans_deeper !== 'total_C1' && $key_item_kmeans_deeper !== 'total_C2')
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $item_kmeans_deeper['siswa_nama'] }}
                                                                </td>
                                                                <td>{{ $item_kmeans_deeper['siswa_nis'] }}</td>
                                                                <td class="text-center">
                                                                    @if ($item_kmeans_deeper['C1'] == true)
                                                                        *
                                                                    @endif
                                                                </td>
                                                                <td class="text-center">
                                                                    @if ($item_kmeans_deeper['C2'] == true)
                                                                        *
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @endforeach
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
    <script>
        window.print()
    </script>
@endsection
