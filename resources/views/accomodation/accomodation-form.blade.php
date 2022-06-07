<?php
$services = App\Models\Resources\Service::all();

$isAppartmentSelected = false;
$isBedRoomSelected = false;

$tipologyAttributes = ['class' => 'form-element','id' => 'tipology'];

if ($accomodation) {
    $tipologyAttributes = ['class' => 'form-element','id' => 'tipology', 'disabled'];
    
    switch ($accomodation->tipology) {
        case 0:
            $isAppartmentSelected = true;
            break;
        case 1:
            $isBedRoomSelected = true;
            break;
        default:
            $isAppartmentSelected = false;
            $isBedRoomSelected = false;
    }
}
?>

{{ Form::open(array('route' => $route, 'method' => 'post', 'id' => $formId, 'files' => true)) }}

<!-- Sezione tipologia alloggio-->
@if($accomodation)

{{ Form::hidden('accId', $accomodation->accId)}}
{{ Form::hidden('tipology', $accomodation->tipology, ['id' => 'hidden_tipology'])}}

@endif

<div>
    <div class="text-left">
        {{ Form::label('tipology', 'Quale tipo di alloggio vuoi inserire?', ['class' => 'text-mid']) }}
    </div>
    <div class="margin-b-40">
        {{ Form::select(
                    'tipology',
                    [null => "Seleziona un'opzione", '0' => 'Appartamento', '1' => 'Posto letto'], 
                    $accomodation ? $accomodation->tipology : null, 
                    $tipologyAttributes,
                    [null => ['disabled' => true]]
                    )}}
    </div>
</div>


<!-- Generico -->

<!-- Nome -->
<div>
    <div class="text-left">
        {{ Form::label('name', 'Nome', ['class' => 'text-mid']) }}
    </div>
    <div class="margin-b-40">
        {{ Form::text('name', $accomodation ? $accomodation->name : '', ['class' => 'form-element', 'id' => 'name', 'placeholder'=>'Inserisci nome']) }}
    </div>
</div>

<!-- Città -->
<div>
    <div class="text-left">
        {{ Form::label('city', 'Città', ['class' => 'text-mid']) }}
    </div>
    <div class="margin-b-40">
        {{ Form::text('city', $accomodation ? $accomodation->city : '', ['class' => 'form-element', 'id' => 'city', 'placeholder'=>'Inserisci la città']) }}
    </div>
</div>
<!-- Indirizzo -->
<div>
    <div class="text-left">
        {{ Form::label('address', 'Indirizzo', ['class' => 'text-mid']) }}
    </div>
    <div class="margin-b-40">
        {{ Form::text('address', $accomodation ? $accomodation->address : '', ['class' => 'form-element', 'id' => 'address', 'placeholder'=>"Inserisci l'indirizzo"]) }}
    </div>
</div>
<!-- Immagine -->
<div>
    <div class="text-left">
        {{ Form::label('image', 'Immagine', ['class' => 'text-mid']) }}
    </div>
    @if($accomodation)
    <div class="img-catalogo pad-lr-large" >
        <img src="{{ asset('images/accomodations/'.$accomodation->image->imageName) }}" alt="Immagine" class="bord-rad-lg margin-b-20" style="width:100%"/>
    </div>
    @endif
    <div class="margin-b-40">
        {{ Form::file('image', null, ['class' => 'form-element','id' => 'image']) }}
    </div>
</div>

<!-- Descrizione -->
<div>
    <div class="text-left">
        {{ Form::label('description', "Descrizione dell'alloggio", ['class' => 'text-mid']) }}
    </div>
    <div class="margin-b-40">
        {{ Form::textarea('description', $accomodation ? $accomodation->description : '', ['class' => 'form-element','id' => 'description','placeholder'=>"Descrivi l'alloggio"]) }}
    </div>
</div>
<!-- Numero totale posti letto nell'alloggio -->
<div>
    <div class="text-left">
        {{ Form::label('totBeds', "Numero totale posti letto nell'alloggio", ['class' => 'text-mid']) }}
    </div>
    <div class="margin-b-40">
        {{ Form::text('totBeds', $accomodation ? $accomodation->totBeds : '', ['class' => 'form-element','id' => 'totBeds','placeholder'=>"Quanti posti letto?"]) }}
    </div>
</div>
<!-- Età minima -->
<div>
    <div class="text-left">
        {{ Form::label('ageMin', "Età minima consentita", ['class' => 'text-mid']) }}
    </div>
    <div class="margin-b-40">
        {{ Form::text('ageMin', $accomodation ? $accomodation->ageMin : '', ['class' => 'form-element','id' => 'ageMin','placeholder'=>"Quanti anni?"]) }}
    </div>
</div>
<!-- Età massima -->
<div>
    <div class="text-left">
        {{ Form::label('ageMax', "Età massima consentita", ['class' => 'text-mid']) }}
    </div>
    <div class="margin-b-40">
        {{ Form::text('ageMax', $accomodation ? $accomodation->ageMax : '', ['class' => 'form-element','id' => 'ageMax','placeholder'=>"Quanti anni?"]) }}
    </div>
</div>
<!-- Canone d'affitto -->
<div>
    <div class="text-left">
        {{ Form::label('price', "Canone d'affitto", ['class' => 'text-mid']) }}
    </div>
    <div class="margin-b-40">
        {{ Form::text('price', $accomodation ? $accomodation->price : '', ['class' => 'form-element','id' => 'price','placeholder'=>"Canone mensile"]) }}
    </div>
</div>
<!-- Disponibilità da -->
<div>
    <div class="text-left">
        {{ Form::label('dateStart', "Da quando è disponibile l'alloggio?", ['class' => 'text-mid']) }}
    </div>
    <div class="margin-b-40">
        {{Form::date('dateStart',$accomodation ? $accomodation->dateStart : '', ['class'=>'form-element', 'id' => 'dateStart'])}}
    </div>
</div>
<!-- Disponibilità fino a  -->
<div>
    <div class="text-left">
        {{ Form::label('dateFinish', "Fino a quando è disponibile l'alloggio?", ['class' => 'text-mid']) }}
    </div>
    <div class="margin-b-40">
        {{Form::date('dateFinish',$accomodation ? $accomodation->dateFinish : '', ['class'=>'form-element', 'id' => 'dateFinish'])}}
    </div>
</div>

<!-- Specifico appartamento -->
<div id ="appartamento" class="{{$isAppartmentSelected ? '' : 'nascondi'}}">
    <div>
        <div class="text-left">
            {{ Form::label('dimAppartment', 'Dimensione appartamento', ['class' => 'text-mid']) }}
        </div>
        <div class="margin-b-40">
            {{ Form::text('dimAppartment', $accomodation ? $accomodation->dimAppartment : '', ['class' => 'form-element','id' => 'dimAppartment','placeholder'=>"Di quanti metri quadri?"]) }}
        </div>
    </div>

    <div>
        <div class="text-left">
            {{ Form::label('rooms', "Numero di stanze nell'appartamento", ['class' => 'text-mid']) }}
        </div>
        <div class="margin-b-40">
            {{ Form::text('rooms', $accomodation ? $accomodation->rooms : '', ['class' => 'form-element','id' => 'rooms','placeholder'=>"Quante stanze?"]) }}
        </div>
    </div>
</div>

<!-- Specifico posto letto -->
<div id="postoLetto" class="{{$isBedRoomSelected ? '' : 'nascondi'}}">
    <div>
        <div class="text-left">
            {{ Form::label('dimBedroom', 'Dimensione posto letto', ['class' => 'text-mid']) }}
        </div>
        <div class="margin-b-40">
            {{ Form::text('dimBedroom', $accomodation ? $accomodation->dimBedroom : '', ['class' => 'form-element','id' => 'dimBedroom','placeholder'=>"Di quanti metri quadri?"]) }}
        </div>
    </div>

    <div>
        <div class="text-left">
            {{ Form::label('totBedRoom', "Numero di letti nel posto letto", ['class' => 'text-mid']) }}
        </div>
        <div class="margin-b-40">
            {{ Form::text('totBedRoom', $accomodation ? $accomodation->totBedRoom : '', ['class' => 'form-element','id' => 'totBedRoom','placeholder'=>"Quanti letti?"]) }}
        </div>
    </div>
</div>

<fieldset name="services" class=" border-t pad-lr-small ">
    <div class="pad-lr-small margin-t-x-small">
        <?php
        $checkedServices = collect();

        if ($accomodation) {
            $checkedServices = $accomodation->serviceIds();
        }
        ?>

        <h1>Servizi Disponibili</h1>
        <div id="generalServices">
            <h4 class="text-left">Generici</h4>
            @include('catalog.filter_forms.checkbox_service', ['services' => $services->where('tipology', 2), 'checkedServices' => $checkedServices])
        </div>
        <div id="servApp" class="{{$isAppartmentSelected ? '' : 'nascondi'}}">
            <h4 class="text-left">Appartamento</h4>
            @include('catalog.filter_forms.checkbox_service', ['services' => $services->where('tipology', 0), 'checkedServices' => $checkedServices])
        </div>
        <div id="servPostoLetto" class="{{$isBedRoomSelected ? '' : 'nascondi'}}">
            <h4 class="text-left">PostoLetto</h4>
            @include('catalog.filter_forms.checkbox_service', ['services' => $services->where('tipology', 1), 'checkedServices' => $checkedServices])
        </div>
    </div>
</fieldset>

<div class="margin-t-small text-center">
    {{ Form::submit($submitButtonText, ['class' => 'tm-btn']) }}
</div>
{{ Form::close() }}