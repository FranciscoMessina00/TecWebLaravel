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
                        
                        <li class="nav-item {{ $route == 'home3' ? 'active' : '' }}">
                            <a href="{{ route('homeadmin') }}" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item {{ $route == 'catalogadmin' ? 'active' : '' }}">
                            <a href="{{ route('catalogadmin') }}" class="nav-link">Catalogo</a>
                        </li>
                        
                        <li class="nav-item {{ $route == 'statistiche' ? 'active' : '' }}">
                            <a href="{{ route('statistiche') }}" class="nav-link">Statistiche</a>
                        </li>
                       
                        <li class="nav-item {{ $route == 'logout' ? 'active' : '' }}">
                            <a href="{{ route('logout') }}" class="nav-link">Logout</a>
                        </li> 
                       
                        
                        <li class="nav-item {{ $route == 'faqadmin' ? 'active' : '' }}">
                            <a href="{{ route('faqadmin') }}" class="nav-link">FAQ</a>
                        </li>
                        
                    </ul>                        
                </div>

            </nav>  

        </div>                                  
    </div>            
 </div>

