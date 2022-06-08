@extends('layouts.public')
<?php
$user = Auth::user();
if ($user->role == 'student') {
    $canOption = !$user->hasOptioned($accomodation->accId) && !$accomodation->hasBeenAssigned();
} else {
    $canOption = false;
}
?>

@section('title', 'Scheda alloggio')

@section('scripts')

@parent
<script type="text/javascript" src="{{ asset('Js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('Js/ConfermaElimina.js') }}"></script>

@endsection

@section('content')
<div class="margin-t-x-large margin-b-40 contenitore-flex-2">

    <div class="container-big margin-lr pad-lr-mid">
        <h1 class="text-center text-gold">{{$accomodation->name}}</h1>
        <div class="offerta contenitore-flex pad-tb-small">
            <div class="img-catalogo pad-lr-large margin-t-mid" >
                <img src="{{ asset('images/accomodations/'.$accomodation->image->imageName) }}" alt="Immagine" class="bord-rad-lg" style="width:100%"/>
            </div>
            @can('edit-accomodation', $accomodation->accId)
            
                @if($accomodation->hasBeenAssigned())
                <div class="auto-margin-tb">
                <div class="contenitore-flex">
                    <div class="tm-btn tm-btn-gray text-white nav-link margin-b-15 no-select text-center">
                        <h1>Assegnato il {{$accomodation->dateAssign()}} alle {{$accomodation->timeAssign()}}</h1>
                    </div>
                </div>
                </div>
                @endif
            
            @endcan
            @can('isStudent')
            <div class="auto-margin-tb">
                
                @if($accomodation->hasBeenAssigned())
                <div class="contenitore-flex">
                    <div class="tm-btn tm-btn-gray text-white nav-link margin-b-15 no-select text-center">
                        <h1>Assegnato il {{$accomodation->dateAssign()}} alle {{$accomodation->timeAssign()}}</h1>
                    </div>
                </div>
                @endif

                
                <div class="contenitore-flex ">
                    <ul class="nav navbar-nav justify-center text-center">
                        @if ($canOption)
                        <li class="nav-item justify-center">
                            <a href="{{ route('accomodation.option',$accomodation->accId) }}" class="tm-btn-green text-white nav-link margin-b-15">
                                <h1>Opziona alloggio</h1>
                            </a>
                        </li>
                        @elseif($user->hasOptioned($accomodation->accId))
                        <li class="nav-item justify-center">
                            <div class="contenitore-flex">
                                <ul class="nav navbar-nav">
                                    <li class="nav-item justify-center" id="modifica">
                                        <div class="tm-btn-red text-white nav-link margin-b-15 no-select">
                                            <h1>Hai già opzionato il {{$accomodation->dateOption(Auth::id())}} alle {{$accomodation->timeOption(Auth::id())}}</h1>
                                        </div>
                                    </li>
                                    @include('layouts.delete-confirm', ['text' => 'Annulla la richiesta','confirm' => 'accomodation.cancel-option', 'params' => $accomodation->accId])
                                </ul>
                            </div>
                        </li>
                        @endif
                        <br>
                        <li class="nav-item no-float">
                            <a href="{{ route('messages.new', $accomodation->accId) }}" class="tm-btn text-white nav-link margin-b-15">
                                <h1>Contatta l'host</h1>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            @endcan
        </div>

        @can('edit-accomodation', $accomodation->accId)
        <div class="margin-t-small ">
            <h2 class='pad-tb-small'>Gestisci alloggio</h2>
            <div class="">
                <ul class="nav navbar-nav">

                    <li class="nav-item justify-center" id="modifica">
                        <a href="{{route('accomodation.edit', $accomodation->accId)}}" class="tm-btn text-white nav-link margin-b-15">Modifica</a>
                    </li>
                    @include('layouts.delete-confirm', ['text'=>'Elimina', 'confirm' => 'accomodation.delete', 'params' => $accomodation->accId])
                </ul>
            </div>
        </div>
        @endcan
        <br>

        <div class="margin-t-small border-t">
            <h2 class='pad-tb-small'>Informazioni</h2>
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

                    <h4>Dimensioni</h4>

                    <ul>
                        @switch($accomodation->tipology)
                        @case(0)
                        <li class="">Dimensione appartamento: {{$accomodation->dimAppartment}} metri quadri</li>
                        @break
                        @case(1)
                        <li class="">Dimensione posto letto: {{$accomodation->dimBedroom}} metri quadri</li>
                        @break

                        @endswitch
                    </ul>
                    <br>

                    <h4>Caratteristiche dell'alloggio</h4>

                    <ul>
                        <li class="">Numero totale di posti letto nell'alloggio: {{$accomodation->totBeds}}</li>
                        @switch($accomodation->tipology)
                        @case(0)
                        <li class="">Numero totale di camere nell'alloggio: {{$accomodation->rooms}}</li>
                        @break
                        @case(1)
                        @switch($accomodation->totBedRoom)
                        @case(1)
                        <li class="">Camera singola</li>
                        @break
                        @case(2)
                        <li class="">Camera doppia</li>
                        @break
                        @case(3)
                        <li class="">Camera tripla</li>
                        @break
                        @default
                        <li class="">Camera multipla: {{$accomodation->totBedRoom}} letti</li>
                        @endswitch
                        @break

                        @endswitch
                    </ul>
                    <br>

                    <h4>Posizione</h4>

                    <ul>
                        <li>Indirizzo: {{$accomodation->address}}</li>
                        <li>Città: {{$accomodation->city}}</li>
                    </ul>
                </div>

                <div>
                    <h4>Prezzi</h4>
                    <ul>
                        <li>Canone mensile: {{$accomodation->price}}&#8364</li>
                    </ul>
                    <br>
                    <h4>Servizi inclusi</h4>
                    <ul>
                        @foreach($accomodation->services as $service)
                        <li>{{$service->name}}</li>
                        @endforeach
                    </ul>
                    <br>
                    <h4>Disponibilità</h4>
                    <ul>
                        <li>Dal: {{date('d-m-Y', strtotime($accomodation->dateStart()))}}</li>
                        <li>Al: {{date('d-m-Y', strtotime($accomodation->dateFinish()))}}</li>
                    </ul>
                    <br>
                    <h4>Informazioni locatore</h4>

                    <ul>
                        <li>Nome: {{$accomodation->locator->name}}</li>
                        <li>Cognome: {{$accomodation->locator->surname}}</li>
                        <li>Username: {{$accomodation->locator->username}}</li>
                    </ul>

                </div>
            </div>
        </div>

        <div class="margin-t-small">
            <h2 class='pad-tb-small'>Descrizione</h2>
            <p>{{$accomodation->description}}</p>
        </div>
        <br>

        @can('edit-accomodation', $accomodation->accId)
        @if($accomodation->hasRequests())
        <div>
            <h2 class='pad-tb-small border-t'>Richieste</h2>
            <ul>
                @foreach($accomodation->optioningStudents as $student)
                <li>{{$student->name}} {{$student->surname}} ({{$student->gender}}) di {{$student->age()}} anni ha fatto richiesta:   <a href="{{route('my-accomodations.accomodation.assign', [$accomodation->accId, $student->userId])}}" class="tm-btn text-white nav-link margin-b-15">Assegna</a></li>
                @endforeach
            </ul>
        </div>
        @endif

        @if($accomodation->hasBeenAssigned())
        <div class='margin-t-small border-t'>
            <h2 class='pad-tb-small'>Richieste</h2>
            <p>
                Assegnato il {{$accomodation->dateAssign()}} alle {{$accomodation->timeAssign()}} a 
                {{$accomodation->assignedStudents->first()->name}}
                {{$accomodation->assignedStudents->first()->surname}} 
                ({{$accomodation->assignedStudents->first()->gender}}) di 
                {{$accomodation->assignedStudents->first()->age()}} anni
                <span class="contenitore-flex margin-t-small">
                    <ul class="nav navbar-nav">
                        @include('layouts.delete-confirm', ['text' => 'Annulla assegnazione','confirm' => 'my-accomodations.accomodation.cancel-assign', 'params' => $accomodation->accId])
                    </ul>
                </span>
            </p>
        </div>

        @endif
        @endcan

        @can('is-assigned-student', $accomodation)
        @if($accomodation->hasBeenAssigned())
        <div class='margin-t-small border-t'>
            <h2 class='pad-tb-small border-t'>Contratto</h2>
            <p>Assegnato il {{$accomodation->dateAssign()}} alle {{$accomodation->timeAssign()}} a te</p>
        </div>
        @endif
        @endcan


        <div class="contenitore-flex border-t margin-t-mid">
            @can('edit-accomodation', $accomodation->accId)
            @include('layouts.back_button', ['route' => 'my-accomodations', 'parameters' => [] ])
            @endcan

            @can('isStudent')
            @include('layouts.back_button', ['route' => null, 'parameters' => [] ])
            @endcan

            @can('see-contract', $accomodation)
            <div class='margin-t-mid'>
                <div class="contenitore-flex justify-content-end">
                    <a href="{{ route('contract', $accomodation->accId) }}" class="tm-btn text-white nav-link margin-b-15">Visualizza contratto</a>
                </div>
            </div>
            @endcan
        </div>

    </div>
</div>
@endsection