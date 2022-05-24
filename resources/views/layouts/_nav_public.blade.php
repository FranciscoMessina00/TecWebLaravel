@php
$route=Route::currentRouteName();

if(Auth::check())
{
$role = Auth::user()->role;
}

@endphp


<div class="tm-header">
    <div class="container-fluid">
        <div class="tm-header-inner">                    
            <div class="contenitore-flex-3">
                <div class="tm-logo-img-container">
                    <img src="{{asset('/files/FLAK_logo.png')}}" alt="logo" style="display: none"/>
                </div>

                <!<!-- Messaggio di benvenuto di prova. -->
                @if(Auth::check())
                    <p class="pad-tb-mid pad-lr-small">Benvenut* {{Auth::user()->name}}({{Auth::user()->role}})<p>
                @endif
            </div>


            <!-- navbar -->
            <nav class="navbar tm-main-nav">

                <button class="navbar-toggler hidden-md-up" type="button" data-toggle="colapse" data-target="#tmNavbar" onclick="toggleMenu('tmNavbar')">
                    &#9776;
                </button>

                <div class="collapse navbar-toggleable-sm" id="tmNavbar">
                    <ul class="nav navbar-nav">

                        <li class="nav-item {{ $route == 'home' ? 'active' : '' }}">
                            <a href="{{ route('home') }}" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item {{ $route == 'catalog' ? 'active' : '' }}">
                            <a href="{{ route('catalog') }}" class="nav-link">Catalogo</a>
                        </li>

                        @if(!Auth::check())
                        @if($route=='login')
                        <li class="nav-item">
                            <div class="tm-btn tm-btn-gray text-white no-select nav-link">Non hai un account?</div>
                        </li>
                        <li class="nav-item active">
                            <a href="{{ route('register') }}" class="tm-btn nav-link">Registrati</a>
                        </li>
                        @elseif($route=='register')
                        <li class="nav-item">
                            <div class="text-white tm-btn tm-btn-gray no-select nav-link">Hai già un account?</div>
                        </li>
                        <li class="nav-item active">
                            <a href="{{ route('login') }}" class="tm-btn nav-link">Accedi</a>
                        </li>
                        @else
                        <li class="nav-item {{ $route == 'login' ? 'active' : '' }}">
                            <a href="{{ route('login') }}" class="nav-link">Accedi</a>
                        </li>
                        <li class="nav-item {{ $route == 'register' ? 'active' : '' }}">
                            <a href="{{ route('register') }}" class="nav-link">Registrati</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item {{ $route == 'account' ? 'active' : '' }}">
                            <a href="{{ route('account') }}" class="nav-link">Account</a>
                        </li>
                        
                        @can('use-chat')
                        <li class="nav-item {{ strtok($route, '.') == 'messages' ? 'active' : '' }}">
                            <a href="{{ route('messages') }}" class="nav-link">Messaggi</a>
                        </li>
                        @endcan

                        @switch($role)
                        @case('locator')
                        <!<!-- Il metodo strok restituisce una sottostringa formata a partire dalla stringa passata come primo parametro, tagliata fino alla prima occorrenza del carattere passato come secondo parametro-->
                        <li class="nav-item {{ strtok($route, '.') == 'my-accomodations' ? 'active' : '' }}">
                            <a href="{{ route('my-accomodations') }}" class="nav-link">I miei alloggi</a>
                        </li>
                        @break
                        @case('student')
                        @break
                        @case('admin')
                        <li class="nav-item {{ $route == 'admin.stats' ? 'active' : '' }}">
                            <a href="{{ route('admin.stats') }}" class="nav-link">Statistiche</a>
                        </li>
                        @break
                        @endswitch

                        <li class="nav-item {{ $route == 'logout' ? 'active' : '' }}">
                            <a href="{{ route('logout') }}" class="nav-link">Logout</a>
                        </li>
                        @endif
                    </ul>                        
                </div>

            </nav>  

        </div>                                  
    </div>            
</div>
