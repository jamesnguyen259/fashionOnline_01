<!DOCTYPE html>
<html lang="app()->getLocale()">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>E-Shopper - @yield('title')</title>
        <link href= "{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('bower_components/jquery-prettyPhoto/css/prettyPhoto.css') }}" rel="stylesheet">
        <!-- <link href="{{ asset('css/price-range.css')}}" rel="stylesheet"> -->
        <link href=" {{ asset('bower_components/animate.css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <link href="{{ asset('bower_components/responsive/vendor/responsive.css') }}" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="{{ asset('js/html5shiv.js') }}"></script>
        <script src="{{ asset('js/respond.min.js') }}"></script>
        <![endif]-->
        <link rel="shortcut icon" href="{{ asset('images/ico/favicon.ico') }}">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('images/ico/apple-touch-icon-144-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('images/ico/apple-touch-icon-114-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('images/ico/apple-touch-icon-72-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" href="{{ asset('images/ico/apple-touch-icon-57-precomposed.png') }}">
    </head><!--/head-->

    <body>
        @include('shared.header')
        @yield('content')
        @include('shared.footer')
        <script src="{{ asset('bower_components/jquery/jquery.js') }}"></script>
        <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('bower_components/scrollup/source/jquery.scrollUp.min.js') }}"></script>
        <!-- <script src="{{ asset('js/price-range.js') }}"></script> -->
        <script src="{{ asset('bower_components/jquery-prettyPhoto/js/jquery.prettyPhoto.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>
