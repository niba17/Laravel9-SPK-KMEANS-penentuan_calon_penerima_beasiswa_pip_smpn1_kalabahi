@extends('layouts.master')
@section('title', 'KMEANS | Tambah Relasi Kriteria & Sub Kriteria')
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
                                <a href="/kriteria_sub_kriteria">
                                    <h5 class="m-b-10">Kriteria & Sub Kriteria</h5>
                                </a>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">Tambah Relasi Kriteria & Sub Kriteria</li>
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
                            <h5>Tambah Relasi Kriteria & Sub Kriteria</h5>
                        </div>
                        <div class="card-body">
                            {{-- <div class="bd-example"> --}}
                            <div class="row">
                                <form action="/kriteria_sub_kriteria-store" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="kriteria_id" class="form-label">Kriteria</label>
                                                <select class="form-select @error('kriteria_id') is-invalid @enderror"
                                                    aria-label="Default select example" name="kriteria_id" id="kriteria_id">
                                                    <option selected disabled>Pilih Kriteria ...</option>
                                                    @foreach ($kriteria as $item_kriteria)
                                                        <option value="{{ $item_kriteria->id }}">
                                                            {{ $item_kriteria->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('kriteria_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="sub_kriteria_id" class="form-label">Sub Kriteria</label>
                                                <select class="form-select @error('sub_kriteria_id') is-invalid @enderror"
                                                    aria-label="Default select example" name="sub_kriteria_id"
                                                    id="sub_kriteria_id">
                                                    <option selected disabled>Pilih Kriteria terlebih dahulu ...</option>
                                                </select>
                                                @error('sub_kriteria_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="bobot" class="form-label">Bobot</label>
                                                <input type="number"
                                                    class="form-control @error('bobot') is-invalid @enderror" id="bobot"
                                                    name="bobot" value="{{ old('bobot') }}" step="any"
                                                    aria-describedby="emailHelp">
                                                @error('bobot')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary me-2">Simpan</button><a
                                        href="/kriteria_sub_kriteria" class="btn btn-outline-danger">Batal</a>
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
