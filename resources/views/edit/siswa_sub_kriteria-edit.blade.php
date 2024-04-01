@extends('layouts.master')
@section('title', 'KMEANS | Edit Relasi Siswa & Sub Kriteria')
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
                                <li class="breadcrumb-item">Edit Relasi Siswa & Sub Kriteria</li>
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
                            <h5>Edit Relasi Siswa & Sub Kriteria</h5>
                        </div>
                        <div class="card-body">
                            {{-- <div class="bd-example"> --}}
                            <div class="row">
                                <form action="/siswa_sub_kriteria-update/{{ $siswa_sub_kriteria->id }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="siswa_id" class="form-label">Siswa</label>
                                                <input type="text"
                                                    class="form-control @error('siswa_id') is-invalid @enderror"
                                                    id="siswa_id" value="{{ $siswa_sub_kriteria->siswa->nama }}" disabled
                                                    aria-describedby="emailHelp">
                                                @error('siswa_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <input type="hidden" class="form-control" id="siswa_id" name="siswa_id"
                                                value="{{ $siswa_sub_kriteria->siswa->id }}">
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="kriteria_id" class="form-label">Kriteria</label>
                                                <select class="form-select @error('kriteria_id') is-invalid @enderror"
                                                    aria-label="Default select example" name="kriteria_id"
                                                    id="kriteria_id_siswa">
                                                    @foreach ($kriteria as $item)
                                                        @php
                                                            $temp = false;
                                                        @endphp
                                                        <option value="{{ $item->id }}"
                                                            @foreach ($item->siswa_sub_kriteria as $item2) 
                                            @if ($item2->siswa_id == $siswa_sub_kriteria->siswa_id && $item2->kriteria_id == $siswa_sub_kriteria->kriteria_id)
                                            selected
                                            @endif 
                                            @if ($item2->siswa_id == $siswa_sub_kriteria->siswa_id && $item2->kriteria_id != $siswa_sub_kriteria->kriteria_id)
                                            @php
                                             $temp=true   
                                            @endphp
                                            class="text-danger" disabled
                                            @endif @endforeach>
                                                            {{ $item->nama }} @if ($temp == true)
                                                                (kriteria sudah ada!)
                                                            @endif
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
                                                    @foreach ($kriteria as $item_kriteria)
                                                        @if ($item_kriteria->id == $siswa_sub_kriteria->kriteria_id)
                                                            @foreach ($item_kriteria->kriteria_sub_kriteria as $item_kriteria_sub_kriteria)
                                                                <option
                                                                    value="{{ $item_kriteria_sub_kriteria->sub_kriteria_id }}"
                                                                    @foreach ($siswa_sub_kriteria_get as $item_siswa_sub_kriteria_get)
                                                                    @if (
                                                                        $item_siswa_sub_kriteria_get->siswa_id == $item_siswa_sub_kriteria_get->siswa_id &&
                                                                            $item_kriteria_sub_kriteria->kriteria_id == $item_siswa_sub_kriteria_get->kriteria_id &&
                                                                            $item_kriteria_sub_kriteria->sub_kriteria_id == $item_siswa_sub_kriteria_get->sub_kriteria_id)
                                                                       selected
                                                                    @endif @endforeach>
                                                                    {{ $item_kriteria_sub_kriteria->sub_kriteria->nama }}

                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    @endforeach
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
