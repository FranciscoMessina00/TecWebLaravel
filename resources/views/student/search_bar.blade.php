<!--        Inizio zona filtri-->
<div class="tm-rectangle1">
   <div class="pad-lr-small margin-t-x-small">
        <label for="dove1">Dove</label>
        <input class="form-element" type="text" id="dove1" name="dove" placeholder="Dove">
    </div>
       
       <div class="pad-lr-small margin-t-x-small">
                            <label>Quando</label>
                            <div class="contenitore-flex">
                                <input class="form-element" type="date" name="dataMin" id="data-min1">
                                <h3 class="auto-margin-tb">-</h3>
                                <input class="form-element" type="date" name="dataMax" id="data-max1">
                            </div>
                        </div>
    
       <div class="pad-tb-x-small pad-lr-small margin-t-x-small text-center">
                    <label for="tipo">
                        Tipologia
                    </label>
                    <select id="tipo" name="tipo" class="form-element" onchange="cambioForm('tipo')">
                        <option value="none" disabled selected>Seleziona un'opzione</option>
                        <option value="appartamento">Appartamento</option>
                        <option value="postoLetto">Posto letto</option>
                    </select>
                </div>
       
       <div id='filtra2' class="margin-t-small text-center">
                            <a href="{{ route('catalogstudent')}}" class="tm-btn text-black"><strong>Cerca</strong></a>   
                        </div>
</div>     
<!--        Fine zona filtri-->