@extends('layouts.public')

@section('title', 'Catalogo')

@section('content')
<div class="margin-t-x-large margin-b-40 contenitore-flex-2">

    @can('show-filter-bar')
    @include('catalog.filter_sidebar')
    @endcan

    <div class="container-big margin-lr pad-lr-mid margin-b-15">
        <h1 class="text-center text-gold">Catalogo delle offerte</h1>
        @foreach($accomodations as $accomodation)
        <div class="offerta">
            @include('catalog.catalog_element', ['showSimplified' => false])
        </div>
        @endforeach
        <!--Paginazione-->
        <div class="text-center">
            @include('pagination.paginator', ['paginator' => $accomodations->appends(\Request::except('page'))])
        </div>
    </div>
    
    
</div>
@endsection
