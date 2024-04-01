@extends('layouts.master')
@section('title', 'KMEANS | Edit Relasi Kriteria & Sub Kriteria')
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
                                <li class="breadcrumb-item">Edit Relasi Kriteria & Sub Kriteria</li>
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
                            <h5>Edit Relasi Kriteria & Sub Kriteria</h5>
                        </div>
                        <div class="card-body">
                            {{-- <div class="bd-example"> --}}
                            <div class="row">
                                <form action="/kriteria_sub_kriteria-update/{{ $kriteria_sub_kriteria->id }}"
                                    method="post">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="kriteria_id" class="form-label">Kriteria</label>
                                                <input type="text"
                                                    class="form-control @error('kriteria_id') is-invalid @enderror"
                                                    id="kriteria_id" value="{{ $kriteria_sub_kriteria->kriteria->nama }}"
                                                    disabled aria-describedby="emailHelp">
                                                @error('kriteria_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <input type="hidden" class="form-control" id="kriteria_id" name="kriteria_id"
                                                value="{{ $kriteria_sub_kriteria->kriteria->id }}">
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="sub_kriteria_id" class="form-label">Sub Kriteria</label>
                                                <select class="form-select @error('sub_kriteria_id') is-invalid @enderror"
                                                    aria-label="Default select example" name="sub_kriteria_id"
                                                    id="sub_kriteria_id">
                                                    {{-- <option selected disabled>Pilih Kriteria terlebih dahulu ...</option> --}}
                                                    @foreach ($sub_kriteria as $item_sub_kriteria)
                                                        @php
                                                            $temp = false;
                                                        @endphp
                                                        <option value="{{ $item_sub_kriteria->id }}"
                                                            @foreach ($item_sub_kriteria->kriteria_sub_kriteria as $item_kriteria_sub_kriteria) 
                                            @if (
                                                $item_kriteria_sub_kriteria->kriteria_id == $kriteria_sub_kriteria->kriteria_id &&
                                                    $item_kriteria_sub_kriteria->sub_kriteria_id == $kriteria_sub_kriteria->sub_kriteria_id)
                                            selected
                                            @endif 
                                            @if (
                                                $item_kriteria_sub_kriteria->kriteria_id == $kriteria_sub_kriteria->kriteria_id &&
                                                    $item_kriteria_sub_kriteria->sub_kriteria_id != $kriteria_sub_kriteria->sub_kriteria_id)
                                            @php
                                             $temp=true   
                                            @endphp
                                            class="text-danger" disabled
                                            @endif @endforeach>
                                                            {{ $item_sub_kriteria->nama }} @if ($temp == true)
                                                                (sudah dipilih!)
                                                            @endif
                                                        </option>
                                                    @endforeach
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
                                                    name="bobot" value="{{ $kriteria_sub_kriteria->bobot }}"
                                                    step="any" aria-describedby="emailHelp">
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
