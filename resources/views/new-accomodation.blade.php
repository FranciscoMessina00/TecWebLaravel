@extends('layouts.public')

@section('title', 'Aggiungi alloggio')

@section('content')
<!-- inizio zona di accesso-->
<br>
<div class="margin-t-x-large margin-b-40 text-center ">
    <div class="container-small auto-margin-lr pad-lr-large">
        <h2 class="text-center margin-b-40 margin-t-small text-gold text-large">Aggiungi un alloggio</h2>
        {{ Form::open(array('route' => 'accomodation.add', 'method' => 'post')) }}

        <!-- Sezione tipologia alloggio-->
        <div>
            <div class="text-left">
                {{ Form::label('tipology', 'Quale tipo di alloggio vuoi inserire?', ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{ Form::select('tipology', ['0' => 'Appartamento', '1' => 'Posto letto'], null, ['class' => 'form-element','id' => 'acc_tipology']) }}

                @if ($errors->first('tipology'))
                <ul class="errors">
                    @foreach ($errors->get('tipology') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>

        <!-- Nome -->
        <div>


            <div class="text-left">
                {{ Form::label('name', 'Nome', ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{ Form::text('name', '', ['class' => 'form-element', 'id' => 'name', 'placeholder'=>'Inserisci nome']) }}

                @if ($errors->first('name'))
                <ul class="errors">
                    @foreach ($errors->get('name') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>

        <div>
            <div class="text-left">
                {{ Form::label('city', 'Città', ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{ Form::text('city', '', ['class' => 'form-element', 'id' => 'citta', 'placeholder'=>'Inserisci la città']) }}
                @if ($errors->first('surname'))
                <ul class="errors">
                    @foreach ($errors->get('city') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>

        <div>
            <div class="text-left">
                {{ Form::label('address', 'Indirizzo', ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{ Form::text('address', '', ['class' => 'form-element', 'id' => 'name', 'placeholder'=>"Inserisci l'indirizzo"]) }}
                @if ($errors->first('address'))
                <ul class="errors">
                    @foreach ($errors->get('address') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>

        <div>
            <div class="text-left">
                {{ Form::label('description', "Descrizione dell'alloggio", ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{ Form::textarea('description', '', ['class' => 'form-element','id' => 'description','placeholder'=>"Descrivi l'alloggio"]) }}

                @if ($errors->first('description'))
                <ul class="errors">
                    @foreach ($errors->get('description') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>

        <!-- Generico -->

        <div>
            <div class="text-left">
                {{ Form::label('totBeds', "Numero totale posti letto nell'alloggio", ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{ Form::text('totBeds', '', ['class' => 'form-element','id' => 'totBeds','placeholder'=>"Quanti posti letto?"]) }}
                @if ($errors->first('totBeds'))
                <ul class="errors">
                    @foreach ($errors->get('totBeds') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>

        <!-- Specifico appartamento -->
        <div>
            <div class="text-left">
                {{ Form::label('dimAppartment', 'Dimensione appartamento', ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{ Form::text('dimAppartment', '', ['class' => 'form-element','id' => 'dimAppartment','placeholder'=>"Di quanti metri quadri?"]) }}
                @if ($errors->first('dimAppartment'))
                <ul class="errors">
                    @foreach ($errors->get('dimAppartment') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>

        <div>
            <div class="text-left">
                {{ Form::label('rooms', "Numero di stanze nell'appartamento", ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{ Form::text('rooms', '', ['class' => 'form-element','id' => 'rooms','placeholder'=>"Quante stanze?"]) }}
                @if ($errors->first('rooms'))
                <ul class="errors">
                    @foreach ($errors->get('rooms') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>

        <!-- Specifico posto letto -->
        <div>
            <div class="text-left">
                {{ Form::label('dimBedroom', 'Dimensione posto letto', ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{ Form::text('dimBedroom', '', ['class' => 'form-element','id' => 'dimBedroom','placeholder'=>"Di quanti metri quadri?"]) }}
                @if ($errors->first('dimBedroom'))
                <ul class="errors">
                    @foreach ($errors->get('dimBedroom') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>

        <div>
            <div class="text-left">
                {{ Form::label('totBedRoom', "Numero di letti nel posto letto", ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{ Form::text('totBedRoom', '', ['class' => 'form-element','id' => 'totBedRoom','placeholder'=>"Quanti letti?"]) }}
                @if ($errors->first('totBedRoom'))
                <ul class="errors">
                    @foreach ($errors->get('totBedRoom') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>

        <!-- Servizi -->
        <div>
            <div class="text-left">
                {{ Form::label('service', "Servizi disponibili", ['class' => 'text-mid']) }}
            </div>
            <div id="generalServices">
                <h4 class="text-left">Generici</h4>
                @include('catalog.filter_forms.checkbox_service', ['services' => App\Models\Resources\Service::all()->where('tipology', 2), 'request' => []])
            </div>
        </div>


        <!-- Generici -->
        <div>
            <div class="text-left">
                {{ Form::label('ageMin', "Età minima consentita", ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{ Form::text('ageMin', '', ['class' => 'form-element','id' => 'ageMin','placeholder'=>"Quanti anni?"]) }}
                @if ($errors->first('ageMin'))
                <ul class="errors">
                    @foreach ($errors->get('ageMin') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>

        <div>
            <div class="text-left">
                {{ Form::label('ageMax', "Età massima consentita", ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{ Form::text('ageMax', '', ['class' => 'form-element','id' => 'ageMax','placeholder'=>"Quanti anni?"]) }}
                @if ($errors->first('ageMax'))
                <ul class="errors">
                    @foreach ($errors->get('ageMax') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>

        <div>
            <div class="text-left">
                {{ Form::label('price', "Canone d'affitto", ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{ Form::text('price', '', ['class' => 'form-element','id' => 'price','placeholder'=>"Canone mensile"]) }}
                @if ($errors->first('price'))
                <ul class="errors">
                    @foreach ($errors->get('price') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>

        <div>
            <div class="text-left">
                {{ Form::label('dateStart', "Da quando è disponibile l'alloggio?", ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{Form::date('dateStart',null, ['class'=>'form-element'])}}

                @if ($errors->first('dateStart'))
                <ul class="errors">
                    @foreach ($errors->get('dateStart') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>

        <div>
            <div class="text-left">
                {{ Form::label('dateFinish', "Fino a quando è disponibile l'alloggio?", ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{Form::date('dateFinish',null, ['class'=>'form-element'])}}

                @if ($errors->first('dateFinish'))
                <ul class="errors">
                    @foreach ($errors->get('dateFinish') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
        <div class="margin-t-small text-center">
            {{ Form::submit('AGGIUNGI', ['class' => 'tm-btn']) }}
        </div>
        {{ Form::close() }}
    </div>
</div>
@endsection