@extends('layouts.public')

@section('title', 'Account')

@section('content')

<div class="margin-t-x-large margin-b-40 text-center ">
    <div class="container-big auto-margin-lr pad-lr-large">
        <h2 class="text-center margin-b-40 margin-t-small text-gold text-large">Informazioni utente</h2>
    </div>
    
    <div class="width-small margin-b-30">
        {!! Form::open(array('url' => '/updateaccount') !!}
                {{ Form::hidden('_method', 'PUT') }}
                @csrf
                
                <input name="nome" type="text" style="font-size: x-large;" id="nome"
                                   class="validate {{ $errors->has('nome') ? ' invalid' : '' }}" value="{{ $user->first_name }}" required autofocus>
                <label> Nome </label>
                @if ($errors->has('nome'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                            @endif
    </div>
    
    <div class="width-small margin-b-30">
                                <div class="text-left">
                                    <input id="cognome" type="text" name="cognome" 
                                           class="validate {{ $errors->has('cognome') ? ' invalid' : '' }}" value="{{ $user->cognome }}" required>>
                                    <label>
                                        Cognome
                                    </label>
                                    @if ($errors->has('cognome'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('cognome') }}</strong>
                                    </span>
                            @endif
                                </div>
                              
                            </div>