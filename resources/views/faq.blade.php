@extends('layouts.public')

@section('scripts')

@parent
<script type="text/javascript" src="{{ asset('Js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('Js/ConfermaElimina.js') }}"></script>

@endsection

@section('title', 'FAQ')
<?php
$paginator=$faqs;
$currentPage = $paginator->currentPage();

$firstPageElement = ($currentPage - 1) * 3;
?>
@section('content')
<div class="margin-t-x-large margin-b-40 text-center ">
    <div class="container-big auto-margin-lr pad-lr-large">
        <h2 class="text-center margin-b-40 margin-t-small text-gold text-large">Frequently Asked Questions</h2>
        @can('edit-faq')
        <div class="text-left margin-b-30">
            <a href="{{route('faq.new')}}" class="tm-btn tm-btn-gray text-white">Aggiungi FAQ</a>
        </div>
        @endcan
        <ol class="text-left">
            @foreach($faqs as $faq)
            @php
            $firstPageElement++;
            @endphp
                @include('faqs.faq_element',['element' => $firstPageElement])
            @endforeach
        </ol>
        <div>
        @include('pagination.paginator', ['paginator' => $faqs])
    </div>
    </div>
    
</div>
<!--Paginazione-->

@endsection
