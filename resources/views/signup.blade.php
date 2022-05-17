@extends('layouts.public')

@section('title', 'Registrati')

@section('content')
<!-- inizio zona di accesso-->
<br>
<div class="margin-t-x-large margin-b-40 text-center ">
    <div class="container-small auto-margin-lr pad-lr-large">
        <h2 class="text-center margin-b-40 margin-t-small text-gold text-large">Area di registrazione</h2>
        <form action="{{route('signup.add')}}" name="accedi" method="post" class="">
            @csrf
            <!-- inizio selezione chi sei-->
            <div>
                <div class="text-left">
                    <label for="tipology" style="font-size: x-large;">
                        Chi sei?
                    </label>
                </div>
                <div class="margin-b-40">
                    <select id="selettore" name="tipology" class="form-element">
                        <option value="none" disabled selected>Seleziona un'opzione</option>
                        <option value="studente">Studente</option>
                        <option value="locatore">Locatore</option>
                    </select>
                    @if ($errors->first('tipology'))
                    <ul class="errors">
                        @foreach ($errors->get('tipology') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>



            </div>
            <!-- fine selezione chi sei -->
            <!-- inizio mail-->
            <div>
                <div class="text-left">
                    <label for="name" style="font-size: x-large;">
                        Nome
                    </label>
                </div>
                <div class="margin-b-40">
                    <input class="form-element" id="nome" type="text" name="name" placeholder="Inserisci nome">
                </div>
            </div>
            <div>
                <div class="text-left">
                    <label for="surname" style="font-size: x-large;">
                        Cognome
                    </label>
                </div>
                <div class="margin-b-40">
                    <input class="form-element" id="cognome" type="text" name="surname" placeholder="Inserisci cognome">
                </div>
            </div>
            <div>
                <div class="text-left">
                    <label for="username" style="font-size: x-large;">
                        Username
                    </label>
                </div>
                <div class="margin-b-40">
                    <input class="form-element" id="username" type="text" name="username" placeholder="Inserisci username">
                    @if ($errors->first('username'))
                    <ul class="errors">
                        @foreach ($errors->get('username') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>



            </div>
            <div>
                <div class="text-left">
                    <label for="mail" style="font-size: x-large;">
                        E-mail
                    </label>
                </div>
                <div class="margin-b-40">
                    <input class="form-element" id="mail" type="text" name="mail" placeholder="Inserisci e-mail">
                </div>
            </div>
            <div>
                <div class="text-left">
                    <label for="gender" style="font-size: x-large;">
                        Gender
                    </label>
                </div>
                <div class="margin-b-40">
                    <select id="gender" name="gender" class="form-element">
                        <option value="none" disabled selected>Seleziona un'opzione</option>
                        <option value="donna">Donna</option>
                        <option value="uomo">Uomo</option>
                        <option value="altro">Altro</option>
                    </select>
                </div>
            </div>
            <div>
                <div class="text-left">
                    <label for="data" style="font-size: x-large;">
                        Data di nascita
                    </label>
                </div>
                <div class="margin-b-40">
                    <input class="form-element" id="data" type="date" name="data">
                </div>
            </div>
            <!-- fine mail-->
            <!-- inizio pass-->
            <div>
                <div class="text-left">
                    <label for="password" style="font-size: x-large;">
                        Password
                    </label>
                </div>
                <div class="margin-b-40">
                    <input class="form-element" id="pass" type="password" name="password" placeholder="Inserisci password">
                    @if ($errors->first('password'))
                    <ul class="errors">
                        @foreach ($errors->get('password') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>



            </div>
            <div>
                <div class="text-left">
                    <label for="ripeti-pass" style="font-size: x-large;">
                        Ripeti la password
                    </label>
                </div>
                <div class="margin-b-40">
                    <input class="form-element" id="ripeti-pass" type="password" placeholder="Ripeti la password">
                </div>
            </div>
            <!-- fine pass-->
            <!-- invia dati -->
            <div class="margin-t-small text-center">
                <input class="tm-btn" type="submit" value="REGISTRATI">
            </div>
        </form>
    </div>
</div>
@endsection