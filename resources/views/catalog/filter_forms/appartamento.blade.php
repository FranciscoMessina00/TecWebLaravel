<!-- <form id="form1" class="text-center" method="get"> -->
{{ Form::open(array('route' => 'catalog.filter' , 'class' => 'contenitore-flex')) }}
    @csrf
    
    <div class="nascondi">
        <input class="form-element" type="text" name="tipo" value="1">
    </div>
    
    <div class="pad-lr-small margin-t-x-small">
        
        {{ Form::label('where', 'Dove') }}
        {{ Form::text('city', '' , ['class' => 'form-element','id' => 'where','placeholder' => 'Inserisci città']) }}
        
    </div>
    
    <div class="pad-lr-small margin-t-x-small">
        
        {{ Form::label('price', 'Prezzo') }}
        <div class="contenitore-flex">
            {{Form::number('priceMin', '' , ['class' => 'form-element','placeholder' => 'Min','id' => 'price'])}}
           
            <h3 class="auto-margin-tb">€</h3>
            <h3 class="auto-margin-tb">-</h3>
            {{Form::number('priceMax', '' , ['class' => 'form-element','placeholder' => 'Max','id' => 'price'])}}
            
            <h3 class="auto-margin-tb">€</h3>
        </div>
    </div>
    <div class="pad-lr-small margin-t-x-small">
        {{ Form::label('periodo', 'Periodo di locazione') }}
        <div class="contenitore-flex">
            {{ Form::date('dateStart','',['class' => 'form-element'],'id'=>'periodo')}}
            
            <h3 class="auto-margin-tb">-</h3>
            {{ Form::date('dateFinish','',['class' => 'form-element'],'id'=>'periodo')}}
            
        </div>
    </div>
    
    <div class="pad-lr-small margin-t-x-small">
       {{ Form::label('dimensioneA', 'Dimensione posto letto') }}
        {{Form::number('dimAppartment', '' , ['class' => 'form-element','placeholder' => 'Dimensione appartamento','id'=> 'dimensioneA'])}}
        
    </div>
    
    <div class="pad-lr-small margin-t-x-small">
        {{ Form::label('numeroA', 'Numero di camere') }}
        {{Form::number('rooms', '' , ['class' => 'form-element','placeholder' => 'Numero camere','id'=> 'numeroA'])}}
      
    </div>
    <div class="pad-lr-small margin-t-x-small">
        {{ Form::label('numeroLApp', 'Numero di posti letto') }}
        {{Form::number('totBeds', '' , ['class' => 'form-element','placeholder' => 'Numero posti letto','id'=>'numeroLApp'])}}
        
    </div>

    <div class="pad-lr-small margin-t-x-small">
        <label>
            Servizi appartamento
        </label>
        
        
        <ul class="text-left servizi">
            <li><input type="checkbox" id="servizio1" name="servizio1" value="servizio1"><label for="servizio1"> App1</label></li>
            <li><input type="checkbox" id="servizio2" name="servizio2" value="servizio2"><label for="servizio2"> App2</label></li>
            <li><input type="checkbox" id="servizio3" name="servizio3" value="servizio3"><label for="servizio3"> App3</label></li>
            <li><input type="checkbox" id="servizio4" name="servizio4" value="servizio4"><label for="servizio4"> App4</label></li>
            <li><input type="checkbox" id="servizio5" name="servizio5" value="servizio5"><label for="servizio5"> App5</label></li>
            <li><input type="checkbox" id="servizio6" name="servizio6" value="servizio6"><label for="servizio6"> App6</label></li>
            <li><input type="checkbox" id="servizio7" name="servizio7" value="servizio7"><label for="servizio7"> App7</label></li>
        </ul>
        
    </div>
    <div id='filtra1' class="margin-t-small text-center">
        {{ Form::submit('CERCA', ['class' => 'tm-btn']) }}
    </div>
    {{Form::close()}}
