@extends('layouts.public')

@section('title', 'Aggiungi alloggio')

@section('scripts')

@parent
<script type="text/javascript" src="{{ asset('Js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('Js/FormValidation.js') }}"></script>
<script>
$(function () {
    var actionUrl = "{{route('accomodation.add')}}";
    var formId = 'addAccomodation';

    $(":input").on('blur', function ()
    {
        var formElementId = $(this).attr('id');
        validateElement(formElementId, actionUrl, formId);
    });

    $("#addAccomodation").on('submit', function (event)
    {
        event.preventDefault();
        validateForm(actionUrl, formId);
    });
});
</script>

@endsection


@section('content')
<!-- inizio zona di accesso-->
<br>
<div class="margin-t-x-large margin-b-40 text-center ">
    <div class="container-small auto-margin-lr pad-lr-large">
        <h2 class="text-center margin-b-40 margin-t-small text-gold text-large">Aggiungi un alloggio</h2>
        {{ Form::open(array('route' => 'accomodation.add', 'method' => 'post', 'id' => 'addAccomodation')) }}

        <!-- Sezione tipologia alloggio-->
        <div>
            <div class="text-left">
                {{ Form::label('tipology', 'Quale tipo di alloggio vuoi inserire?', ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{ Form::select('tipology', ['0' => 'Appartamento', '1' => 'Posto letto'], null, ['class' => 'form-element','id' => 'tipology']) }}
            </div>
        </div>
        
    <!-- Generico -->

        <!-- Nome -->
        <div>
            <div class="text-left">
                {{ Form::label('name', 'Nome', ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{ Form::text('name', '', ['class' => 'form-element', 'id' => 'name', 'placeholder'=>'Inserisci nome']) }}
            </div>
        </div>
        
        <!-- Città -->
        <div>
            <div class="text-left">
                {{ Form::label('city', 'Città', ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{ Form::text('city', '', ['class' => 'form-element', 'id' => 'city', 'placeholder'=>'Inserisci la città']) }}
            </div>
        </div>
        <!-- Indirizzo -->
        <div>
            <div class="text-left">
                {{ Form::label('address', 'Indirizzo', ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{ Form::text('address', '', ['class' => 'form-element', 'id' => 'address', 'placeholder'=>"Inserisci l'indirizzo"]) }}
            </div>
        </div>
        <!-- Immagine -->
        <div>
            <div class="text-left">
                {{ Form::label('image', 'Immagine', ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{ Form::file('image', ['class' => 'form-element','id' => 'image']) }}
            </div>
        </div>
        <!-- Descrizione -->
        <div>
            <div class="text-left">
                {{ Form::label('description', "Descrizione dell'alloggio", ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{ Form::textarea('description', '', ['class' => 'form-element','id' => 'description','placeholder'=>"Descrivi l'alloggio"]) }}
            </div>
        </div>
        <!-- Numero totale posti letto nell'alloggio -->
        <div>
            <div class="text-left">
                {{ Form::label('totBeds', "Numero totale posti letto nell'alloggio", ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{ Form::text('totBeds', '', ['class' => 'form-element','id' => 'totBeds','placeholder'=>"Quanti posti letto?"]) }}
            </div>
        </div>
        <!-- Età minima -->
        <div>
            <div class="text-left">
                {{ Form::label('ageMin', "Età minima consentita", ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{ Form::text('ageMin', '', ['class' => 'form-element','id' => 'ageMin','placeholder'=>"Quanti anni?"]) }}
            </div>
        </div>
        <!-- Età massima -->
        <div>
            <div class="text-left">
                {{ Form::label('ageMax', "Età massima consentita", ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{ Form::text('ageMax', '', ['class' => 'form-element','id' => 'ageMax','placeholder'=>"Quanti anni?"]) }}
            </div>
        </div>
        <!-- Canone d'affitto -->
        <div>
            <div class="text-left">
                {{ Form::label('price', "Canone d'affitto", ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{ Form::text('price', '', ['class' => 'form-element','id' => 'price','placeholder'=>"Canone mensile"]) }}
            </div>
        </div>
        <!-- Disponibilità da -->
        <div>
            <div class="text-left">
                {{ Form::label('dateStart', "Da quando è disponibile l'alloggio?", ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{Form::date('dateStart',null, ['class'=>'form-element', 'id' => 'dateStart'])}}
            </div>
        </div>
        <!-- Disponibilità fino a  -->
        <div>
            <div class="text-left">
                {{ Form::label('dateFinish', "Fino a quando è disponibile l'alloggio?", ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{Form::date('dateFinish',null, ['class'=>'form-element', 'id' => 'dateFinish'])}}
            </div>
        </div>

    <!-- Specifico appartamento -->
        <div>
            <div class="text-left">
                {{ Form::label('dimAppartment', 'Dimensione appartamento', ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{ Form::text('dimAppartment', '', ['class' => 'form-element','id' => 'dimAppartment','placeholder'=>"Di quanti metri quadri?"]) }}
            </div>
        </div>

        <div>
            <div class="text-left">
                {{ Form::label('rooms', "Numero di stanze nell'appartamento", ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{ Form::text('rooms', '', ['class' => 'form-element','id' => 'rooms','placeholder'=>"Quante stanze?"]) }}
            </div>
        </div>

    <!-- Specifico posto letto -->
        <div>
            <div class="text-left">
                {{ Form::label('dimBedroom', 'Dimensione posto letto', ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{ Form::text('dimBedroom', '', ['class' => 'form-element','id' => 'dimBedroom','placeholder'=>"Di quanti metri quadri?"]) }}
            </div>
        </div>

        <div>
            <div class="text-left">
                {{ Form::label('totBedRoom', "Numero di letti nel posto letto", ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{ Form::text('totBedRoom', '', ['class' => 'form-element','id' => 'totBedRoom','placeholder'=>"Quanti letti?"]) }}
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


        <div class="margin-t-small text-center">
            {{ Form::submit('AGGIUNGI', ['class' => 'tm-btn']) }}
        </div>
        {{ Form::close() }}
    </div>
</div>
@endsection