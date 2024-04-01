@extends('layouts.master')
@section('title', 'KMEANS | Tambah Relasi Kecamatan & Kelurahan')
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
                                <a href="/kecamatan_kelurahan">
                                    <h5 class="m-b-10">Kecamatan & Kelurahan</h5>
                                </a>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">Tambah Relasi Kecamatan & Kelurahan</li>
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
                            <h5>Tambah Relasi Kecamatan & Kelurahan</h5>
                        </div>
                        <div class="card-body">
                            {{-- <div class="bd-example"> --}}
                            <div class="row">
                                <form action="/kecamatan_kelurahan-store" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="kecamatan_id" class="form-label">Kecamatan</label>
                                                <select class="form-select @error('kecamatan_id') is-invalid @enderror"
                                                    aria-label="Default select example" name="kecamatan_id"
                                                    id="kecamatan_id">
                                                    <option selected disabled>Pilih Kecamatan ...</option>
                                                    @foreach ($kecamatan as $item_kecamatan)
                                                        <option value="{{ $item_kecamatan->id }}">
                                                            {{ $item_kecamatan->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('kecamatan_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="kelurahan_id" class="form-label">Kelurahan</label>
                                                <select class="form-select @error('kelurahan_id') is-invalid @enderror"
                                                    aria-label="Default select example" name="kelurahan_id"
                                                    id="kelurahan_id">
                                                    <option selected disabled>Pilih Kecamatan terlebih dahulu ...</option>
                                                </select>
                                                @error('kelurahan_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary me-2">Simpan</button><a
                                        href="/kecamatan_kelurahan" class="btn btn-outline-danger">Batal</a>
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
