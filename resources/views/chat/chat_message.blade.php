<?php
$isMessageMine = $message->sender == Auth::user();
?>

<div class="flex justify-{{$isMessageMine ? 'right' : 'left'}}">
    <div class="messaggio pad-lr-mid sfondo-grigio pad-tb-small pad-lr-small bord-rad-mid margin-b-15 ">
        <p style="text-align:{{$isMessageMine ? 'right' : 'left'}}">{{$message->text}}</p>
        <h3 style="text-align:{{$isMessageMine ? 'right' : 'left'}}">{{$message->created_at}}</h3>
    </div>
</div>