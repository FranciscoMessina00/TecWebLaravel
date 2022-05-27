@extends('layouts.public')

@section('title', 'Edit FAQ')

@section('content')

<div class="margin-t-x-large margin-b-40 text-center ">
    <div class="container-mid auto-margin-lr pad-lr-large">
        <h2 class="text-center margin-b-40 margin-t-small text-gold text-large">Form FAQ</h2>
        {{ Form::open(array('route' => 'faq.update')) }}
            <div>
                <div class="text-left">
                    <label for="question" style="font-size: x-large;">
                        Domanda
                    </label>
                </div>
                <div class="margin-b-40">
                    <input class="form-element" id="question" type="text" name="question" placeholder="Inserisci domanda" value="{{$faq->question}}">
                </div>
            </div>
            <div>
                <div class="text-left">
                    <label for="answer" style="font-size: x-large;">
                        Risposta
                    </label>
                </div>
                <div class="margin-b-40">
                    <textarea class="form-element" cols="90" rows="10" id="answer" name="answer" placeholder="Inserisci risposta">{{$faq->answer}}</textarea>
                </div>
            </div>
            <div class="margin-t-small text-center">
                <input class="tm-btn" type="submit" value="Salva">
            </div>
        {{Form::close()}}
        @include('layouts.back_button')
    </div>
</div>

@endsection
