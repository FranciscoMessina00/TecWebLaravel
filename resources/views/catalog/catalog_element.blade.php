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
        @can('see-accomodation-details', $accomodation)
        <a class="text-gold" href="{{route('catalog.accomodation', $accomodation->accId)}}"><h2 class='margin-b-15 text-center'>{{$accomodation->name}}</h2></a>
        @endcan
        @cannot('see-accomodation-details', $accomodation)
        <h2 class='margin-b-15 text-center {{$route=='home'? 'text-white' : 'text-black'}}'>{{$accomodation->name}}</h2>
        @endcan

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

        @if($showSimplified)
            @include('catalog.informations_simplified')
        @else
            @include('catalog.informations')
        @endif

    </div>
</div>
