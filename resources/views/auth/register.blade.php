@extends('layouts.public')

@section('title', 'Registrati')

@section('content')

@section('scripts')
@parent
<script type="text/javascript" src="{{ asset('Js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('Js/ValidazioneLatoClient.js') }}"></script>
@endsection
<!-- inizio zona di accesso-->
<br>
<div class="margin-t-x-large margin-b-40 text-center ">
    <div class="container-small auto-margin-lr pad-lr-large">
        <h2 class="text-center margin-b-40 margin-t-small text-gold text-large">Area di registrazione</h2>
        {{ Form::open(array('route' => 'register.add')) }}

        <!-- inizio selezione chi sei-->
        <div>
            <div class="text-left">
                {{ Form::label('role', 'Chi sei?', ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{ Form::select('role', ['locator' => 'Locatore', 'student' => 'Studente'], null, ['class' => 'form-element','id' => 'tipology']) }}
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
                {{ Form::label('name', 'Nome', ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
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
                {{ Form::label('surname', 'Cognome', ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{ Form::text('surname', '', ['class' => 'form-element', 'id' => 'surname', 'placeholder'=>'Inserisci cognome']) }}
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
                {{ Form::label('username', 'Username', ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{ Form::text('username', '', ['class' => 'form-element', 'id' => 'username', 'placeholder'=>'Inserisci username']) }}
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
                {{ Form::label('email', 'Email', ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
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
                {{ Form::label('gender', 'Gender', ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{ Form::select('gender', ['altro' => 'Altro', 'uomo' => 'Uomo', 'donna' => 'Donna'], 'X', ['class' => 'form-element','id' => 'gender']) }}
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
                {{ Form::label('bornDate', 'Data di nascita', ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
                {{Form::date('bornDate',null, ['class'=>'form-element'])}}
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
        <div>
            <div class="text-left">
                {{ Form::label('password', 'Password', ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
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
                {{ Form::label('password-confirm', 'Conferma password', ['class' => 'text-mid']) }}
                
            </div>
            <div class="margin-b-40">
                {{ Form::password('password_confirmation', ['class' => 'form-element', 'id' => 'password-confirm','placeholder'=>'Ripeti la password']) }}
            </div>
        </div>
        <!-- fine pass-->
        <!-- invia dati -->
        <div class="margin-t-small text-center">
            {{ Form::submit('REGISTRATI', ['class' => 'tm-btn']) }}
        </div>
        {{ Form::close() }}
    </div>
</div>
@endsection