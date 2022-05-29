<?php
$commonServices = App\Models\Resources\Service::where('tipology', 2)->get();
$appServices = App\Models\Resources\Service::where('tipology', 0)->get();
$bedServices = App\Models\Resources\Service::where('tipology', 1)->get();
?>

{{ Form::open(array('route' => 'catalog.filter' , 'class' => 'text-center', 'method' => 'get', 'id' => 'prova')) }}
@csrf

<div class="pad-lr-small margin-t-x-small">

    <label for="tipo">
        Tipologia
    </label>
    <select id="tipo" name="tipology" class="form-element" onchange="cambioForm('tipo')">
        <option value="none" disabled selected>Seleziona un'opzione</option>
        <option value="0" id="appartment" {{$isAppartmentSelected ? 'selected' : ''}}>Appartamento</option>
        <option value="1" id="bed_room" {{$isBedRoomSelected ? 'selected' : ''}}>Posto letto</option>
        <option value="2" id="both" {{$isAppartmentSelected && $isBedRoomSelected ? 'selected' : ''}}>Entrambi</option>
    </select>

</div>

<div class="pad-lr-small margin-t-x-small">

    {{ Form::label('where', 'Dove') }}
    {{ Form::text('city', $request ? $request->city : '' , ['class' => 'form-element','id' => 'where','placeholder' => 'Inserisci città']) }}

</div>

<div class="pad-lr-small margin-t-x-small">

    {{ Form::label('price', 'Prezzo') }}
    <div class="contenitore-flex">
        {{Form::number('priceMin', $request ? $request->priceMin : '' , ['class' => 'form-element','placeholder' => 'Min','id' => 'price'])}}

        <h3 class="auto-margin-tb">€</h3>
        <h3 class="auto-margin-tb">-</h3>
        {{Form::number('priceMax', $request ? $request->priceMax : '' , ['class' => 'form-element','placeholder' => 'Max','id' => 'price'])}}

        <h3 class="auto-margin-tb">€</h3>
    </div>
</div>
<div class="pad-lr-small margin-t-x-small">
    {{ Form::label('periodo', 'Periodo di locazione') }}
    <div class="contenitore-flex">
        {{ Form::date('dateStart', $request ? $request->dateStart : '', ['class' => 'form-element','id'=>'periodo'])}}

        <h3 class="auto-margin-tb">-</h3>
        {{ Form::date('dateFinish', $request ? $request->dateFinish : '',['class' => 'form-element','id'=>'periodo'])}}

    </div>
</div>
<div class="pad-lr-small margin-t-x-small">
    {{ Form::label('numeroLApp', "Numero totale posti letto nell'alloggio") }}
    {{Form::number('totBeds', $request ? $request->totBeds : '' , ['class' => 'form-element','placeholder' => 'Numero posti letto','id'=>'numeroLApp'])}}

</div>

<div id ="appartamento" class="{{$isAppartmentSelected ? '' : 'nascondi'}}">
    <fieldset name = "appartmento">
        <div class="pad-lr-small margin-t-x-small">
            {{ Form::label('dimensioneA', 'Dimensione appartamento') }}
            {{Form::number('dimAppartment', $request ? $request->dimAppartment : '' , ['class' => 'form-element','placeholder' => 'Dimensione appartamento','id'=> 'dimensioneA'])}}

        </div>

        <div class="pad-lr-small margin-t-x-small">
            {{ Form::label('numeroA', "Numero totale camere nell'appartamento") }}
            {{Form::number('rooms', $request ? $request->rooms : '' , ['class' => 'form-element','placeholder' => 'Numero camere','id'=> 'numeroA'])}}

        </div>
    </fieldset>
</div>

<div id="postoLetto" class="{{$isBedRoomSelected ? '' : 'nascondi'}}">

    <fieldset name="postoLetto">
        <div class="pad-lr-small margin-t-x-small">

            {{ Form::label('dimensione', 'Dimensione camera') }}
            {{Form::number('dimBedroom', $request ? $request->dimBedroom : '' , ['class' => 'form-element','placeholder' => 'Dimensione camera','id'=> 'dimensione'])}}

        </div>
        <div class="pad-lr-small margin-t-x-small">

            {{ Form::label('numeroL', 'Numero di letti nella camera') }}
            {{Form::number('totBedRoom', $request ? $request->totBedRoom : '' , ['class' => 'form-element','placeholder' => 'Numero letti','id'=> 'numeroL'])}}

        </div>
    </fieldset>
</div>

<div class="pad-lr-small margin-t-x-small">
    <h1>Servizi Disponibili</h1>
    <div id="generalServices">
        <ul>
            @foreach($commonServices as $service)
            <?php
            $checked = false;

            if ($request) {
                $serviceIds = collect($request->input('services'));

                $checked = $serviceIds->contains($service->serviceId);
            }
            ?>
            {{Form::checkbox('services[]', $service->serviceId, $checked, ['id' => $service->name])}}
            {{ Form::label($service->name, $service->name) }}
            @endforeach
        </ul>
    </div>
    <div id="servApp" class="{{$isAppartmentSelected ? '' : 'nascondi'}}">
        <ul>
            @foreach($appServices as $service)
            <?php
            $checked = false;

            if ($request) {
                $serviceIds = collect($request->input('services'));

                $checked = $serviceIds->contains($service->serviceId);
            }
            ?>
            {{Form::checkbox('services[]', $service->serviceId, $checked, ['id' => $service->name])}}
            {{ Form::label($service->name, $service->name) }}
            @endforeach
        </ul>
    </div>
    <div id="servPostoLetto" class="{{$isBedRoomSelected ? '' : 'nascondi'}}">
        <ul>
            @foreach($bedServices as $service)
            <?php
            $checked = false;

            if ($request) {
                $serviceIds = collect($request->input('services'));

                $checked = $serviceIds->contains($service->serviceId);
            }
            ?>
            {{Form::checkbox('services[]', $service->serviceId, $checked, ['id' => $service->name])}}
            {{ Form::label($service->name, $service->name) }}
            @endforeach
        </ul>
    </div>

</div>
<div id='filtra1' class="margin-t-small text-center">
    {{ Form::submit('CERCA', ['class' => 'tm-btn']) }}
</div>
{{Form::close()}}