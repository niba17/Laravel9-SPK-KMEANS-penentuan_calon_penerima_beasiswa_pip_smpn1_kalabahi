@extends('layouts.master')
@section('title', 'KMEANS | Edit Akun')
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
                                <h5 class="m-b-10"><a href="/akun">Akun</a></h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">edit</li>
                                {{-- <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">Sample Page</li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- [ sample-page ] start -->

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="/akun-update/{{ $akun->id }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="mb-3 col-lg-4">
                                        <label for="nama" class="form-label">Username</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            id="nama" name="nama" value="{{ $akun->nama }}">
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-lg-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password" placeholder="...">
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-lg-4">
                                        <label for="konfirmPassword" class="form-label">Konfirmasi Password</label>
                                        <input type="password"
                                            class="form-control @error('konfirmPassword') is-invalid @enderror"
                                            id="konfirmPassword" aria-describedby="passwordHelp" name="konfirmPassword"
                                            placeholder="...">
                                        <div id="passwordHelp" class="form-text">Konfirmasi password harus sesuai dengan
                                            password
                                        </div>
                                        @error('konfirmPassword')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-secondary me-2">Simpan</button>
                                <a href="/akun" class="btn btn-outline-danger">Batal</a>
                            </form>
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
