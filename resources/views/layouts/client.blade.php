<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blanja - @yield('title')</title>

    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('client/assets/img/favicon.ico') }}">

    <!-- CSS here -->

    <link rel="stylesheet" href="{{ asset('client/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/style.css') }}">
    @yield('css')



    @livewireStyles
    @livewireScripts
    <script src="{{ asset('assets/js/livewire-turbolinks.js') }}" data-turbolinks-eval="false"></script>



</head>
<body>



    @yield('content')






    <script src="{{ asset('client/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('client/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/bootstrap.min.js') }}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('client/assets/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('client/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/slick.min.js') }}"></script>

    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('client/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/animated.headline.js') }}"></script>
    <script src="{{ asset('client/assets/js/jquery.magnific-popup.js') }}"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{ asset('client/assets/js/jquery.scrollUp.min.js') }}"></script>

    <script src="{{ asset('client/assets/js/jquery.sticky.js') }}"></script>


    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('client/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('client/assets/js/main.js') }}"></script>

    <script src="{{ mix('js/app.js') }}" defer></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    </script>
    <x-livewire-alert::scripts />


    @yield('js')
</body>
</html>
