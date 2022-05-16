@extends('layouts.public')

@section('title', 'Catalogo')

@section('content')
<br>
<div class="margin-t-x-large margin-b-40 contenitore-flex-2">

            <div class="container-big margin-lr pad-lr-mid">
                <h1 class="text-center text-gold">Catalogo delle offerte</h1>
                @foreach($accomodations as $accomodation)
                    @include('catalog.catalog_element')
                @endforeach
            </div>
</div>
@endsection
