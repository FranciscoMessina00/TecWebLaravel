<div class="contenitore-flex pad-tb-small pad-lr-small">
    <div class="img-catalogo pad-r-large">
        <img src="{{ asset('images/Salotto catalogo.png') }}" alt="Immagine" class="bord-rad-lg" style="width:100%"/>
    </div>
    <div>
        <h2 class='margin-b-15 text-center'>{{$accomodation->name}}</h2>
        @php
            $route=Route::currentRouteName();
        @endphp
        
        @if($route=='my-accomodations')
        <div class="contenitore-flex ">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <div class="tm-btn tm-btn-gray text-white no-select nav-link margin-b-15">{{$accomodation->requests}} richiest{{$accomodation->requests==1 ? 'a' : 'e'}}</div>
                </li>
                <li class="nav-item active">
                    <a href="catalogo.html" class="tm-btn nav-link margin-b-15">Assegna</a>
                </li>
            </ul>
        </div>
        @endif
        
        <br><br>
        <div>
            <h4>Dettagli:</h4>
            <br><br>
            <ul class="servizi">
                <li>Servizio 1</li>
                <li>Servizio 2</li>
                <li>Servizio 3</li>
                <li>Servizio 4</li>
                <li>Servizio 5</li>
                <li>Servizio 6</li>
                <li>Servizio 7</li>
                <li>Servizio 8</li>
                <li>Servizio 9</li>
                <li>Servizio 10</li>
            </ul>
        </div>

    </div>
</div>
