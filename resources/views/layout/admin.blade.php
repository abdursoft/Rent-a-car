<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="" type="image/x-icon">
    <title>@yield('title')</title>
    <!-- TEMPLATE ASSETS START -->
    <!-- GOOGLE FONT: Source Sans Pro -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> --}}
    <!-- FONT AWESOME ICONS -->
    <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- OVERLAY SCROLLBARS -->
    <link rel="stylesheet" href="{{asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- THEME STYLE -->
    <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
    <!-- SWEET ALERT CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/sweet.css')}}" />
    <!-- JQUERY LIBRARY -->
    <script src="{{asset('admin/js/jquery-3.7.1.min.js')}}"></script>
</head>

<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        @include('components.admin.header')
            @yield('content')
        @include('components.admin.footer')

    </div>
    <!-- ./wrapper -->


    <script src="{{ asset('admin/dist/js/demo.js') }}"></script>
    <script src="{{ asset('admin/js/popper.js') }}"></script>
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- REQUIRED SCRIPTS -->
    <!-- overlayScrollbars -->
    <script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>
    <!--SWEET ALERT SCRIPT START -->
    <script src="{{asset('js/sweet.js')}}"></script>
    <!-- AXIOS CLIENT SCRIPT START -->
    <script src="{{asset('axios/axios.js')}}"></script>
    <!-- AXIOS HELPER SCRIPT START -->
    <script src="{{asset('axios/script.js')}}"></script>
    <!-- ADMIN CUSTOM SCRIPT START -->
    <script src="{{asset('js/admin.js')}}"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ asset('admin/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('admin/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>
</body>
</html>