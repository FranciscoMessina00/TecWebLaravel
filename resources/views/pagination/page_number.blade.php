@if ($currentPage != $pageIndex)
    <a class="text-gold" href="{{ $paginator->url($pageIndex) }}">{{$pageIndex}}</a>
@else
    {{$pageIndex}}
@endif