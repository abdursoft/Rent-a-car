<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- PAGE TITLE START -->
    <title>@yield('title')</title>
    <!-- PAGE TITLE END -->

    <!-- AOS ANIMATION CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/aos.css') }}" />
    <!-- SWIPER ANIMATION CSS -->
    <link rel="stylesheet" href="{{asset('user/css/swiper-bundle.min.css')}}" type="text/css" />
    <!-- BOOTSTRAP CSS START -->
    <link rel="stylesheet" href="{{asset('user/css/bootstrap.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('user/css/bootstrap-datepicker.min.css')}}" type="text/css" />
    <!-- SWEET ALERT CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/sweet.css')}}" />
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('user/css/style.css')}}" />
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet" />
    <!-- JQUERY SCRIPT START -->
    {{-- <script src="{{asset('user/js/jquery-1.11.0.min.js')}}"></script> --}}
    <script src="{{asset('user/js/jquery.min.js')}}"></script>
    <!-- MODERNEIZER SCRIPT -->
    <script src="{{asset('user/js/modernizr.js')}}"></script>
</head>

<body>
    @include('components.front.header')

    @yield('content')


    @include('components.front.footer')


    <!-- PLUGIN SCRIPT START -->
    <script src="{{asset('user/js/plugins.js')}}"></script>
    <!-- CUSTOM SCRIPT START -->
    <script src="{{asset('user/js/script.js')}}"></script>
    <!-- BOOTSTRAP BUNDLE SCRIPT START -->
    <script src="{{asset('user/js/bootstrap.bundle.min.js')}}"></script>
    <!-- BOOTSTRAP DATEPICKER BUNDLE SCRIPT START -->
    <script src="{{asset('user/js/bootstrap-datepicker.min.js')}}"></script>
    <!-- SWIPER BUNDLE SCRIPT START -->
    <script src="{{asset('user/js/swiper-bundle.min.js')}}"></script>
    <!-- ICONIFY BUNDLE SCRIPT START -->
    <script src="{{asset('user/js/iconify-icon.min.js')}}"></script>
    <!--SWEET ALERT SCRIPT START -->
    <script src="{{asset('js/sweet.js')}}"></script>
    <!-- AXIOS CLIENT SCRIPT START -->
    <script src="{{asset('axios/axios.js')}}"></script>
    <!-- AXIOS HELPER SCRIPT START -->
    <script src="{{asset('axios/script.js')}}"></script>
    <!-- USER CUSTOM SCRIPT START -->
    <script src="{{asset('js/user.js')}}"></script>
</body>
</html>
