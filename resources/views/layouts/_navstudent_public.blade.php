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
                            <a href="{{ route('home3') }}" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item {{ $route == 'catalogstudent' ? 'active' : '' }}">
                            <a href="{{ route('catalogstudent') }}" class="nav-link">Catalogo</a>
                        </li>
                        
                        <li class="nav-item {{ $route == 'account' ? 'active' : '' }}">
                            <a href="{{ route('account') }}" class="nav-link">Account</a>
                        </li>
                        <li class="nav-item {{ $route == 'messaggi' ? 'active' : '' }}">
                            <a href="{{ route('messaggi') }}" class="nav-link">Messaggi</a>
                        </li>
                        <li class="nav-item {{ $route == 'logout' ? 'active' : '' }}">
                            <a href="{{ route('logout') }}" class="nav-link">Logout</a>
                        </li> 
                       
                        
                        <li class="nav-item {{ $route == 'faqstudente' ? 'active' : '' }}">
                            <a href="{{ route('faqstudente') }}" class="nav-link">FAQ</a>
                        </li>
                        
                    </ul>                        
                </div>

            </nav>  

        </div>                                  
    </div>            
 </div>

