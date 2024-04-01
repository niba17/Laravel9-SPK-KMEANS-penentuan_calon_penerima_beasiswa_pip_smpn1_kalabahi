@extends('layouts.master')
@section('title', 'KMEANS | Akun')
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
                                {{-- <li class="breadcrumb-item"><a href="../navigation/index.html">Akun</a></li> --}}
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

                @foreach ($akun as $item)
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                {{-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                alt="avatar" class="rounded-circle img-fluid" style="width: 150px;"> --}}
                                <i class="fa-solid fa-user-large rounded-circle img-fluid text-purple-600"
                                    style="font-size:100px;"></i>
                                {{-- <i class="fa-solid fa-user-shield rounded-circle img-fluid" style="font-size:100px;"></i> --}}
                                <h5 class="mt-3">{{ $item->nama }}</h5>
                                <p class="text-muted mb-4">Administrator</p>
                                {{-- <p class="text-muted mb-4">{{ $item->created_at }}</p> --}}
                                <div class="d-flex justify-content-center mb-2">
                                    <a href="/akun-edit/{{ $item->id }}"
                                        class="btn btn-secondary  @if ($current_id != $item->id) disabled @endif"><i
                                            class="fa-solid fa-user-pen"></i></a>
                                    <button onclick="hapus('{{ $item->id }}','akun')" type="/akun-destroy"
                                        class="btn btn-outline-secondary ms-1 @if ($current_id != $item->id) disabled @endif"><i
                                            class="fa-solid fa-trash"></i>
                                    </button>

                                </div>
                            </div>
                        </div>
                        {{-- <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush rounded-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fas fa-globe fa-lg text-warning"></i>
                                    <p class="mb-0">https://mdbootstrap.com</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                    <p class="mb-0">mdbootstrap</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                    <p class="mb-0">@mdbootstrap</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                    <p class="mb-0">mdbootstrap</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                    <p class="mb-0">mdbootstrap</p>
                                </li>
                            </ul>
                        </div>
                    </div> --}}
                    </div>
                @endforeach
                <!-- [ sample-page ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->

@endsection
