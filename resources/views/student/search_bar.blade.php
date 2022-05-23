     
<!--        Fine zona filtri-->
<div class="text-center margin-t-small-neg container-mid auto-margin-lr">
    <form class="contenitore-flex" action="{{ route('catalog')}}">
                <div class="pad-lr-small border-r">
                    <h2>Dove</h2>
                    <input type="text" id="dove" class="form-element">
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
                        <option value="none" disabled selected>Tipologia</option>
                        <option value="appartamento">Appartamento</option>
                        <option value="postoLetto">Posto letto</option>
                    </select>
                </div>
                <br>
                <div class="margin-t-small text-center auto-margin-tb">
                    <input class="tm-btn" type="submit" value="CERCA">
                </div>
            </form>
        </div>