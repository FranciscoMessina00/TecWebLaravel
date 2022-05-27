@extends('layouts.public')

@section('title', 'Account')

@section('content')
<div class="margin-t-x-large margin-b-40 contenitore-flex-2">

    <div class="container-big margin-lr pad-lr-mid">
        <h1 class="text-center text-gold">{{$accomodation->name}}</h1>
        <div class="offerta contenitore-flex">
            <div class="img-catalogo pad-r-large">
                <img src="{{ asset('images/Salotto catalogo.png') }}" alt="Immagine" class="bord-rad-lg" style="width:100%"/>
            </div>
            <div>
                
                @can('edit-accomodation', $accomodation)
                <div class="contenitore-flex">
                    <ul class="nav navbar-nav">
                        <li class="nav-item">
                            <a href="catalogo.html" class="tm-btn text-white nav-link margin-b-15">Modifica</a>
                        </li>
                        <li class="nav-item">
                            <a href="catalogo.html" class="tm-btn tm-btn-brown text-white nav-link margin-b-15">Elimina</a>
                        </li>
                    </ul>
                </div>
                @endcan
                
                <div>
                    <h4>Tipologia</h4>
                    <br>
                    <ul class="servizi">
                        @switch($accomodation->tipology)
                        @case(0)
                        <li class="servizi">Appartamento</li>
                        @break
                        @case(1)
                        <li class="servizi">Posto letto</li>
                        @break

                        @endswitch
                    </ul>
                    <br><br>

                    <h4>Informazioni</h4>
                    <br>
                    <ul class="servizi">
                        @switch($accomodation->tipology)
                        @case(0)
                        <li class="servizi">Numero camere: {{$accomodation->rooms}}</li>
                        <li class="servizi">Numero letti nell'alloggio: {{$accomodation->totBeds}}</li>
                        @break
                        @case(1)
                        <li class="servizi">Numero letti nella camera: {{$accomodation->totBedRoom}}</li>
                        @break

                        @endswitch
                    </ul>
                    <br><br>

                    <h4>Posizione</h4>
                    <br>
                    <ul class="servizi">
                        <li>Indirizzo: {{$accomodation->address}}</li>
                        <li>Città: {{$accomodation->city}}</li>
                    </ul>
                    <br><br>

                    <h4>Prezzi</h4>
                    <br>
                    <ul class="servizi">
                        <li>Canone d'affito: {{$accomodation->price}}&#8364/mese</li>
                    </ul>
                    <br><br>

                    <h4>Informazioni locatore</h4>
                    <br>
                    <ul class="servizi">
                        <li>Nome: {{$accomodation->locator->name}}</li>
                        <li>Cognome: {{$accomodation->locator->surname}}</li>
                        <li>Username: {{$accomodation->locator->username}}</li>
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
            <h2 class='pad-tb-small'>Richieste</h2>
            <ul>
                @foreach($accomodation->students as $student)
                <li>{{$student->name}} ha fatto richiesta:   <a href="{{route('my-accomodations.accomodation.assign', [$accomodation->accId, $student->userId])}}" class="tm-btn text-white nav-link margin-b-15"> Assegna</a></li>
                @endforeach
            </ul>
        </div>
        @endif
        
        @if($accomodation->hasBeenAssigned())
        <h2 class='pad-tb-small'>Richieste</h2>
        <p>Assegnato il {{$accomodation->updated_at}} a {{$accomodation->assignedStudents->first()->name}}</p>
        @endif
        @endcan

        @include('layouts.back_button')
    </div>
</div>
@endsection