@extends('layouts.public')

@section('title', 'Account')

@section('content')
<div class="margin-t-x-large margin-b-40 text-center ">
    <div class="container-big auto-margin-lr pad-lr-large">
        <h2 class="text-center margin-b-40 margin-t-small text-gold text-large">Informazioni utente</h2>
        <ol class="text-left">
            <!<!-- Provvisorio -->
            <li>Nome: {{Auth::user()->name}}</li>
            <li>Cognome: {{Auth::user()->surname}}</li>
            <li>Ruolo: {{Auth::user()->role}}</li>
            <li>Username: {{Auth::user()->username}}</li>
            <li>Email: {{Auth::user()->email}}</li>
        </ol>
    </div>
</div>
@endsection
