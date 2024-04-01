@extends('layouts.master')
@section('title', 'KMEANS | Atur Kriteria Siswa')
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
                                <a href="/siswa_kriteria">
                                    <h5 class="m-b-10">Siswa</h5>
                                </a>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">Atur Kriteria Siswa</li>
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
                        <div class="card-header">
                            <h5>Atur Kriteria Siswa</h5>
                        </div>
                        <div class="card-body">
                            {{-- <div class="bd-example"> --}}
                            <form action="/siswa_kriteria-apply" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="siswa_id" class="form-label">Siswa</label>
                                            <input type="text"
                                                class="form-control @error('siswa_id') is-invalid @enderror" id="siswa_id"
                                                value="{{ $siswa->nama }}" disabled aria-describedby="emailHelp">
                                            @error('siswa_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <input type="hidden" class="form-control" id="siswa_id" name="siswa_id"
                                            value="{{ $siswa->id }}">
                                    </div>
                                    @foreach ($kriteria as $key_kriteria => $item_kriteria)
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="{{ $item_kriteria->id }}"
                                                    class="form-label">{{ $item_kriteria->nama }}</label>
                                                <input type="number" step="any"
                                                    class="form-control @error('K_' . $item_kriteria->id) is-invalid @enderror"
                                                    id="{{ $item_kriteria->id }}" name="K_{{ $item_kriteria->id }}"
                                                    @if (isset($siswa->siswa_kriteria[$key_kriteria])) value="{{ $siswa->siswa_kriteria[$key_kriteria]->bobot }}" @else
                                                    value="{{ old('K_' . $item_kriteria->id) }}" placeholder="..." @endif>
                                                @error('K_' . $item_kriteria->id)
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <button type="submit" class="btn btn-primary me-2">Simpan</button><a href="/siswa_kriteria"
                                    class="btn btn-outline-danger">Batal</a>
                            </form>
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
