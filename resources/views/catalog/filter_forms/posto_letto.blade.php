<!--<form id="form2" class="text-center" method="get"> -->
    {{ Form::open(array('route' => 'catalog.filter' , 'class' => 'contenitore-flex')) }}
    @csrf
    <div class="nascondi">
        <input class="form-element" type="text" name="tipo" value="2">
    </div>
    
    <div class="pad-lr-small margin-t-x-small">
        {{ Form::label('where', 'Dove') }}
        {{ Form::text('city', '' , ['class' => 'form-element','id' => 'where','placeholder' => 'Inserisci città']) }}

    </div>
    <div class="pad-lr-small margin-t-x-small">
       
         {{ Form::label('price', 'Prezzo') }}
        <div class="contenitore-flex">
            {{Form::number('price', '' , ['class' => 'form-element','placeholder' => 'Min','id' => 'price'])}}
   
            <h3 class="auto-margin-tb">€</h3>
            <h3 class="auto-margin-tb">-</h3>
            {{Form::number('price', '' , ['class' => 'form-element'.'placeholder' => 'Max','id' => 'price'])}}
           
            <h3 class="auto-margin-tb">€</h3>
        </div>
    </div>
    <div class="pad-lr-small margin-t-x-small">
       
        {{ Form::label('periodo', 'Periodo di locazione') }}
        <div class="contenitore-flex">
             {{ Form::date('dateStart','',['class' => 'form-element'],'id'=>'periodo')}}
          
            <h3 class="auto-margin-tb">-</h3>
             {{ Form::date('dateStart','',['class' => 'form-element','id'=>'periodo'])}}
         
        </div>
    </div>
    <div class="pad-lr-small margin-t-x-small">
       
        {{ Form::label('dimensione', 'Dimensione posto letto') }}
        {{Form::number('dimBedroom', '' , ['class' => 'form-element','placeholder' => 'Dimensione posto letto'],'id'=> 'dimensione')}}
       
    </div>
    <div class="pad-lr-small margin-t-x-small">
 
        {{ Form::label('numero', 'Numero di camere') }}
        {{Form::number('rooms', '' , ['class' => 'form-element','placeholder' => 'Numero letti nella camera'],'id'=> 'numero')}}
        
    </div>
    <div class="pad-lr-small margin-t-x-small">
        
        {{ Form::label('numeroL', 'Numero di posti letto') }}
        {{Form::number('totBedRoom', '' , ['class' => 'form-element','placeholder' => 'Numero posti letto alloggio'],'id'=> 'numeroL')}}
       
    </div>
    <div class="pad-lr-small margin-t-x-small">
        <label>
            Servizi posto letto
        </label>
        
        <ul class="text-left servizi">
            <li><input type="checkbox" id="servizio8" name="servizio1" value="servizio1"><label for="servizio8"> Pl1</label></li>
            <li><input type="checkbox" id="servizio9" name="servizio2" value="servizio2"><label for="servizio9"> Pl2</label></li>
            <li><input type="checkbox" id="servizio10" name="servizio3" value="servizio3"><label for="servizio10"> Pl3</label></li>
            <li><input type="checkbox" id="servizio11" name="servizio4" value="servizio4"><label for="servizio11"> Pl4</label></li>
            <li><input type="checkbox" id="servizio12" name="servizio5" value="servizio5"><label for="servizio12"> Pl5</label></li>
            <li><input type="checkbox" id="servizio13" name="servizio6" value="servizio6"><label for="servizio13"> Pl6</label></li>
            <li><input type="checkbox" id="servizio14" name="servizio7" value="servizio7"><label for="servizio14"> Pl7</label></li>
        </ul>
    </div>
    <div id='filtra2' class="margin-t-small text-center">
        {{ Form::submit('CERCA', ['class' => 'tm-btn']) }}
    </div>
{{Form::close()}}