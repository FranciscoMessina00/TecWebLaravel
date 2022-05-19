<form id="form2" class="text-center" method="get">
    <div class="nascondi">
        <input class="form-element" type="text" name="tipo" value="2">
    </div>
    <div class="pad-lr-small margin-t-x-small">
        <label for="dove2">Dove</label>
        <input class="form-element" type="text" id="dove2" name="dove" placeholder="Dove">
    </div>
    <div class="pad-lr-small margin-t-x-small">
        <label for="dove2">Prezzo</label>
        <div class="contenitore-flex">
            <input class="form-element" type="number" id="prezzo-min2" name="prezzoMin" placeholder="Min">
            <h3 class="auto-margin-tb">€</h3>
            <h3 class="auto-margin-tb">-</h3>
            <input class="form-element" type="number" id="prezzo-max2" name="prezzoMax" placeholder="Max"><h3 class="auto-margin-tb">€</h3>
        </div>
    </div>
    <div class="pad-lr-small margin-t-x-small">
        <label>Periodo di locazione</label>
        <div class="contenitore-flex">
            <input class="form-element" type="date" name="dataMin" id="data-min2">
            <h3 class="auto-margin-tb">-</h3>
            <input class="form-element" type="date" name="dataMax" id="data-max2">
        </div>
    </div>
    <div class="pad-lr-small margin-t-x-small">
        <label for="dimPl">Dimensione posto letto</label>
        <input class="form-element" type="number" id="dimPl" name="dimPl" placeholder="Dimensione posto letto">
    </div>
    <div class="pad-lr-small margin-t-x-small">
        <label for="numCamere">Numero di letti nella camera</label>
        <input class="form-element" type="number" id="numLettiCam" name="numLettiCam" placeholder="Numero letti nella camera">
    </div>
    <div class="pad-lr-small margin-t-x-small">
        <label for="numLetti">Numero di posti letto nell'alloggio</label>
        <input class="form-element" type="number" id="numLettiAll" name="numLettiAll" placeholder="Numero posti letto alloggio">
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
        <input class="tm-btn" type="submit" value="Filtra">
    </div>
</form>