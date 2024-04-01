@extends('layouts.master')
@section('title', 'KMEANS | Tambah Relasi Siswa & Sub Kriteria')
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
                                <a href="/siswa_sub_kriteria">
                                    <h5 class="m-b-10">Siswa & Sub Kriteria</h5>
                                </a>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">Tambah Relasi Siswa & Sub Kriteria</li>
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
                            <h5>Tambah Relasi Siswa & Sub Kriteria</h5>
                        </div>
                        <div class="card-body">
                            {{-- <div class="bd-example"> --}}
                            <div class="row">
                                <form action="/siswa_sub_kriteria-store" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="siswa_id" class="form-label">Siswa</label>
                                                <select class="form-select @error('siswa_id') is-invalid @enderror"
                                                    aria-label="Default select example" name="siswa_id" id="siswa_id_siswa">
                                                    <option selected disabled>Pilih Siswa ...</option>
                                                    @foreach ($siswa as $item_siswa)
                                                        <option value="{{ $item_siswa->id }}">
                                                            {{ $item_siswa->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('siswa_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="kriteria_id" class="form-label">Kriteria</label>
                                                <select class="form-select @error('kriteria_id') is-invalid @enderror"
                                                    aria-label="Default select example" name="kriteria_id"
                                                    id="kriteria_id_siswa">
                                                    <option selected disabled>Pilih Siswa terlebih dahulu ...</option>
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
                                    </div>
                                    <button type="submit" class="btn btn-primary me-2">Simpan</button><a
                                        href="/siswa_sub_kriteria" class="btn btn-outline-danger">Batal</a>
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
