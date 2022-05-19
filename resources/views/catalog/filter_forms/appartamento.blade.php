<form id="form1" class="text-center" method="get">
    <div class="nascondi">
        <input class="form-element" type="text" name="tipo" value="1">
    </div>
    <div class="pad-lr-small margin-t-x-small">
        <label for="dove1">Dove</label>
        <input class="form-element" type="text" id="dove1" name="dove" placeholder="Dove">
    </div>
    <div class="pad-lr-small margin-t-x-small">
        <label>Prezzo</label>
        <div class="contenitore-flex">
            <input class="form-element" type="number" id="prezzo-min1" name="prezzoMin" placeholder="Min">
            <h3 class="auto-margin-tb">€</h3>
            <h3 class="auto-margin-tb">-</h3>
            <input class="form-element" type="number" id="prezzo-max1" name="prezzoMax" placeholder="Max"><h3 class="auto-margin-tb">€</h3>
        </div>
    </div>
    <div class="pad-lr-small margin-t-x-small">
        <label>Periodo di locazione</label>
        <div class="contenitore-flex">
            <input class="form-element" type="date" name="dataMin" id="data-min1">
            <h3 class="auto-margin-tb">-</h3>
            <input class="form-element" type="date" name="dataMax" id="data-max1">
        </div>
    </div>
    <div class="pad-lr-small margin-t-x-small">
        <label for="dimApp">Dimensione appartamento</label>
        <input class="form-element" type="number" id="dimApp" name="dimApp" placeholder="Dimensione appartamento">
    </div>
    <div class="pad-lr-small margin-t-x-small">
        <label for="numCamere">Numero di camere</label>
        <input class="form-element" type="number" id="numCamere" name="numCamere" placeholder="Numero camere">
    </div>
    <div class="pad-lr-small margin-t-x-small">
        <label for="numLetti">Numero di posti letto</label>
        <input class="form-element" type="number" id="numLetti" name="numLetti" placeholder="Numero posti letto">
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
        <input class="tm-btn" type="submit" value="Filtra">
    </div>
</form>