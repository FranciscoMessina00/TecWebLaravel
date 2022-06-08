@php
$route=Route::currentRouteName();
@endphp
<li class="nav-item {{ $route == 'catalog.accomodation' ? 'no-float' : '' }}" id="elimina">
    <a class="tm-btn tm-btn-brown text-white nav-link margin-b-15 no-select">{{$text}}</a>
</li>
<li class="nav-item nascondi" id="sicuro">
    <div class="tm-btn tm-btn-brown text-white nav-link margin-b-15 no-select">Sicuro?</div>
</li>
<li class="nav-item nascondi" id="si">
    @if($params)
    <a href="{{route($confirm, $params)}}" class="tm-btn tm-btn-green text-white nav-link margin-b-15">Si</a>
    @else
    <a href="{{route($confirm)}}" class="tm-btn tm-btn-green text-white nav-link margin-b-15">Si</a>
    @endif
</li>
<li class="nav-item nascondi" id="no">
    <div class="tm-btn tm-btn-red text-white nav-link margin-b-15 no-select">No</div>
</li>