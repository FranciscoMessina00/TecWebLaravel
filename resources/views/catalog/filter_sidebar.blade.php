<!--        Inizio zona filtri-->
<div class="margin-lr barra-filtri pad-lr-small">
    <h1 class="text-center text-gold ">Filtri</h1>
    <div class="pad-tb-x-small pad-lr-small margin-t-x-small border-t text-center">
        <label for="tipo">
            Tipologia
        </label>
        <select id="tipo" name="tipo" class="form-element" onchange="cambioForm('tipo')">
            <option value="none" disabled selected>Seleziona un'opzione</option>
            <option value="appartamento">Appartamento</option>
            <option value="postoLetto">Posto letto</option>
        </select>
    </div>

    <div id='appartamento'>
        @include('catalog.filter_forms.appartamento')
    </div>

    <div id='postoLetto'>
        @include('catalog.filter_forms.posto_letto')
    </div>
</div>
<!--        Fine zona filtri-->