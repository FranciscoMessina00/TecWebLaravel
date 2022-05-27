@extends('layouts.public')

@section('title', 'Accedi')

@section('content')
<br>
<div class="margin-t-x-large margin-b-40 text-center ">
    <div class="container-small auto-margin-lr pad-lr-large">
        <h2 class="text-center margin-b-40 margin-t-small text-gold text-large">Area di accesso</h2>
        {{ Form::open(array('route' => 'login')) }}

        <!-- inizio mail-->
        <div>
            <div class="text-left">
                {{ Form::label('username', 'Username', ['class' => 'text-mid']) }}
            </div>
            <div class="margin-b-40">
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
        <!-- fine pass-->
        <!-- invia dati -->
        <div class="margin-t-small text-center">
            {{ Form::submit('ENTRA', ['class' => 'tm-btn']) }}
        </div>
        {{ Form::close() }}
    </div>
</div>
@endsection