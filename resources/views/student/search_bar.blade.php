<!--        Inizio zona filtri-->
<!-- comment 
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
 -->
<!--        Fine zona filtri-->


                    
<form class="contenitore-flex" style="margin-left: 200px;margin-bottom: 0px;margin-top: 30px;">
    
                       <div class="pad-lr-small border-r">

                            <h2>
                                Dove
                            </h2>
                            <select id="tipo" name="tipo" class="form-element">
                                <option value="c1" selected>Milano</option>
                                <option value="c2">Roma</option>
                                <option value="c3">Torino</option>
                                <option value="c4">Ancona</option>
                                <option value="c5">Venezia</option>
                                <option value="c6">Bologna</option>
                            </select>
                        </div>
                        <div class="pad-lr-small border-r">
                            <h2>Quando</h2>
                            <div class="contenitore-flex">
                                <input type="date" id="min" class="form-element">
                                <h2 class="auto-margin-tb">-</h2>
                                <input type="date" id="max" class="form-element">
                            </div>
                        </div>
                        <div class="pad-lr-small border-r">

                            <h2>
                                Tipologia
                            </h2>
                            <select id="tipo" name="tipo" class="form-element">
                                <option value="none" selected>Entrambi</option>
                                <option value="appartamento">Appartamento</option>
                                <option value="postoLetto">Posto letto</option>
                            </select>
                        </div>
                        <br>
                        <div class="margin-t-small text-center auto-margin-tb">
                             <a href="{{ route('catalogstudent')}}" class="tm-btn text-black"><strong>Cerca</strong></a>  
                        </div>
                    </form>
                    
      