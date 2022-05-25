@extends('layouts.public')

@section('title', 'Account')

@section('content')

<div class="margin-t-x-large margin-b-40 text-center ">
    <div class="container-mid auto-margin-lr pad-lr-large">
        <h2 class="text-center margin-b-40 margin-t-small text-gold text-large">Informazioni personali</h2>
        <div class="contenitore-flex"> 
            {{ Form::open(array('route' => 'account.update')) }}
            @csrf
            <div class="">
                <!-- inizio mail-->
                <div class="width-small margin-b-30">
                    <div class="text-left">
                        {{ Form::label('name', 'Nome', ['style' => 'font-size: x-large;']) }}
                    </div>
                    <div class="">
                        {{ Form::text('name', Auth::user()->name, ['class' => 'form-element', 'id' => 'name', 'placeholder'=>'Inserisci nome']) }}
                        @if ($errors->first('name'))
                        <ul class="errors">
                            @foreach ($errors->get('name') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                <div class="width-small margin-b-30">
                    <div class="text-left">
                        {{ Form::label('surname', 'Cognome', ['style' => 'font-size: x-large;']) }}
                    </div>
                    <div class="">
                        {{ Form::text('surname', Auth::user()->surname, ['class' => 'form-element', 'id' => 'name', 'placeholder'=>'Inserisci cognome']) }}

                        @if ($errors->first('surname'))
                        <ul class="errors">
                            @foreach ($errors->get('surname') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                <div class="width-small margin-b-30">
                    <div class="text-left">
                        {{ Form::label('username', 'Username', ['style' => 'font-size: x-large;']) }}
                    </div>
                    <div class="">
                        {{ Form::text('username', Auth::user()->username, ['class' => 'form-element', 'id' => 'name', 'placeholder'=>'Inserisci username']) }}

                        @if ($errors->first('username'))
                        <ul class="errors">
                            @foreach ($errors->get('username') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                <div class="width-small margin-b-30">
                    <div class="text-left">
                        {{ Form::label('email', 'Email', ['style' => 'font-size: x-large;']) }}
                    </div>
                    <div class="">
                        {{ Form::text('email', Auth::user()->email, ['class' => 'form-element','id' => 'email','placeholder'=>'Inserisci e-mail']) }}

                        @if ($errors->first('email'))
                        <ul class="errors">
                            @foreach ($errors->get('email') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                <div class="width-small">
                    <div class="text-left">
                        {{ Form::label('gender', 'Gender', ['style' => 'font-size: x-large;']) }}
                    </div>
                    <div class="margin-b-30">
                        {{ Form::select('gender', ['altro' => 'Altro', 'uomo' => 'Uomo', 'donna' => 'Donna'], Auth::user()->gender, ['class' => 'form-element','id' => 'gender']) }}
                        @if ($errors->first('gender'))
                        <ul class="errors">
                            @foreach ($errors->get('gender') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                <div class="width-small margin-b-30">
                    <div class="text-left">
                        {{ Form::label('date', 'Data di nascita', ['style' => 'font-size: x-large;']) }}
                    </div>
                    <div class="">
                        {{Form::date('bornDate',Auth::user()->getFormBornDate(), ['class'=>'form-element'])}}
                        @if ($errors->first('bornDate'))
                        <ul class="errors">
                            @foreach ($errors->get('bornDate') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                <!-- fine mail-->
                <!-- inizio pass-->
                <div class="width-small margin-b-30">

                    <div class="text-left">
                        {{ Form::label('password', 'Password', ['style' => 'font-size: x-large;']) }}
                    </div>
                    <div class="">
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
                <!-- fine pass-->
                <!-- inizio conf pass-->
                <div>
                    <div class="text-left">
                        <!--<label for="ripeti-pass" style="font-size: x-large;">
                           Ripeti la password
                         </label>-->
                        {{ Form::label('password-confirm', 'Conferma password', ['class' => 'text-mid']) }}

                    </div>
                    <div class="margin-b-40">
                    <!--<input class="form-element" id="ripeti-pass" type="password" placeholder="Ripeti la password">-->
                        {{ Form::password('password_confirmation', ['class' => 'form-element', 'id' => 'password-confirm','placeholder'=>'Ripeti la password']) }}
                    </div>
                </div>
            </div>
            <!-- fine pass-->
            <!-- invia dati -->
            <div class="margin-t-small text-center margin-b-15">
                <!--
                <input class="tm-btn" type="submit" value="MODIFICA DATI">
                -->
                {{ Form::submit('SALVA DATI', ['class' => 'tm-btn']) }}
            </div>
            <!-- fine invia dati -->
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
