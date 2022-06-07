@extends('layouts.public')

@section('title', 'Contratto')


@section('content')
<div class="margin-t-x-large margin-b-40 contenitore-flex-2">

    <div class="container-big margin-lr pad-lr-mid">
        <h1 class="text-center text-gold">Contratto di locazione - {{$accomodation->name}}</h1>
        <div class="offerta contenitore-flex">
            <div>
                <h1>Contratto</h1>
                <p>{{$accomodation->tipology == 0 ? "L'appartamento" : 'Il posto letto'}} 
                    {{$accomodation->name}}, viene assegnato a {{$student->name}} {{$student->surname}}
                    in data {{$accomodation->dateAssign()}}, alle ore {{$accomodation->timeAssign()}},
                    per il periodo che va dal {{$accomodation->dateStart()}} al {{$accomodation->dateFinish()}}.
                </p>
                <h1>Dettagli alloggio</h1>
                <ul>
                    <li>Nome: {{$accomodation->name}}</li>
                    <li>Tipologia: {{$accomodation->tipology == 0 ? "Appartamento" : 'Posto letto'}}</li>
                    <li>Città: {{$accomodation->city}}</li>
                    <li>Indirizzo: {{$accomodation->address}}</li>
                </ul>
                <h1>Dettagli locatario</h1>
                <ul>
                    <li>Nome: {{$student->name}}</li>
                    <li>Cognome: {{$student->surname}}</li>
                    <li>Email: {{$student->email}}</li>
                    <li>Data di nascita: {{$student->bornDate()}}</li>
                    <li>Età: {{$student->age()}}</li>
                    <li>Genere: {{$student->gender == 'uomo' ? 'Maschio' : ($locator->gender == 'donna' ? 'Femmina' : 'Altro')}}</li>
                </ul>
                <h1>Dettagli locatore</h1>
                <ul>
                    <li>Nome: {{$locator->name}}</li>
                    <li>Cognome: {{$locator->surname}}</li>
                    <li>Email: {{$locator->email}}</li>
                    <li>Data di nascita: {{$locator->bornDate()}}</li>
                    <li>Età: {{$locator->age()}}</li>
                    <li>Genere: {{$locator->gender == 'uomo' ? 'Maschio' : ($locator->gender == 'donna' ? 'Femmina' : 'Altro')}}</li>
                </ul>
            </div>
        </div>

        @include('layouts.back_button', ['route' => 'catalog.accomodation', 'parameters' => [$accomodation->accId] ])

    </div>
</div>
@endsection