
@extends('layouts.public')
<?php
$user = Auth::user();
if ($user->role == 'student') {
    $canOption = !$user->hasOptioned($accomodation->accId) && !$accomodation->hasBeenAssigned();
} else {
    $canOption = false;
}
?>
@section('title', 'Account')

@section('content')
<div class="margin-t-x-large margin-b-40 contenitore-flex-2">

    <div class="container-big margin-lr pad-lr-mid">
        <h1 class="text-center text-gold">{{$accomodation->name}}</h1>
        <div class="offerta contenitore-flex">
            <div class="img-catalogo pad-lr-large" >
                <img src="{{ asset('images/Salotto catalogo.png') }}" alt="Immagine" class="bord-rad-lg" style="width:100%"/>
            </div>
            <div class="auto-margin-tb">

                @can('edit-accomodation', $accomodation)
                <script type="text/javascript" src="{{ asset('Js/ConfermaElimina.js') }}"></script>

                @if($accomodation->hasBeenAssigned())
                <div class=''>
                    <a class="tm-btn tm-btn-gray text-white nav-link margin-b-15 no-select text-center"><h1>Assegnato il {{$accomodation->assignedDate()}}</h1></a>
                </div>
                @endif
                <div class="contenitore-flex ">
                    <ul class="nav navbar-nav">

                        <li class="nav-item justify-center" id="modifica">
                            <a href="" class="tm-btn text-white nav-link margin-b-15">Modifica</a>
                        </li>
                        <li class="nav-item " id="elimina">
                            <a class="tm-btn tm-btn-brown text-white nav-link margin-b-15 no-select">Elimina</a>
                        </li>
                        <li class="nav-item nascondi" id="sicuro">
                            <div class="tm-btn tm-btn-brown text-white nav-link margin-b-15 no-select">Sicuro?</div>
                        </li>
                        <li class="nav-item nascondi" id="si">
                            <a href="" class="tm-btn tm-btn-green text-white nav-link margin-b-15">Si</a>
                        </li>
                        <li class="nav-item nascondi" id="no">
                            <div class="tm-btn tm-btn-red text-white nav-link margin-b-15 no-select">No</div>
                        </li>
                    </ul>
                </div>
                @endcan

                @can('isStudent')
                <div class="contenitore-flex">
                    <ul class="nav navbar-nav">
                        @if ($canOption)
                        <li class="nav-item">
                            <a href="{{ route('accomodation.option',$accomodation->accId) }}" class="tm-btn text-white nav-link margin-b-15"><h1>Opziona alloggio</h1></a>
                        </li>
                        @endif
                        @if($accomodation->hasBeenAssigned())
                        <li class="nav-item">
                            <a class="tm-btn-gray text-white nav-link margin-b-15 no-select text-center"><h1>Assegnato il {{$accomodation->assignedDate()}}</h1></a>
                        </li>
                        @elseif($user->hasOptioned($accomodation->accId))
                        <li class="nav-item">
                            <div class="tm-btn-red text-white nav-link margin-b-15 no-select"><h1>Hai già opzionato</h1></div>
                        </li>
                        @endif
                    </ul>
                </div>

                @endcan
            </div>

        </div>

        <div class="pad-lr-small margin-t-small pad-tb-small">
            <div class="contenitore-flex">
                <div>
                    <h4>Tipologia</h4>

                    <ul>
                        @switch($accomodation->tipology)
                        @case(0)
                        <li class="">Appartamento</li>
                        @break
                        @case(1)
                        <li class="">Posto letto</li>
                        @break

                        @endswitch
                    </ul>
                    <br>

                    <h4>Informazioni</h4>

                    <ul>
                        @switch($accomodation->tipology)
                        @case(0)
                        <li class="">Numero camere: {{$accomodation->rooms}}</li>
                        <li class="">Numero letti nell'alloggio: {{$accomodation->totBeds}}</li>
                        @break
                        @case(1)
                        <li class="">Numero letti nella camera: {{$accomodation->totBedRoom}}</li>
                        @break

                        @endswitch
                    </ul>
                    <br>

                    <h4>Posizione</h4>

                    <ul>
                        <li>Indirizzo: {{$accomodation->address}}</li>
                        <li>Città: {{$accomodation->city}}</li>
                    </ul>
                    <br>
                </div>

                <div>
                    <h4>Prezzi</h4>

                    <ul>
                        <li>Canone d'affito: {{$accomodation->price}}&#8364/mese</li>
                    </ul>
                    <br>

                    <h4>Servizi inclusi</h4>

                    <ul>
                        @foreach($accomodation->services as $service)
                        <li>{{$service->name}}</li>
                        @endforeach
                    </ul>
                    <br>

                    <h4>Informazioni locatore</h4>

                    <ul>
                        <li>Nome: {{$accomodation->locator->name}}</li>
                        <li>Cognome: {{$accomodation->locator->surname}}</li>
                        <li>Username: {{$accomodation->locator->username}}</li>
                        @can('isStudent')
                        <li><a href="{{ route('messages.sendTo',[$accomodation->accId, 0]) }}" class="text-black">Contatta l'host</a></li>
                        @endcan
                    </ul>
                </div>
            </div>


        </div>

        <div class="margin-t-small border-t">
            <h2 class='pad-tb-small'>Info sull'alloggio</h2>
            <p>{{$accomodation->description}}</p>
        </div>
        <br>

        @can('edit-accomodation', $accomodation)
        @if($accomodation->hasRequests())
        <div>
            <h2 class='pad-tb-small border-t'>Richieste</h2>
            <ul>
                @foreach($accomodation->students as $student)
                <li>{{$student->name}} {{$student->surname}} di {{$student->age()}} anni ha fatto richiesta:   <a href="{{route('my-accomodations.accomodation.assign', [$accomodation->accId, $student->userId])}}" class="tm-btn text-white nav-link margin-b-15">Assegna</a></li>
                @endforeach
            </ul>
        </div>
        @endif

        @if($accomodation->hasBeenAssigned())
        <h2 class='pad-tb-small border-t'>Richieste</h2>
        <p>Assegnato il {{$accomodation->assignedDate()}} a {{$accomodation->assignedStudents->first()->name}}</p>
        @endif
        @endcan



        @include('layouts.back_button')

    </div>
</div>
@endsection