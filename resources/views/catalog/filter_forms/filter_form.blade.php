<?php
$services = App\Models\Resources\Service::all();
?>

{{ Form::open(array('route' => 'catalog.filter' , 'class' => 'text-center', 'method' => 'get', 'id' => 'prova')) }}
@csrf

<fieldset name="generic" class=" border-t pad-lr-small margin-b-30">
    <h1>Informazioni alloggio</h1>
    
    <div class="pad-lr-small margin-t-x-small">

        <label for="tipo">
            Tipologia
        </label>
        <!-- La select attiva una funzione JavaScript -->
        <select id="tipology" name="tipology" class="form-element">
            <option value="none" disabled selected>Seleziona un'opzione</option>
            <option value="0" id="appartment" {{$isAppartmentSelected ? 'selected' : ''}}>Appartamento</option>
            <option value="1" id="bed_room" {{$isBedRoomSelected ? 'selected' : ''}}>Posto letto</option>
            <option value="2" id="both" {{$isAppartmentSelected && $isBedRoomSelected ? 'selected' : ''}}>Entrambi</option>
        </select>
        @if ($errors->first('tipology'))
        <ul class="errors">
            @foreach ($errors->get('tipology') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif

    </div>

    <div class="pad-lr-small margin-t-x-small">

        {{ Form::label('where', 'Dove') }}
        {{ Form::text('city', $request ? $request->city : '' , ['class' => 'form-element','id' => 'where','placeholder' => 'Inserisci città']) }}
        @if ($errors->first('city'))
        <ul class="errors">
            @foreach ($errors->get('city') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif

    </div>

    <div class="pad-lr-small margin-t-x-small">

        {{ Form::label('price', 'Prezzo') }}
        <div class="contenitore-flex">
            {{Form::number('priceMin', $request ? $request->priceMin : '' , ['class' => 'form-element','placeholder' => 'Min','id' => 'price'])}}
            @if ($errors->first('priceMin'))
            <ul class="errors">
                @foreach ($errors->get('priceMin') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif

            <h3 class="auto-margin-tb">€</h3>
            <h3 class="auto-margin-tb">-</h3>
            {{Form::number('priceMax', $request ? $request->priceMax : '' , ['class' => 'form-element','placeholder' => 'Max','id' => 'price'])}}
            @if ($errors->first('priceMax'))
            <ul class="errors">
                @foreach ($errors->get('priceMax') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif

            <h3 class="auto-margin-tb">€</h3>
        </div>
    </div>
    <div class="pad-lr-small margin-t-x-small">
        {{ Form::label('periodo', 'Periodo di locazione') }}
        <div class="contenitore-flex">
            {{ Form::date('dateStart', $request ? $request->dateStart : '', ['class' => 'form-element','id'=>'periodo'])}}
            @if ($errors->first('dateStart'))
            <ul class="errors">
                @foreach ($errors->get('dateStart') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif

            <h3 class="auto-margin-tb">-</h3>
            {{ Form::date('dateFinish', $request ? $request->dateFinish : '',['class' => 'form-element','id'=>'periodo'])}}
            @if ($errors->first('dateFinish'))
            <ul class="errors">
                @foreach ($errors->get('dateFinish') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif

        </div>
    </div>
    <div class="pad-lr-small margin-t-x-small">
        {{ Form::label('numeroLApp', "Numero totale posti letto nell'alloggio") }}
        {{Form::number('totBeds', $request ? $request->totBeds : '' , ['class' => 'form-element','placeholder' => 'Numero posti letto','id'=>'numeroLApp'])}}
        @if ($errors->first('totBeds'))
        <ul class="errors">
            @foreach ($errors->get('totBeds') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif

    </div>

    <div id ="appartamento" class="{{$isAppartmentSelected ? '' : 'nascondi'}}">
        <div class="pad-lr-small margin-t-x-small">
            {{ Form::label('dimensioneA', 'Dimensione appartamento') }}
            {{Form::number('dimAppartment', $request ? $request->dimAppartment : '' , ['class' => 'form-element','placeholder' => 'Dimensione appartamento','id'=> 'dimensioneA'])}}
            @if ($errors->first('dimAppartment'))
            <ul class="errors">
                @foreach ($errors->get('dimAppartment') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif

        </div>

        <div class="pad-lr-small margin-t-x-small">
            {{ Form::label('numeroA', "Numero totale camere nell'appartamento") }}
            {{Form::number('rooms', $request ? $request->rooms : '' , ['class' => 'form-element','placeholder' => 'Numero camere','id'=> 'numeroA'])}}
            @if ($errors->first('rooms'))
            <ul class="errors">
                @foreach ($errors->get('rooms') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif

        </div>
    </div>

    <div id="postoLetto" class="{{$isBedRoomSelected ? '' : 'nascondi'}}">
        <div class="pad-lr-small margin-t-x-small">
            {{ Form::label('dimensione', 'Dimensione camera del posto letto') }}
            {{Form::number('dimBedroom', $request ? $request->dimBedroom : '' , ['class' => 'form-element','placeholder' => 'Dimensione camera','id'=> 'dimensione'])}}
            @if ($errors->first('dimBedroom'))
            <ul class="errors">
                @foreach ($errors->get('dimBedroom') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif

        </div>
        <div class="pad-lr-small margin-t-x-small">
            {{ Form::label('numeroL', 'Numero di letti nella camera') }}
            {{Form::number('totBedRoom', $request ? $request->totBedRoom : '' , ['class' => 'form-element','placeholder' => 'Numero letti','id'=> 'numeroL'])}}
            @if ($errors->first('totBedRoom'))
            <ul class="errors">
                @foreach ($errors->get('totBedRoom') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>
</fieldset>

<fieldset name="services" class=" border-t pad-lr-small ">
    <div class="pad-lr-small margin-t-x-small">
        <?php
            $checkedServices = collect();
            
            if($request)
            {
                $checkedServices = collect($request->input('services'));
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

<div id='filtra1' class="margin-t-small text-center">
    {{ Form::submit('CERCA', ['class' => 'tm-btn']) }}
</div>
{{Form::close()}}