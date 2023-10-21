<!DOCTYPE html>
<html dir="ltr" lang="es">

<head>

    <title>{{config('app.name')}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sobre Nosotros">
    <meta name="author" content="DeCoDev Desarrollo de Software">
    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('logos/ico.ico')}}" type="image/x-icon">

    <link rel="stylesheet" href="{{asset('theme/style.css')}}">

    <script src="{{asset('plugins/fontawesome/key.js')}}" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: "Open Sans", sans-serif;
            font-size: 14px;
            color: #0c96f3;
            font-weight: 400;
            background: #009d52 !important;
            position: relative;
        }

        .pcoded-navbar.menu-light .pcoded-inner-navbar>li.active>a,
        .pcoded-navbar.menu-light .pcoded-inner-navbar>li.pcoded-trigger>a {
            background: #5c8ee3 !important;
            color: #fff;
        }

        .pcoded-header.header-blue:not(.headerpos-fixed) {
            background: #5c8ee3 !important;
        }


        .fixed-button.active {

            display: none;
        }
    </style>
    @yield('styles')
</head>

<body>

    <!-- [ Pre-loader ] start -->
    @include('partial.admin.loader')
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    @include('partial.admin.navbar1')
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    @include('partial.admin.header1')
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            @include('partial.admin.bread')
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            @include('partial.includes.alerts')
            <!-- TODO yield e spara pintar contenido -->
            @yield('content')
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->

    <script src="{{asset('theme/vendor-all.js')}}"></script>
    <script src="{{asset('theme/bootstrap.min.js')}}"></script>
    <script src="{{asset('theme/ripple.js')}}"></script>
    <script src="{{asset('theme/pcoded.min.js')}}"></script>
    <script src="{{asset('plugins/bootstrap/jquery.min.js')}}"></script>
    <script src="{{asset('plugins/bootstrap/popper.min.js')}}"></script>
    <script src="{{asset('plugins/bootstrap/bootstrap.min.js')}}"></script>

    @yield('scripts')
</body>

</html>