@extends('layouts.public')

@section('title', 'Homepage')

@section('content')
<div id='content'>
    <div class="tm-home-img-container">
        <img src="../files/Salotto.png" alt="Immagine di un salotto" style="display: none">
    </div>

    @can('show-search-bar')
        @include('student.search_bar')
    @else
        @include('catalog.catalog_button')
    @endcan
    
    

    <div class="text-center text-white margin-t-mid">
        <h1 class="text-x-large">
            ALLOGGI PI&Ugrave; RICHIESTI
        </h1>
    </div>
    <center>
        <div class="contenitore-flex">

            @foreach($accomodations as $accomodation)
            <div class="colonna text-center sfondo-marrone text-white">
                <!-- Rappresentazione offerta in homepage-->
                @include('catalog.catalog_element')
            </div>
            @endforeach
        </div>
    </center>

    <div class="text-center margin-t-small">
        <a href="{{route('catalog')}}" class="tm-btn text-black"><strong>SEE MORE</strong></a>
    </div>

    <div class="text-center text-white margin-t-mid">
        <h1 class="text-x-large">
            TOP LOCAZIONI
        </h1>
    </div>

    <center>
        <div class="contenitore-flex margin-b-40">
            <div class="colonna text-center sfondo-grigio text-white">
                <h2 class="margin-t-x-small"><strong>Città 1</strong></h2>
            </div>
            <div class="colonna text-center sfondo-grigio text-white">
                <h2 class="margin-t-x-small"><strong>Città 2</strong></h2>
            </div>
            <div class="colonna text-center sfondo-grigio text-white">
                <h2 class="margin-t-x-small"><strong>Città 3</strong></h2>
            </div>
        </div>
    </center>

    <div class="contenitore-flex">
        <div class="fill display-img" style="width:50%">
            <img src="{{ asset('images/Lavoro di gruppo.png') }}" alt="Immagine" style="width:100%"/>
        </div>
        <div class="text-center sfondo-grigio-chiaro">
            <article>
                <h1 class="margin-t-mid text-x-large"><strong>ABOUT US</strong></h1>
                <p class="paragrafo-grande">
                    FLAK è il mercato con la più ampia selezione di appartamenti in Italia.
                    FLAK combina prezzo, destinazione, date e servizi per trovare la sistemazione perfetta 
                    per qualsiasi studente. Fondata nel 2022, FLAK gestisce siti Web locali 
                    in tutte le città d'Italia.
                </p>
            </article>
        </div>
    </div>
    <div class="contenitore-flex">
        <div class="text-center sfondo-marrone-chiaro">
            <article>
                <h1 class="margin-t-mid text-x-large"><strong>OUR MISSION</strong></h1>
                <p class="paragrafo-grande">
                    FLAK è stata fondata nel 2022 ad Ancona, in Italia, da quattro studenti d’ingegneria
                    con la missione di aiutare gli studenti di tutte le città d'Italia a trovare una casa
                    facilmente e in breve tempo. Grazie al nostro professore A.C che ci ha affidato
                    questo progetto, il nostro obiettivo è espandere il nostro servizio in altre città e paesi.
                </p>
            </article>
        </div>
        <div class="fill display-img" style="width:50%">
            <img src="{{ asset('images/Lavoro di gruppo.png') }}" alt="Immagine" style="width:110%"/>
        </div>
    </div>
</div>
@endsection
