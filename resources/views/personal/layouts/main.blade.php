<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Deetrade.uno') }}</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="/favicon-32x32.ico" type="image/x-icon">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/wow.min.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>


    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    @yield('head-links')
</head>

<body>
    @yield('content')

    <div id="preloader">
        <div id="loader"></div>
    </div>
    @yield('body-scripts')
    @include('modal.two-factor-confirm')
    <script>
        window.$(document).ready(function () {
            @if(session('modal') === 'login')
            window.$('#loginModal').modal('show');
            @elseif(session('modal') === 'register')
            window.$('#registerModal').modal('show');
            @elseif(session('modal') === 'forgot')
            window.$('#forgotModal').modal('show');
            @elseif(session('modal') === 'promocode_not_found')
            window.$('#promocodeNotFoundModal').modal('show');
            @elseif(session('modal') === 'two_factor')
            window.$('#twoFactorCodeModal').modal('show');
            @elseif(session('modal') === 'two_factor_disable')
            window.$('#twoFactorDisableModal').modal('show');
            @elseif(session('modal') === 'two_factor_confirm')
            window.$('#twoFactorConfirmModal').modal('show');
            @endif
            document.getElementById('go-to-login').addEventListener('click', function() {
                window.$('#registerModal').modal('hide');
                window.$('#loginModal').modal('show');
                window.$('#forgotModal').modal('hide');
            });
            document.getElementById('go-to-login-1').addEventListener('click', function() {
                window.$('#registerModal').modal('hide');
                window.$('#loginModal').modal('show');
                window.$('#forgotModal').modal('hide');
            });
            document.getElementById('go-to-register').addEventListener('click', function() {
                window.$('#loginModal').modal('hide');
                window.$('#registerModal').modal('show');
                window.$('#forgotModal').modal('hide');
            });
            document.getElementById('go-to-register-1').addEventListener('click', function() {
                window.$('#loginModal').modal('hide');
                window.$('#registerModal').modal('show');
                window.$('#forgotModal').modal('hide');
            });
            document.getElementById('go-to-forgot').addEventListener('click', function() {
                window.$('#loginModal').modal('hide');
                window.$('#registerModal').modal('hide');
                window.$('#forgotModal').modal('show');
            });
        })

        window.onload = () => {
            setTimeout(() => {
                document.getElementById('preloader').style.display = 'none';
            }, 1000);
        }
    </script>
</body>
</html>
