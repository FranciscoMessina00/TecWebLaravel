<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>FLAK | @yield('title', 'Home')</title>
        <link rel="stylesheet" href="{{ asset('css/stylePersonale.css') }}"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Courier+Prime:wght@400;700&display=swap" rel="stylesheet">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('icons/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icons/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('icons/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('icons/site.webmanifest') }}" crossorigin="use-credentials">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        @section('scripts')
        <script src="{{ asset('Js/menu.js') }}"></script> 
        @show

    </head>
    @php
    $route=Route::currentRouteName();
    @endphp
    <body class="{{ $route == 'home' ? 'sfondo-1' : '' }}">
        <!-- Public Navbar -->
        @include('layouts._nav_public')

        {!! $route == 'home' ? '' : '<br>' !!}
        <section>
            @yield('content')
        </section>

        @include('layouts.footer')
    </body>

</html>
