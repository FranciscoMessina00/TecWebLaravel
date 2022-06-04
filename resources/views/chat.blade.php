@php
    $route=Route::currentRouteName();
@endphp

@extends('layouts.public')

@section('title', 'Chat')

@section('content')
<div class="margin-t-x-large margin-b-40 contenitore-flex-2">

    <!-- Sezione lista contatti -->
    <div class="margin-lr barra-filtri pad-lr-small">
        <h1 class="text-center text-gold ">Messaggi</h1>
        
        <!-- Sezione studenti -->
        @can('isStudent')
        <div class="flex justify-center margin-b-15 ">
            <a class="tm-btn text-black" href="{{route('messages.new')}}">Nuovo messaggio</a>
        </div>
        @endcan
        <!-- Fine sezione studenti -->
        
        <div class="overflow box">
            @foreach($contacts as $contact)
                @include('chat.chat_contact')
            @endforeach
        </div>
    </div>

    
    <div class="container-big margin-lr pad-lr-mid">
        <div>
            
            <!-- Sezione lista messaggi scambiati con una persona -->
            @switch($route)
                @case('messages.chat')
                    @isset($currentContact)
                    <div id="chat">
                        <h1 class="text-left text-gold">{{$currentContact->name}} - {{$currentContact->age()}} anni - Genere: {{$currentContact->gender}}</h1>
                        <div class="overflow box bord-rad-lg">
                            <div>
                                @foreach($messages as $message)
                                    @include('chat.chat_message')
                                @endforeach
                            </div>
                        </div>
                        <form class="contenitore-flex-2 margin-t-x-small" method="post" action="{{route('messages.send')}}">
                            @csrf
                            <input name="text" type="text" id="messaggio" class="form-element sfondo-grigio" placeholder="Scrivi messaggio...">
                            <input type="hidden" id="snd" value="{{Auth::id()}}" name="senderId">
                            <input type="hidden" id="rcp" value="{{$currentContact->userId}}" name="recipientId">
                            <input type="submit" value="Invia" class="tm-btn margin-lr bord-rad-mid">
                        </form>
                    </div>
                    @endisset
                @break

                @case('messages.new')
                <!-- Sezione nuovo messaggio -->
                <div id="new_messaggio">
                    <h1 class="text-left text-gold">Nuovo messaggio</h1>
                        @include('chat.new_message_form')
                </div>
                @break
                @case('messages.sendTo')
                <!-- Sezione nuovo messaggio -->
                <div id="new_messaggio">
                    <h1 class="text-left text-gold">Nuovo messaggio</h1>
                        @include('chat.new_message_form')
                </div>
                @break
            @endswitch
            
        </div>
    </div>



</div>
@endsection