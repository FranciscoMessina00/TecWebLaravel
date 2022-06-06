<?php
    if($recipient)
    {
        if($hasOptioned){
            $newMessage = 'Ciao '. $recipient->name . ' sarei interessato alla tua offerta ' . $accomodation->name;
        }else{
            $newMessage = 'Ciao '. $recipient->name ;
        }
        
    }
    else
    {
        $newMessage = '';
    }
?>



{{ Form::open(array('route' => 'messages.send')) }}
<div>
    <div class="text-left">
        <!-- <label for="destinatario" style="font-size: x-large;">
            Destinatario
        </label>
        -->
        {{ Form::label('recipient', 'Destinatario', ['style' => 'font-size: x-large;']) }}
    </div>

    <div class="margin-b-40">
        <!--
        <input class="form-element" id="destinatario" type="text" name="destinatario" placeholder="Inserisci destinatario">
        -->
        {{ Form::select('recipientId', $recipientList, $recipient == null ? '' : $recipient->userId, ['class' => 'form-element','id' => 'recipient']) }}
    </div>
</div>
<div>
    <div class="text-left">
        <!--
        <label for="message" style="font-size: x-large;">
            Messaggio
        </label>
        -->
        {{ Form::label('text', 'Messaggio', ['style' => 'font-size: x-large;']) }}
    </div>
    <div class="margin-b-40">
        <!--
        <textarea class="form-element" cols="90" rows="10" id="message" name="answer" placeholder="Scrivi messaggio..."></textarea>
        -->
        {{ Form::textarea('text', $newMessage, ['class' => 'form-element','id' => 'text','placeholder'=>'Scrivi messaggio...', 'cols' => '90', 'rows' => '10','maxlength' => '2000']) }}
        @if ($errors->first('text'))
        <ul class="errors">
            @foreach ($errors->get('text') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
    </div>
</div>
<div class="margin-t-small text-center">
    <!--
    <input class="tm-btn margin-lr bord-rad-mid" type="submit" value="Invia">
    -->
    {{ Form::submit('Invia', ['class' => 'tm-btn margin-lr bord-rad-mid']) }}
    {{Form::hidden('senderId', Auth::id())}}
</div>
{{ Form::close() }}