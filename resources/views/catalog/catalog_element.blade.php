<div class="contenitore-flex pad-tb-small pad-lr-small">
    <div class="img-catalogo pad-r-large">
        <img src="{{ asset('images/Salotto catalogo.png') }}" alt="Immagine" class="bord-rad-lg" style="width:100%"/>
    </div>
    <div>
        <h2 class='margin-b-15 text-center'>{{$accomodation->name}}</h2>

        <div>
            <h4>Richieste: {{$accomodation->requests}}</h4>
        </div>
        <br><br>
        <div>
            <h4>Dettagli:</h4>
            <br><br>
            <ul class="servizi">
                <li>Servizio 1</li>
                <li>Servizio 2</li>
                <li>Servizio 3</li>
                <li>Servizio 4</li>
                <li>Servizio 5</li>
                <li>Servizio 6</li>
                <li>Servizio 7</li>
                <li>Servizio 8</li>
                <li>Servizio 9</li>
                <li>Servizio 10</li>
            </ul>
        </div>

    </div>
</div>
