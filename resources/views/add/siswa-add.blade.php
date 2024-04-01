@extends('layouts.master')
@section('title', 'KMEANS | Tambah Siswa')
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
                                    <h5 class="m-b-10">Siswa</h5>
                                </a>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">Tambah Siswa</li>
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
                            <h5>Tambah Siswa</h5>
                        </div>
                        <div class="card-body">
                            {{-- <div class="bd-example"> --}}
                            <form action="/siswa-store" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                id="nama" name="nama" value="{{ old('nama') }}"
                                                aria-describedby="emailHelp">
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="nis" class="form-label">NIS</label>
                                            <input type="text" class="form-control @error('nis') is-invalid @enderror"
                                                id="nis" name="nis" value="{{ old('nis') }}"
                                                aria-describedby="emailHelp">
                                            @error('nis')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="jk" class="form-label">Jenis Kelamin</label>
                                            <select class="form-select @error('jk') is-invalid @enderror"
                                                aria-label="Default select example" name="jk" id="jk">
                                                <option selected disabled>Pilih Jenis Kelamin ...</option>
                                                <option value="Laki - laki">
                                                    Laki - laki
                                                </option>
                                                <option value="Perempuan">
                                                    Perempuan
                                                </option>
                                            </select>
                                            @error('jk')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="datepicker" class="form-label">Tanggal lahir</label>
                                            {{-- <div class="col-sm-4"> --}}
                                            <div class="input-group date" id="datepicker">
                                                <input type="text"
                                                    class="form-control @error('tgl_lahir') is-invalid @enderror"
                                                    name="tgl_lahir" value="{{ old('tgl_lahir') }}">
                                                <span class="input-group-append">
                                                    <span class="input-group-text bg-white">
                                                        <i class="fa fa-calendar" style="height: 20px"></i>
                                                    </span>
                                                </span> @error('tgl_lahir')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="kecamatan_id" class="form-label">Kecamatan</label>
                                            <select class="form-select @error('kecamatan_id') is-invalid @enderror"
                                                aria-label="Default select example" name="kecamatan_id"
                                                id="kecamatan_id_siswa">
                                                <option selected disabled>Pilih Kecamatan ...</option>
                                                @foreach ($kecamatan as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama }}
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
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="kelurahan_id" class="form-label">Kelurahan</label>
                                            <select class="form-select @error('kelurahan_id') is-invalid @enderror"
                                                aria-label="Default select example" name="kelurahan_id" id="kelurahan_id">
                                                <option selected disabled>Pilih Kelurahan terlebih dahulu ...</option>
                                            </select>
                                            @error('kelurahan_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="tingkat_id" class="form-label">Tingkat</label>
                                            <select class="form-select @error('tingkat_id') is-invalid @enderror"
                                                aria-label="Default select example" name="tingkat_id" id="tingkat_id_siswa">
                                                <option selected disabled>Pilih Tingkat ...</option>
                                                @foreach ($tingkat as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama }}
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
                                    <div class="col-lg-4">
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
                                    href="/siswa_kriteria" class="btn btn-outline-danger">Batal</a>
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
