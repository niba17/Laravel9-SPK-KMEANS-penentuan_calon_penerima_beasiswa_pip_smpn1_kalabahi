<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title>KMEANS | Login</title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Berry is made using Bootstrap 5 design framework. Download the free admin template & use it for your project." />
    <meta name="keywords"
        content="Berry, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template" />
    <meta name="author" content="CodedThemes" />

    <!-- [Favicon] icon -->
    <link rel="icon" href="{{ asset('template') }}/dist/assets/images/favicon.svg" type="image/x-icon" />
    <!-- [Google Font] Family -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap"
        id="main-font-link" />
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="{{ asset('template') }}/dist/assets/fonts/tabler-icons.min.css" />
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="{{ asset('template') }}/dist/assets/fonts/material.css" />
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="{{ asset('template') }}/dist/assets/css/style.css" id="main-style-link" />
    <link rel="stylesheet" href="{{ asset('template') }}/dist/assets/css/style-preset.css" id="preset-style-link" />

    <!-- Jquery JS -->
    <script type="text/javascript" src="{{ asset('/library') }}/jquery361.js"></script>

    <!-- SweetAlert2 -->
    <script src="{{ asset('/plugin') }}/sweetAlert2/sweetalert2.all.min.js"></script>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{ asset('/plugin') }}/fontawesomeFree620/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/template') }}/plugins/fontawesome-free/css/all.min.css">

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <div class="auth-main">
        <div class="auth-wrapper v3">
            <div class="auth-form">
                <div class="card my-5">
                    <form action="/login" method="post">
                        @csrf
                        <div class="card-body">
                            <a href="#" class="d-flex justify-content-center">
                                <h2 class="text-primary"><b>Login</b></h2>
                            </a>
                            {{-- <div class="row">
                            <div class="d-flex justify-content-center">
                                <div class="auth-header">
                                    <h2 class="text-secondary mt-5"><b>Login</b></h2>
                                    <p class="f-16 mt-2">Enter your credentials to continue</p>
                                </div>
                            </div>
                        </div> --}}
                            <br>
                            {{-- <div class="d-grid">
                            <button type="button" class="btn mt-2 btn-light-primary bg-light text-muted">
                                <img
                                    src="{{ asset('template') }}/dist/assets/images/authentication/google-icon.svg" />Sign
                                In With Google
                            </button>
                        </div> --}}
                            {{-- <div class="saprator mt-3">
                            <span>or</span>
                        </div> --}}
                            {{-- <h5 class="my-4 d-flex justify-content-center">Sign in with Email address</h5> --}}
                            <div class="form-floating mb-3">

                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    id="floatingInput" placeholder="Username" name="nama"
                                    value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating mb-3">

                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="login-password" placeholder="Password" name="password" />
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="floatingInput">Password</label>
                            </div>
                            <div class="d-flex mt-1 justify-content-between">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="form-check"><label
                                        for="form-check" class="text-primary fw-bold">Tampilkan
                                        password</label>
                                </div>
                                <a href="#" onclick="l_password()" class="text-primary fw-bold">Lupa
                                    Password?</a>
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                            <br>
                            <a href="/" class="text-primary fw-bold">Kembali</a>
                            {{-- <hr />
                        <h5 class="d-flex justify-content-center">Don't have an account?</h5> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
    <!-- Required Js -->
    <script src="{{ asset('template') }}/dist/assets/js/plugins/popper.min.js"></script>
    <script src="{{ asset('template') }}/dist/assets/js/plugins/simplebar.min.js"></script>
    <script src="{{ asset('template') }}/dist/assets/js/plugins/bootstrap.min.js"></script>
    <script src="{{ asset('template') }}/dist/assets/js/config.js"></script>
    <script src="{{ asset('template') }}/dist/assets/js/pcoded.js"></script>

    <script>
        $('.form-check-input').click(function() {
            if ($(this).is(':checked')) {
                $('#login-password').attr('type', 'text');
            } else {
                $('#login-password').attr('type', 'password');
            }
        })

        function l_password() {
            Swal.fire({
                text: "Hubungi pihak Developer untuk pemulihan Password!",
                icon: 'warning',
                confirmButtonText: 'OK'
            });
        }

        @if (Session::has('errMessage'))
            Swal.fire({
                icon: 'error',
                title: '{{ Session::get('errMessage') }}'
                // timer: 3000
            })
        @endif
        @if (Session::has('succMessage'))
            Swal.fire({
                icon: 'success',
                title: '{{ Session::get('succMessage') }}'
                // timer: 3000
            })
        @endif
    </script>
</body>
<!-- [Body] end -->

</html>
