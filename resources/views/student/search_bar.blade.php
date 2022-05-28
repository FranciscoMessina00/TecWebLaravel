     
<!--        Fine zona filtri-->
<div class="text-center margin-t-small-neg container-mid auto-margin-lr">

    {{ Form::open(array('route' => 'catalog.filter' , 'class' => 'contenitore-flex', 'method' => 'get')) }}
    @csrf
    <div class="pad-lr-small border-r">
        <h2>Dove</h2>
        {{ Form::text('city', '' , ['class' => 'form-element','id' => 'where','placeholder' => 'Inserisci città']) }}

    </div>
    <div class="pad-lr-small border-r">
        <h2>Quando</h2>

        <div class="contenitore-flex">
            {{ Form::date('dateStart','',['class' => 'form-element'])}}


            <h2 class="auto-margin-tb">-</h2>
            {{ Form::date('dateFinish','',['class' => 'form-element'])}}


        </div>
    </div>
    <div class="pad-lr-small border-r">
        <h2>
            Tipologia
        </h2>
        {{ Form::select('tipology', ['0' => 'Appartamento', '1' => 'Posto letto'], '',['class' => 'form-element'])}}


    </div>

    <br>

    <div class="margin-t-small text-center auto-margin-tb">
        {{ Form::submit('CERCA', ['class' => 'tm-btn']) }}

    </div>
    {{Form::close()}}
</div>