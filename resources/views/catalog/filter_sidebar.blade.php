<?php
$isAppartmentSelected = false;
$isBedRoomSelected = false;

if ($request) {
    $isRequestReceived = $request->filled('tipology');

    if ($isRequestReceived) {
        $isAppartmentSelected = $request->tipology == 0 || $request->tipology == 2;
        $isBedRoomSelected = $request->tipology == 1 || $request->tipology == 2;
    }
}
?>

@section('scripts')

@parent
<script src="{{ asset('Js/FilterSideBar.js') }}"></script>        

@endsection


<!--        Inizio zona filtri-->
<div class="margin-lr barra-filtri pad-lr-small margin-b-15" id="filter">
    <h1 class="text-center text-gold ">Filtri</h1>
    @include('catalog.filter_forms.filter_form')
</div>
<!--        Fine zona filtri-->