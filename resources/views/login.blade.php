@extends('layouts.public')

@section('title', 'Accedi')

@section('content')
<br>
<div class="margin-t-x-large margin-b-40 text-center ">
    <div class="container-small auto-margin-lr pad-lr-large">
        <h2 class="text-center margin-b-40 margin-t-small text-gold text-large">Area di accesso</h2>
        <form name="accedi" method="get" class="">
            <!-- inizio selezione chi sei-->
            <div>
                <div class="text-left">
                    <label for="selettore" style="font-size: x-large;">
                        Chi sei?
                    </label>
                </div>
                <div class="margin-b-40">
                    <select id="selettore" name="selettore" class="form-element">
                        <option value="none" disabled selected>Seleziona un'opzione</option>
                        <option value="studente">Studente</option>
                        <option value="locatore">Locatore</option>
                        <option value="amministratore">Amministratore</option>
                    </select>
                </div>
            </div>
            <!-- fine selezione chi sei -->
            <!-- inizio mail-->
            <div>
                <div class="text-left">
                    <label for="username" style="font-size: x-large;">
                        Username
                    </label>
                </div>
                <div class="margin-b-40">
                    <input class="form-element" id="username" type="text" name="username" placeholder="Inserisci username">
                </div>
            </div>
            <!-- fine mail-->
            <!-- inizio pass-->
            <div>
                <div class="text-left">
                    <label for="pass" style="font-size: x-large;">
                        Password
                    </label>
                </div>
                <div class="margin-b-40">
                    <input class="form-element" id="pass" type="password" name="pass" placeholder="Inserisci password">
                </div>
            </div>
            <!-- fine pass-->
            <!-- invia dati -->
            <div class="margin-t-small text-center">
                <input class="tm-btn" type="submit" value="ENTRA">
            </div>
        </form>
    </div>
</div>
@endsection