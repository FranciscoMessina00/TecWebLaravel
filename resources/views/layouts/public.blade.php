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
        <script src="../js/funzioni.js"></script>
    </head>
    @php
        $route=Route::currentRouteName();
    @endphp
    <body class="{{ $route == 'home1' ? 'sfondo-1' : '' }}">
        <!-- Public Navbar -->
        @include('layouts._nav_public')

        <section>
            @yield('content')
        </section>

        <footer>
            <div class="contenitore-flex text-white">
                <div class="margin-t-mid margin-b-15">
                    <h4 class="margin-b-20">Chi siamo</h4>
                    <p>
                        Lorem ipsum dolor sit amet,
                        consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt
                        ut labore et dolore magna aliqua.
                    </p>
                </div>
                <div class="margin-t-mid margin-b-15">
                    <h4 class="margin-b-20">Quick Links</h4>
                    <p>
                        Lorem ipsum dolor sit amet,
                        consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt
                        ut labore et dolore magna aliqua.
                    </p>
                </div>
                <div class="margin-t-mid margin-b-15">
                    <h4 class="margin-b-20">Customer Care</h4>
                    <p>
                        Lorem ipsum dolor sit amet,
                        consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt
                        ut labore et dolore magna aliqua.
                    </p>
                </div>
                <div class="margin-t-mid margin-b-15">
                    <h4 class="margin-b-20">Contact Us</h4>
                    <p>
                        Lorem ipsum dolor sit amet,
                        consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt
                        ut labore et dolore magna aliqua.
                    </p>
                </div>
            </div>
        </footer>
    </body>
</html>
