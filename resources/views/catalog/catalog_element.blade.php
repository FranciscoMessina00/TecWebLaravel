@php
    $route=Route::currentRouteName();
    
    $isAccomodationAssigned = $accomodation->hasBeenAssigned();
    
    if($isAccomodationAssigned)
    {
        $assignedStudents = $accomodation->assignedStudents;
    }
@endphp

<div class="{{$route=='home'? '' : 'contenitore-flex'}} pad-tb-small pad-lr-small">
    <div class="img-catalogo {{$route=='home'? 'margin-b-15' : 'pad-r-large'}} ">
        <img src="{{ asset('images/Salotto catalogo.png') }}" alt="Immagine" class="bord-rad-lg auto-margin-lr" style="width:100%"/>
    </div>
    <div>
        @if($route=='my-accomodations')
        <a class="text-gold" href="{{route('my-accomodations.accomodation', $accomodation->accId)}}"><h2 class='margin-b-15 text-center'>{{$accomodation->name}}</h2></a>
        @else
        <h2 class='margin-b-15 text-center {{$route=='home'? 'text-white' : 'text-black'}}'>{{$accomodation->name}}</h2>
        @endif

        @if($route=='my-accomodations')
        <div class="contenitore-flex ">
            <ul class="nav navbar-nav">
                
                @if($accomodation->hasBeenAssigned())
                <li class="nav-item">
                    <div class="tm-btn tm-btn-gray text-white no-select nav-link margin-b-15">Assegnato a {{$assignedStudents->first()->name}}</div>
                </li>
                @else
                <li class="nav-item">
                    <div class="tm-btn tm-btn-gray text-white no-select nav-link margin-b-15">{{$accomodation->requests()}} richiest{{$accomodation->requests()==1 ? 'a' : 'e'}}</div>
                </li>
                @endif
                
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
                <li>Locatore: {{$accomodation->locator->name}} {{$accomodation->locator->surname}}</li>
                <li>Indirizzo: {{$accomodation->address}}</li>
            </ul>
        </div>

    </div>
</div>
