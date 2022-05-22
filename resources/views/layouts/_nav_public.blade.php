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
            <div class="tm-logo-img-container">
                <img src="../files/FLAK_logo.png" alt="logo" style="display: none"/>
            </div>
            
            <!<!-- Messaggio di benvenuto di prova. -->
            @if(Auth::check())
                <p class="pad-tb-mid">Benvenut* {{Auth::user()->name}}({{Auth::user()->role}})<p>
            @endif
            
            
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
                            <li class="nav-item {{ $route == $role.'.account' ? 'active' : '' }}">
                                <a href="{{ route($role.'.account') }}" class="nav-link">Account</a>
                            </li>
                        
                            @switch($role)
                                @case('locator')
                                    <li class="nav-item {{ $route == 'locator.messages' ? 'active' : '' }}">
                                        <a href="{{ route('locator.messages') }}" class="nav-link">Messaggi</a>
                                    </li>
                                    <li class="nav-item {{ $route == 'my-accomodations' ? 'active' : '' }}">
                                        <a href="{{ route('my-accomodations') }}" class="nav-link">I miei alloggi</a>
                                    </li>
                                    @break
                                @case('student')
                                    <li class="nav-item {{ $route == 'student.messages' ? 'active' : '' }}">
                                        <a href="{{ route('student.messages') }}" class="nav-link">Messaggi</a>
                                    </li>
                                    @break
                                @case('admin')
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
