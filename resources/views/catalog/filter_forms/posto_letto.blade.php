<?php
    $services = App\Models\Resources\Service::where('tipology', 1)->get();
?>

    {{ Form::open(array('route' => 'catalog.filter' , 'class' => 'text-center', 'method' => 'get')) }}
    @csrf
    {{ Form::hidden('tipology', '1') }}
    
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
             {{ Form::date('dateStart',$request ? $request->dateStart : '',['class' => 'form-element','id'=>'periodo'])}}
          
            <h3 class="auto-margin-tb">-</h3>
             {{ Form::date('dateFinish',$request ? $request->dateFinish : '',['class' => 'form-element','id'=>'periodo'])}}
         
        </div>
    </div>
    <div class="pad-lr-small margin-t-x-small">
 
        {{ Form::label('numero', "Numero totale posti letto nell'alloggio") }}
        {{Form::number('totBeds', $request ? $request->totBeds : '' , ['class' => 'form-element','placeholder' => 'Numero posti letto','id'=> 'numero'])}}
        
    </div>
    <div class="pad-lr-small margin-t-x-small">
       
        {{ Form::label('dimensione', 'Dimensione camera') }}
        {{Form::number('dimBedroom', $request ? $request->dimBedroom : '' , ['class' => 'form-element','placeholder' => 'Dimensione camera','id'=> 'dimensione'])}}
       
    </div>
    <div class="pad-lr-small margin-t-x-small">
        
        {{ Form::label('numeroL', 'Numero di letti nella camera') }}
        {{Form::number('totBedRoom', $request ? $request->totBedRoom : '' , ['class' => 'form-element','placeholder' => 'Numero letti','id'=> 'numeroL'])}}
       
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
    <div id='filtra2' class="margin-t-small text-center">
        {{ Form::submit('CERCA', ['class' => 'tm-btn']) }}
    </div>
{{Form::close()}}