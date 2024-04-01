@extends('layouts.master')
@section('title', 'KMEANS | Tambah Relasi Tingkat & Kelas')
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
                                <a href="/tingkat_kelas">
                                    <h5 class="m-b-10">Tingkat & Kelas</h5>
                                </a>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">Tambah Relasi Tingkat & Kelas</li>
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
                            <h5>Tambah Relasi Tingkat & Kelas</h5>
                        </div>
                        <div class="card-body">
                            {{-- <div class="bd-example"> --}}
                            <div class="row">
                                <form action="/tingkat_kelas-store" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="tingkat_id" class="form-label">Tingkat</label>
                                                <select class="form-select @error('tingkat_id') is-invalid @enderror"
                                                    aria-label="Default select example" name="tingkat_id" id="tingkat_id">
                                                    <option selected disabled>Pilih Tingkat ...</option>
                                                    @foreach ($tingkat as $item_tingkat)
                                                        <option value="{{ $item_tingkat->id }}">
                                                            {{ $item_tingkat->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('tingkat_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="kelas_id" class="form-label">Kelas</label>
                                                <select class="form-select @error('kelas_id') is-invalid @enderror"
                                                    aria-label="Default select example" name="kelas_id" id="kelas_id">
                                                    <option selected disabled>Pilih Tingkat terlebih dahulu ...</option>
                                                </select>
                                                @error('kelas_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary me-2">Simpan</button><a
                                        href="/tingkat_kelas" class="btn btn-outline-danger">Batal</a>
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
