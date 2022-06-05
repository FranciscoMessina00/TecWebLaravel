<?php
    $message = 'Visualizza solo alloggi opzionati';
    $filterMessage = 'Visualizza tutti gli alloggi';
    
    if($filter)
    {
        $message = $filterMessage;
    }
?>


@extends('layouts.public')

@section('title', 'I miei alloggi')

@section('content')
<div class="margin-t-x-large margin-b-40 contenitore-flex-2">

    <div class="container-big margin-lr pad-lr-mid">
        <h1 class="text-center text-gold">I miei alloggi</h1>
        <!--                Zona aggiungi alloggio e visualizza opzionati-->
        <div class="contenitore-flex-2">
            <div class="contenitore-flex-2 justify-left auto-margin-r pad-lr-mid margin-b-15">
                <a href="{{ route('my-accomodations', !$filter) }}" class="tm-btn text-white "><h4 class="pad-tb-x-small">{{$message}}</h4></a>
            </div>
            <div class="contenitore-flex-2 justify-right auto-margin-l pad-lr-mid margin-b-15">
                <h2 class="justify-right"><a class="pad-lr-large tm-btn tm-btn-gray text-white" href="alloggio_locatore.html">+</a></h2>
            </div>
        </div>
        <!--                Fine zona aggiungi alloggio e visualizza opzionati-->

        @foreach($accomodations as $accomodation)
            @php
                $nascondi = $filter && !$accomodation->hasRequests();
            @endphp
            
            <div class="offerta {{$nascondi ? 'nascondi' : ''}}">
                @include('catalog.catalog_element', ['showSimplified' => false])
            </div>
        @endforeach

    </div>

</div>
</div>
@endsection