<div class="tm-header">
    <div class="container-fluid">
        <div class="tm-header-inner">                    
            <div class="tm-logo-img-container">
                <img src="../files/FLAK_logo.png" alt="logo" style="display: none"/>
            </div>
            <!-- navbar -->
            <nav class="navbar tm-main-nav">

                <button class="navbar-toggler hidden-md-up" type="button" data-toggle="colapse" data-target="#tmNavbar" onclick="toggleMenu('tmNavbar')">
                    &#9776;
                </button>

                <div class="collapse navbar-toggleable-sm" id="tmNavbar">
                    <ul class="nav navbar-nav">
                        @php
                            $route=Route::currentRouteName();
                        @endphp
                        
                        <li class="nav-item {{ $route == 'home1' ? 'active' : '' }}">
                            <a href="{{ route('home1') }}" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item {{ $route == 'catalog' ? 'active' : '' }}">
                            <a href="{{ route('catalog') }}" class="nav-link">Catalogo</a>
                        </li>
                        
                        @if($route=='login')
                        <li class="nav-item">
                            <div class="tm-btn tm-btn-gray text-white no-select nav-link">Non hai un account?</div>
                        </li>
                        <li class="nav-item active">
                            <a href="{{ route('signup') }}" class="tm-btn nav-link">Registrati</a>
                        </li>
                        @elseif($route=='signup')
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
                        <li class="nav-item {{ $route == 'signup' ? 'active' : '' }}">
                            <a href="{{ route('signup') }}" class="nav-link">Registrati</a>
                        </li>
                        @endif
                    </ul>                        
                </div>

            </nav>  

        </div>                                  
    </div>            
 </div>
<br>
