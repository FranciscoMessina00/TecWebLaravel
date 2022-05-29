<?php
    $services = App\Models\Resources\Service::where('tipology', 0)->get();
?>

{{ Form::open(array('route' => 'catalog.filter' , 'class' => 'text-center', 'method' => 'get')) }}
    @csrf
    {{ Form::hidden('tipology', '0') }}
    
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
    
    <div class="pad-lr-small margin-t-x-small">
       {{ Form::label('dimensioneA', 'Dimensione appartamento') }}
        {{Form::number('dimAppartment', $request ? $request->dimAppartment : '' , ['class' => 'form-element','placeholder' => 'Dimensione appartamento','id'=> 'dimensioneA'])}}
        
    </div>
    
    <div class="pad-lr-small margin-t-x-small">
        {{ Form::label('numeroA', "Numero totale camere nell'appartamento") }}
        {{Form::number('rooms', $request ? $request->rooms : '' , ['class' => 'form-element','placeholder' => 'Numero camere','id'=> 'numeroA'])}}
      
    </div>

    <div class="pad-lr-small margin-t-x-small">
        <h1>Servizi Disponibili</h1>
        
        <ul>
            
            @foreach($services as $service)
                <?php
                    $checked = false;

                    if($request)
                    {
                        $serviceIds = collect($request->input('services'));

                        $checked = $serviceIds->contains($service->serviceId);
                    }
                ?>
            
                {{Form::checkbox('services[]', $service->serviceId, $checked, ['id' => $service->name])}}
                {{ Form::label($service->name, $service->name) }}
            @endforeach
        </ul>
        
    </div>
    <div id='filtra1' class="margin-t-small text-center">
        {{ Form::submit('CERCA', ['class' => 'tm-btn']) }}
    </div>
{{Form::close()}}
