<?php
$isAppartmentSelected = true;
$isBedRoomSelected = true;
$isBothSelected = true;

//$numberAp ? $numberAp : 0;
//$numberPl ? $numberAp : 0;

if ($request) {
    $isRequestReceived = $request->filled('tipology');

    if ($isRequestReceived) {
        $isAppartmentSelected = $request->tipology != 1;
        $isBedRoomSelected = $request->tipology != 0;
        $isBothSelected = $request->tipology == 2;
    }
}
?>
@extends('layouts.public')

@section('title', 'Statistiche Amministratore')

@section('content')
<div class="margin-t-x-large margin-b-40 text-center">
    <div class="container-big auto-margin-lr pad-lr-large ">
        <h2 class="text-center margin-b-40 margin-t-small text-gold text-large">Statistiche generali amministratore</h2>
        <div class="text-center margin-t-small-neg container-mid auto-margin-lr">

            {{ Form::open(['route' => 'stats.filter','class'=>"contenitore-flex",'method'=>'post']) }}
            <div class="pad-lr-small border-r">
                <h2>Quando</h2>
                <div class="contenitore-flex">
                    {{ Form::date('dateStart',$request ? $request->dateStart : '',['class' => 'form-element'])}}
                    <h2 class="auto-margin-tb">-</h2>
                    {{ Form::date('dateFinish',$request ? $request->dateFinish : '',['class' => 'form-element'])}}
                </div>
                @foreach ($errors->get('dateStart') as $message)
                <li class='errors'>{{ $message }}</li>
                @endforeach
                @foreach ($errors->get('dateFinish') as $message)
                <li class='errors'>{{ $message }}</li>
                @endforeach
            </div>
            <div class="pad-lr-small border-r">

                <h2>
                    {{ Form::label('tipology', 'Tipologia') }}
                </h2>
                {{ Form::select('tipology', ['0' => 'Appartamento', '1' => 'Posto letto','2'=>'Entrambi'], $request ? $request->tipology : '2',['class' => 'form-element'])}}
            </div>
            <br>
            <div class="margin-t-small text-center auto-margin-tb">
                {{ Form::submit('Filtra', ['class' => 'tm-btn']) }}
            </div>
            </form>
            <div>
                <table border class="text-center margin-t-small auto-margin-lr">
                    <tr><th>Tipologia</th><th>Totale offerte</th><th>Offerte opzionate</th><th>Alloggi locati</th></tr>
                    <tr class="{{$isAppartmentSelected ? '' : 'nascondi'}}"><td>Appartamento</td><td>{{$numberAp}}</td><td>{{$optionedAp}}</td><td>{{$assignedAp}}</td></tr>
                    <tr class="{{$isBedRoomSelected ? '' : 'nascondi'}}"><td>Posto letto</td><td>{{$numberPl}}</td><td>{{$optionedPl}}</td><td>{{$assignedPl}}</td></tr>
                    <tr class="border-t-2 {{$isBothSelected ? '' : 'nascondi'}}"><td>Totale</td><td>{{$numberAp+$numberPl}}</td><td>{{$optionedAp+$optionedPl}}</td><td>{{$assignedAp+$assignedPl}}</td></tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection