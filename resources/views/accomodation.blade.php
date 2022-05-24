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
        <div class="margin-t-small border-t">
            <h2 class='pad-tb-small'>Info sull'alloggio</h2>
            <p>{{$accomodation->description}}</p>
        </div>
        <br>

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

        @include('layouts.back_button')
    </div>
</div>
@endsection