<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GKE Haleluya Nanga Bulik | @yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('admin-lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin-lte/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/summernote/summernote-bs4.min.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <style type="text/css">
        header {
            background: rgba(255, 255, 255, 255);
            clip-path: none;
        }

        .container {
            max-width: 1152px;
            padding: 0 15px;
            margin: 0 auto;
        }
    </style>
</head>
<header>
    <div style="background-size: cover">
        <div class="container">
            <nav id="main-nav" class="flex items-center justify-between">
                <div class="left flex items-center">
                    <div class="branding">
                    <a href="/"><img style="height:70px" src="./img/logo1.png" alt=""></a>
                    </div>
                    <div class="left">
                        <a href="/warta">Warta Jemaat</a>
                        <a href="/liturgi">Liturgi</a>
                        <a href="/renungan">Renungan</a>
                        <a href="/video">Video</a>
                    </div>
                </div>
                <div class="right">
                    <a href="#kontak" button class="btn btn-primary">Kontak</a>
                    <!-- <form action="#kontak">
                                <button class="btn btn-primary"> Kontak </button>
                        </form> -->
                </div>
            </nav>
            @yield('content')
        </div>
    </div>
</header>