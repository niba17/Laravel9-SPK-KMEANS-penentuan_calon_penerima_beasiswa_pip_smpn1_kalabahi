@extends('layouts.master')
@section('title', 'KMEANS | Edit Tingkat')
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
                                <li class="breadcrumb-item">Edit Tingkat</li>
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
                            <h5>Edit Tingkat</h5>
                        </div>
                        <div class="card-body">
                            {{-- <div class="bd-example"> --}}
                            <form action="/tingkat-update/{{ $tingkat->id }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                id="nama" name="nama" value="{{ $tingkat->nama }}"
                                                aria-describedby="emailHelp">
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary me-2">Simpan</button><a
                                            href="/tingkat_kelas" class="btn btn-outline-danger">Batal</a>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
        <!-- [ sample-page ] end -->

    </div>
    <!-- [ Main Content ] end -->

@endsection
