<div class='margin-t-mid contenitore-flex'>
    @if($route)
    <a href="{{ route($route, $parameters) }}" class="tm-btn tm-btn-gray text-white nav-link margin-b-15">Indietro</a>
    @else
    <a href="{{ url()->previous() }}" class="tm-btn tm-btn-gray text-white nav-link margin-b-15">Indietro</a>
    @endif
</div>