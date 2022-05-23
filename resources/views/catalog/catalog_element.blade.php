@php
$route=Route::currentRouteName();
@endphp
<div class="{{$route=='public'? '' : 'contenitore-flex'}} pad-tb-small pad-lr-small">
    <div class="img-catalogo {{$route=='public'? '' : 'pad-r-large'}} ">
        <img src="{{ asset('images/Salotto catalogo.png') }}" alt="Immagine" class="bord-rad-lg auto-margin-lr" style="width:100%"/>
    </div>
    <div>
        <h2 class='margin-b-15 text-center'>{{$accomodation->name}}</h2>


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
        @if($route!='public')
        <br>
        @endif
        
       
        <div>
            <h4>Dettagli:</h4>
            <br><br>
            <ul class="servizi">
                @foreach($accomodation->students as $student)
                    <li>{{$student->name}} ha opzionato</li>
                @endforeach
            </ul>
        </div>

    </div>
</div>
