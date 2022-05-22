<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>FLAK</title>
        <link rel="stylesheet" href="{{ asset('css/stylePersonale.css') }}"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Courier+Prime:wght@400;700&display=swap" rel="stylesheet">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="{{ asset('js/funzioni.js') }}"></script>
    </head>
    @php
        $route=Route::currentRouteName();
    @endphp
    <body class="{{ $route == 'homeadmin'}}">
        <!-- Public Navbar -->
        @include('layouts._navadmin_public')
        
      
        {{ $route == 'homeadmin' ? '' : '<br>' }}
        <section>
            @yield('content')
        </section>
        
        @include('layouts.footer')
    </body>
    
</html>