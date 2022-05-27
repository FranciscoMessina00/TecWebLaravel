<div>
    <h4>Tipologia: 
        @switch($accomodation->tipology)
        @case(0)
            Appartamento
        @break
        @case(1)
            Posto letto
        @break
        @endswitch
    </h4>

    <h4>Indirizzo: {{$accomodation->address}}, {{$accomodation->city}}</h4>

    <h4>Canone d'affitto: {{$accomodation->price}}</h4>
</div>