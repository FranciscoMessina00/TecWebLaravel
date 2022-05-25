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
        {{ Form::select('recipientId', $recipientList, ['class' => 'form-element','id' => 'recipient']) }}
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
        {{ Form::textarea('text', '', ['class' => 'form-element','id' => 'text','placeholder'=>'Scrivi messaggio...', 'cols' => '90', 'rows' => '10']) }}
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