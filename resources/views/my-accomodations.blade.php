@extends('layouts.public')

@section('title', 'I miei alloggi')

@section('content')
<div class="margin-t-x-large margin-b-40 contenitore-flex-2">

    <div class="container-big margin-lr pad-lr-mid">
        <h1 class="text-center text-gold">I miei alloggi</h1>
        <!--                Zona aggiungi alloggio e visualizza opzionati-->
        <div class="contenitore-flex-2">
            @if(!$filter)
            <div class="contenitore-flex-2 justify-left auto-margin-r pad-lr-mid margin-b-15">
                <a href="{{ route('my-accomodations',1) }}" class="tm-btn text-white "><h4 class="pad-tb-x-small">Visualizza solo alloggi opzionati</h4></a>
            </div>
            @endif
            @if($filter)
            <div class="contenitore-flex-2 justify-left auto-margin-r pad-lr-mid margin-b-15">
                <a href="{{ route('my-accomodations',0) }}" class="tm-btn text-white "><h4 class="pad-tb-x-small">Visualizza tutti gli alloggi</h4></a>
            </div>
            @endif
            <div class="contenitore-flex-2 justify-right auto-margin-l pad-lr-mid margin-b-15">
                <h2 class="justify-right"><a class="pad-lr-large tm-btn tm-btn-gray text-white" href="alloggio_locatore.html">+</a></h2>
            </div>
        </div>
        <!--                Fine zona aggiungi alloggio e visualizza opzionati-->

        @foreach($accomodations as $accomodation)
        @php
        $nascondi=false;
        if($filter && $accomodation->requests()==0){
        $nascondi=true;
        }
        @endphp
        <div class="offerta {{$nascondi ? 'nascondi' : ''}}">
            @include('catalog.catalog_element', ['showSimplified' => false])
        </div>
        @endforeach

    </div>

</div>
</div>
@endsection