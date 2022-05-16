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
                        
                        <li class="nav-item {{ $route == 'home' ? 'active' : '' }}">
                            <a href="{{ route('home1') }}" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item {{ $route == 'catalog' ? 'active' : '' }}">
                            <a href="{{ route('catalog') }}" class="nav-link">Catalogo</a>
                        </li>
                        <li class="nav-item {{ $route == 'login' ? 'active' : '' }}">
                            <a href="{{ route('login') }}" class="nav-link">Log-in</a>
                        </li>
                        <li class="nav-item {{ $route == 'signup' ? 'active' : '' }}">
                            <a href="{{ route('signup') }}" class="nav-link">Registrati</a>
                        </li>
                    </ul>                        
                </div>

            </nav>  

        </div>                                  
    </div>            
 </div>
<br>
