@extends('layouts.master')
@section('title', 'KMEANS | Edit Relasi Tingkat & Kelas')
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
                                <li class="breadcrumb-item">Edit Relasi Tingkat & Kelas</li>
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
                            <h5>Edit Relasi Tingkat & Kelas</h5>
                        </div>
                        <div class="card-body">
                            {{-- <div class="bd-example"> --}}
                            <div class="row">
                                <form action="/tingkat_kelas-update/{{ $tingkat_kelas->id }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="tingkat_id" class="form-label">Tingkat</label>
                                                <input type="text"
                                                    class="form-control @error('tingkat_id') is-invalid @enderror"
                                                    id="tingkat_id" value="{{ $tingkat_kelas->tingkat->nama }}" disabled
                                                    aria-describedby="emailHelp">
                                                @error('tingkat_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <input type="hidden" class="form-control" id="tingkat_id" name="tingkat_id"
                                                value="{{ $tingkat_kelas->tingkat->id }}">
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="kelas_id" class="form-label">Kelas</label>
                                                <select class="form-select @error('kelas_id') is-invalid @enderror"
                                                    aria-label="Default select example" name="kelas_id" id="kelas_id">
                                                    {{-- <option selected disabled>Pilih Kriteria terlebih dahulu ...</option> --}}
                                                    @foreach ($kelas as $item_kelas)
                                                        @php
                                                            $temp = false;
                                                        @endphp
                                                        <option value="{{ $item_kelas->id }}"
                                                            @foreach ($item_kelas->tingkat_kelas as $item_ting_kel) 
                                            @if ($item_ting_kel->tingkat_id == $tingkat_kelas->tingkat_id && $item_ting_kel->kelas_id == $tingkat_kelas->kelas_id)
                                            selected
                                            @endif 
                                            @if ($item_ting_kel->tingkat_id == $tingkat_kelas->tingkat_id && $item_ting_kel->kelas_id != $tingkat_kelas->kelas_id)
                                            @php
                                             $temp=true   
                                            @endphp
                                            class="text-danger" disabled
                                            @endif @endforeach>
                                                            {{ $item_kelas->nama }} @if ($temp == true)
                                                                (sudah dipilih!)
                                                            @endif
                                                        </option>
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
