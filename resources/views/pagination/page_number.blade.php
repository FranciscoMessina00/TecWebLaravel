@if ($currentPage != $pageIndex)
    <a href="{{ $paginator->url($pageIndex) }}">{{$pageIndex}}</a>
@else
    {{$pageIndex}}
@endif