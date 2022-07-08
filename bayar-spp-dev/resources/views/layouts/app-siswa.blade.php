<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale('/login')) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SPP WJ | {{ $title }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">

    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/select2-bootstrap4.min.css') }}">

    {{-- Other Script --}}
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/js/require.min.js') }}"></script>

    {{-- Other CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/tabler.css') }}">

    {{-- Datepicker --}}
    <link rel="stylesheet" href="{{ asset('assets/plugins/datepicker/datepicker.css') }}" />

    <script>
        requirejs.config({
            baseUrl: '{{ route('web.index') }}',
            paths: {
                "jquery": "assets/js/vendors/jquery-3.2.1.min",
                "datatables": "assets/plugins/datatables/datatables.min",
                "selectize": "assets/js/vendors/selectize.min",
                "datepicker": "assets/js/vendors/datepicker",
                "selectize": "assets/js/vendors/selectize.min",
                "sweetalert": "assets/js/vendors/sweetalert.min",
                "select2": "assets/js/vendors/select2.min",
            }
        });
    </script>

    @yield('css')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid ml-9">
            <img src="{{ asset('assets/img/logo-brand.png') }}" style="width: 40px" class="icon-brand" />
            <a class="navbar-brand" href="http://127.0.0.1:8000/dashboard/siswa">
                Pembayaran Walang Jaya
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="/dashboard/siswa">Beranda</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                SPP Pembayaran
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="/siswa/status/pembayaran">
                                        <i class="bi bi-bell"></i>
                                        Status Pembayaran
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/siswa/histori">
                                        <i class="bi bi-bar-chart-steps"></i>
                                        Histori Pembayaran
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav mr-9">
                        <li class="nav-item dropdown">
                            <a class="nav-link active" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                    style="width: 30px" class="rounded-circle mr-1" />
                                <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div>
                            </a>
                            <ul class="dropdown-menu ">
                                <li>
                                    <form action="/profil/siswa">
                                        <button class="dropdown-item">
                                            <i class="bi bi-person-fill mr-1" style="font-size: 18px"></i>
                                            Profil
                                        </button>
                                    </form>
                                </li>
                                <div class="dropdown-divider"></div>
                                <li>
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="bi bi-box-arrow-right mr-1" style="font-size: 18px"></i>
                                            Keluar
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>


    {{-- Main Content --}}
    <div id="app-siswa">
        <main class="container ml-9">
            <div class="row ml-7">
                @yield('content-siswa')
            </div>
        </main>
    </div>
    {{-- Custom JS --}}
    @yield('js')
</body>

</html>
