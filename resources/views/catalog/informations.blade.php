<div>
    <h4>Tipologia</h4>
    <br>
    <ul class="servizi">
        @switch($accomodation->tipology)
        @case(0)
        <li class="servizi">Appartamento</li>
        @break
        @case(1)
        <li class="servizi">Posto letto</li>
        @break

        @endswitch
    </ul>
    <br><br>

    <h4>Posizione</h4>
    <br>
    <ul class="servizi">
        <li>Indirizzo: {{$accomodation->address}}</li>
        <li>Città: {{$accomodation->city}}</li>
    </ul>
    <br><br>

    <h4>Prezzi</h4>
    <br>
    <ul class="servizi">
        <li>Canone d'affito: {{$accomodation->price}}&#8364/mese</li>
    </ul>
    <br><br>

    <h4>Disponibilità</h4>
    <br>
    <ul class="servizi">
        <li>Dal: {{date('d-m-Y', strtotime($accomodation->dateStart()))}}</li>
        <li>Al: {{date('d-m-Y', strtotime($accomodation->dateFinish()))}}</li>
    </ul>
    <br><br>
</div>