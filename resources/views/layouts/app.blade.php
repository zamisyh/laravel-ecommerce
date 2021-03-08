<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blanja - @yield('title')</title>

    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/ruang-admin.min.css') }}" rel="stylesheet">

    @yield('css')


    @livewireStyles
    @livewireScripts
    <script src="{{ asset('assets/js/livewire-turbolinks.js') }}" data-turbolinks-eval="false"></script>



</head>
<body id="page-top">

    <div id="wrapper">
        <x-admin.sidebar></x-admin.sidebar>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <x-admin.header></x-admin.header>
                @yield('content')
            </div>

            <x-admin.footer></x-admin.footer>
        </div>
    </div>



    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>





    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/ruang-admin.min.js') }}"></script>
    @include('sweetalert::alert')
    <script src="{{ mix('js/app.js') }}"></script>

    @yield('js')
</body>
</html>
