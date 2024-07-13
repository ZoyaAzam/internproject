<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <head>
        <meta charset="UTF-8">

        <!--====== Title ======-->


        <title>@yield('title', 'AWAWDEH - AUTO SPARE PARTS')</title>

        <meta name="description" content="@yield('description', 'Default description')">
        <meta name="keywords" content="@yield('keywords', 'Default keywords')">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!--====== Favicon Icon ======-->
        <link rel="shortcut icon" href="{{ asset('user_assets/images/fav.png') }}" type="image/png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <link rel="stylesheet" href="{{asset('user_assets/css/plugins/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('user_assets/css/plugins/fontawesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('user_assets/css/style.css')}}">
         @yield('addCss')

    </head>
</head>
<body>
    @include('layouts.userpanel.header')
    @include('layouts.userpanel.navbar')
    @yield('content')
    @yield('script')
    @yield('ScriptMineExtra');
    @include('layouts.userpanel.footer')

</body>
</html>