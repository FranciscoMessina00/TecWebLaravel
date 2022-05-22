@extends('layouts.public')

@section('title', 'Registrati')

@section('content')
<!-- inizio zona di accesso-->
<br>
<div class="margin-t-x-large margin-b-40 text-center ">
    <div class="container-small auto-margin-lr pad-lr-large">
        <h2 class="text-center margin-b-40 margin-t-small text-gold text-large">Area di registrazione</h2>
        {{ Form::open(array('route' => 'register.add')) }}

        <!-- inizio selezione chi sei-->
        <div>
            <div class="text-left">
                <!--                    <label for="tipology" style="font-size: x-large;">
                                        Chi sei?
                                    </label>-->
                {{ Form::label('role', 'Chi sei?', ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
<!--                <select id="selettore" name="tipology" class="form-element">
                    <option value="none" disabled selected>Seleziona un'opzione</option>
                    <option value="studente">Studente</option>
                    <option value="locatore">Locatore</option>
                </select>-->
                {{ Form::select('role', ['locator' => 'Locatore', 'student' => 'Studente'], 3, ['class' => 'form-element','id' => 'tipology']) }}
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
                <!--                    <label for="name" style="font-size: x-large;">
                                        Nome
                                    </label>-->
                {{ Form::label('name', 'Nome', ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
<!--                    <input class="form-element" id="nome" type="text" name="name" placeholder="Inserisci nome">-->
                {{ Form::text('name', '', ['class' => 'form-element', 'id' => 'name', 'placeholder'=>'Inserisci nome']) }}
                @if ($errors->first('name'))
                <ul class="errors">
                    @foreach ($errors->get('name') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
        <div>
            <div class="text-left">
                <!--                <label for="surname" style="font-size: x-large;">
                                    Cognome
                                </label>-->
                {{ Form::label('surname', 'Cognome', ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
<!--                <input class="form-element" id="cognome" type="text" name="surname" placeholder="Inserisci cognome">-->
                {{ Form::text('surname', '', ['class' => 'form-element', 'id' => 'name', 'placeholder'=>'Inserisci cognome']) }}
                @if ($errors->first('surname'))
                <ul class="errors">
                    @foreach ($errors->get('surname') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
        <div>
            <div class="text-left">
                <!--                <label for="username" style="font-size: x-large;">
                                    Username
                                </label>-->
                {{ Form::label('username', 'Username', ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
<!--                <input class="form-element" id="username" type="text" name="username" placeholder="Inserisci username">-->
                {{ Form::text('username', '', ['class' => 'form-element', 'id' => 'name', 'placeholder'=>'Inserisci username']) }}
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
                <!--                <label for="mail" style="font-size: x-large;">
                                    E-mail
                                </label>-->
                {{ Form::label('email', 'Email', ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
<!--                <input class="form-element" id="mail" type="text" name="mail" placeholder="Inserisci e-mail">-->
                {{ Form::text('email', '', ['class' => 'form-element','id' => 'email','placeholder'=>'Inserisci e-mail']) }}
                @if ($errors->first('email'))
                <ul class="errors">
                    @foreach ($errors->get('email') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
        <div>
            <div class="text-left">
                <!--                <label for="gender" style="font-size: x-large;">
                                    Gender
                                </label>-->
                {{ Form::label('gender', 'Gender', ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
<!--                <select id="gender" name="gender" class="form-element">
                    <option value="none" disabled selected>Seleziona un'opzione</option>
                    <option value="donna">Donna</option>
                    <option value="uomo">Uomo</option>
                    <option value="altro">Altro</option>
                </select>-->
                {{ Form::select('gender', ['X' => 'Altro', 'M' => 'Uomo', 'F' => 'Donna'], 'X', ['class' => 'form-element','id' => 'gender']) }}
                @if ($errors->first('gender'))
                <ul class="errors">
                    @foreach ($errors->get('gender') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
        <div>
            <div class="text-left">
<!--                <label for="data" style="font-size: x-large;">
                    Data di nascita
                </label>-->
                {{ Form::label('date', 'Data di nascita', ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
<!--                <input class="form-element" id="data" type="date" name="data">-->
                {{Form::date('date',null, ['class'=>'form-element'])}}
            </div>
        </div>
        <!-- fine mail-->
        <!-- inizio pass-->
        <div>
            <div class="text-left">
<!--                <label for="password" style="font-size: x-large;">
                    Password
                </label>-->
                {{ Form::label('password', 'Password', ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
<!--                <input class="form-element" id="pass" type="password" name="password" placeholder="Inserisci password">-->
                {{ Form::password('password', ['class' => 'form-element', 'id' => 'password','placeholder'=>'Inserisci password']) }}
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
<!--                <label for="ripeti-pass" style="font-size: x-large;">
                    Ripeti la password
                </label>-->
                {{ Form::label('password-confirm', 'Conferma password', ['class' => 'text-mid']) }}
                
            </div>
            <div class="margin-b-40">
<!--                <input class="form-element" id="ripeti-pass" type="password" placeholder="Ripeti la password">-->
                {{ Form::password('password_confirmation', ['class' => 'form-element', 'id' => 'password-confirm','placeholder'=>'Ripeti la password']) }}
            </div>
        </div>
        <!-- fine pass-->
        <!-- invia dati -->
        <div class="margin-t-small text-center">
<!--            <input class="tm-btn" type="submit" value="REGISTRATI">-->
            {{ Form::submit('REGISTRATI', ['class' => 'tm-btn']) }}
        </div>
        {{ Form::close() }}
    </div>
</div>
@endsection