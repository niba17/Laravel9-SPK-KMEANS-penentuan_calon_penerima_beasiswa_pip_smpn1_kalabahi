@extends('layouts.master')
@section('title', 'KMEANS | Edit Relasi Kecamatan & Kelurahan')
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
                                <li class="breadcrumb-item">Edit Relasi Kecamatan & Kelurahan</li>
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
                            <h5>Edit Relasi Kecamatan & Kelurahan</h5>
                        </div>
                        <div class="card-body">
                            {{-- <div class="bd-example"> --}}
                            <div class="row">
                                <form action="/kecamatan_kelurahan-update/{{ $kecamatan_kelurahan->id }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="kecamatan_id" class="form-label">Kriteria</label>
                                                <input type="text"
                                                    class="form-control @error('kecamatan_id') is-invalid @enderror"
                                                    id="kecamatan_id" value="{{ $kecamatan_kelurahan->kecamatan->nama }}"
                                                    disabled aria-describedby="emailHelp">
                                                @error('kecamatan_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <input type="hidden" class="form-control" id="kecamatan_id" name="kecamatan_id"
                                                value="{{ $kecamatan_kelurahan->kecamatan->id }}">
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="kelurahan_id" class="form-label">Sub Kriteria</label>
                                                <select class="form-select @error('kelurahan_id') is-invalid @enderror"
                                                    aria-label="Default select example" name="kelurahan_id"
                                                    id="kelurahan_id">
                                                    {{-- <option selected disabled>Pilih Kriteria terlebih dahulu ...</option> --}}
                                                    @foreach ($kelurahan as $item_kelurahan)
                                                        @php
                                                            $temp = false;
                                                        @endphp
                                                        <option value="{{ $item_kelurahan->id }}"
                                                            @foreach ($item_kelurahan->kecamatan_kelurahan as $item_kriteria_sub_kriteria) 
                                            @if (
                                                $item_kriteria_sub_kriteria->kecamatan_id == $kecamatan_kelurahan->kecamatan_id &&
                                                    $item_kriteria_sub_kriteria->kelurahan_id == $kecamatan_kelurahan->kelurahan_id)
                                            selected
                                            @endif 
                                            @if (
                                                $item_kriteria_sub_kriteria->kecamatan_id == $kecamatan_kelurahan->kecamatan_id &&
                                                    $item_kriteria_sub_kriteria->kelurahan_id != $kecamatan_kelurahan->kelurahan_id)
                                            @php
                                             $temp=true   
                                            @endphp
                                            class="text-danger" disabled
                                            @endif @endforeach>
                                                            {{ $item_kelurahan->nama }} @if ($temp == true)
                                                                (sudah dipilih!)
                                                            @endif
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('kelurahan_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary me-2">Simpan</button>
                                    <a href="/kecamatan_kelurahan" class="btn btn-outline-danger">Batal</a>
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
