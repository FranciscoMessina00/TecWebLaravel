@extends('layouts.public')

@section('title', 'Chat')

@section('content')
<div class="margin-t-x-large margin-b-40 contenitore-flex-2">

    <div class="margin-lr barra-filtri pad-lr-small">
        <h1 class="text-center text-gold ">Messaggi</h1>
        <!--                Inizio blocco solo studente-->
        <div class="flex justify-center margin-b-15 ">
            <a class="tm-btn text-black" href="nuovomess.html">Nuovo messaggio</a>
        </div>
        <!--                Fine blocco solo studente-->
        <div class="overflow box">
            @foreach($contacts as $contact)
                @include('chat.chat_contact')
            @endforeach
        </div>
    </div>
    
    
    <div class="container-big margin-lr pad-lr-mid">
        @isset($currentContact)
        <div>
            <div id="chat">
                <h1 class="text-left text-gold">{{$currentContact->name}}</h1>
                <div class="overflow box bord-rad-lg">
                    <div>
                        @foreach($messages as $message)
                            @include('chat.chat_message')
                        @endforeach
                    </div>
                </div>
                <form class="contenitore-flex-2 margin-t-x-small" method="post" action="{{route('messages.chat.new')}}">
                    @csrf
                    <input name="text" type="text" id="messaggio" class="form-element sfondo-grigio" placeholder="Scrivi messaggio...">
                    <input type="hidden" id="snd" value="{{Auth::id()}}" name="senderId">
                    <input type="hidden" id="rcp" value="{{$currentContact->userId}}" name="recipientId">
                    <input type="submit" value="Invia" class="tm-btn margin-lr bord-rad-mid">
                </form>
            </div>
        </div>
        @endisset
    </div>
    
</div>
@endsection