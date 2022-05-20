@extends('layouts.studentpublic')

@section('title', 'Catalogo_Studente')

@section('content')
<div class="margin-t-x-large margin-b-40 contenitore-flex-2">

    @if($level == 3)
        @include('catalog.filter_sidebar')
    @endif

    <div class="container-big margin-lr pad-lr-mid">
        <h1 class="text-center text-gold">Catalogo delle offerte</h1>
        @foreach($accomodations as $accomodation)
            @include('catalog.catalog_element')
        @endforeach
    </div>
</div>
<!--Paginazione-->
<div>
    @include('pagination.paginator', ['paginator' => $accomodations])
</div>
@endsection

