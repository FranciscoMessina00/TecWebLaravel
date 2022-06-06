@extends('layouts.public')

@section('title', 'Aggiungi alloggio')


@section('scripts')

@parent
<script type="text/javascript" src="{{ asset('Js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('Js/FormValidation.js') }}"></script>
<script>
$(function () {
    var actionUrl = "{{route('accomodation.update')}}";
    var formId = 'editAccomodation';

    $(":input").on('blur', function ()
    {
        var formElementId = $(this).attr('id');
        validateElement(formElementId, actionUrl, formId);
    });

    $("#editAccomodation").on('submit', function (event)
    {
        event.preventDefault();
        validateForm(actionUrl, formId);
    });
});
</script>

@endsection


@section('content')
<!-- inizio zona di accesso-->
<br>
<div class="margin-t-x-large margin-b-40 text-center ">
    <div class="container-small auto-margin-lr pad-lr-large">
    <h2 class="text-center margin-b-40 margin-t-small text-gold text-large">Modifica alloggio</h2>
        @include('accomodation.accomodation-form', [
        'formId' => 'editAccomodation',
        'route' => 'accomodation.update',
        'submitButtonText' => 'SALVA DATI'
        ])
    </div>
</div>
@endsection