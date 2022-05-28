@extends('layouts.public')

@section('title', 'FAQ')

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
                @include('faqs.faq_element')
            @endforeach
        </ol>
    </div>
</div>
<!--Paginazione-->
<div>
    @include('pagination.paginator', ['paginator' => $faqs])
</div>
@endsection
