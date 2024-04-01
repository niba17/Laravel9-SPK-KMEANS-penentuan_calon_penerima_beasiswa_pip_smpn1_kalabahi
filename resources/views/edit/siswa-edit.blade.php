@extends('layouts.master')
@section('title', 'KMEANS | Edit Siswa')
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
                                <li class="breadcrumb-item">Edit Siswa</li>
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
                            <h5>Edit Siswa</h5>
                        </div>
                        <div class="card-body">
                            {{-- <div class="bd-example"> --}}
                            <form action="/siswa-update/{{ $siswa->id }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                id="nama" name="nama" value="{{ $siswa->nama }}"
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
                                                id="nis" name="nis" value="{{ $siswa->nis }}"
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
                                                @foreach ($jk as $item_jk)
                                                    <option value="{{ $item_jk }}"
                                                        @if ($item_jk == $siswa->jk) selected @endif>
                                                        {{ $item_jk }}
                                                    </option>
                                                @endforeach
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
                                                    name="tgl_lahir" value="{{ $siswa->tgl_lahir }}">
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
                                                @foreach ($kecamatan as $item_kec)
                                                    <option value="{{ $item_kec->id }}"
                                                        @if ($siswa->kecamatan_id == $item_kec->id) selected @endif>
                                                        {{ $item_kec->nama }}
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
                                                @foreach ($kecamatan as $item_kec)
                                                    @if ($siswa->kecamatan_id == $item_kec->id)
                                                        @if ($item_kec->kecamatan_kelurahan !== null)
                                                            @foreach ($item_kec->kecamatan_kelurahan as $item_kec_kel)
                                                                @if ($siswa->kecamatan_id == $item_kec_kel->kecamatan_id)
                                                                    <option value="{{ $item_kec_kel->kelurahan->id }}"
                                                                        @if ($siswa->kelurahan_id == $item_kec_kel->kelurahan_id) selected @endif>
                                                                        {{ $item_kec_kel->kelurahan->nama }}</option>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endif
                                                @endforeach
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
                                                @foreach ($tingkat as $item_ting)
                                                    <option
                                                        value="{{ $item_ting->id }}"@if ($siswa->tingkat_id == $item_ting->id) selected @endif>
                                                        {{ $item_ting->nama }}
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
                                                @foreach ($tingkat as $item_ting)
                                                    @if ($siswa->tingkat_id == $item_ting->id)
                                                        @if ($item_ting->tingkat_kelas !== null)
                                                            @foreach ($item_ting->tingkat_kelas as $item_ting_kel)
                                                                @if ($siswa->tingkat_id == $item_ting_kel->tingkat_id)
                                                                    <option value="{{ $item_ting_kel->kelas->id }}"
                                                                        @if ($siswa->kelas_id == $item_ting_kel->kelas_id) selected @endif>
                                                                        {{ $item_ting_kel->kelas->nama }}</option>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endif
                                                @endforeach
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
