<?php
    $maxDisplay = 4;

    $currentPage = $paginator->currentPage();
    $lastPage = $paginator->lastPage();
    
    $firstPageToDisplay = max(($currentPage - $maxDisplay + 1), 1);
    $lastPageToDisplay = min(($currentPage + $maxDisplay - 1), $lastPage);
?>


@if ($paginator->lastPage() != 1)
<div>
    <!-- Link alla pagina precedente -->
    @if ($paginator->currentPage() != 1)
        <a href="{{ $paginator->previousPageUrl() }}">&lt;</a>
    @else
        &lt;
    @endif
    
    <!-- Link alla pagina successiva -->
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}">&gt;</a>
    @else
        &gt;
    @endif
    
    |
    
    <!-- Link alla prima pagina -->
    @if($firstPageToDisplay!=1)
        @include('pagination.page_number', ['pageIndex'=>1])
        
        <!-- Inserisce i puntini se la prima pagina da visualizzare non è la seconda. Altrimenti si avrebbe 1 ... 2 3 4 -->
        @if($firstPageToDisplay>2)
            ...
        @endif
    @endif
    
    <!-- Visualizza, se possibile, almeno ($maxDisplay - 1) numeri prima e ($maxDisplay - 1) numeri dopo la pagina corrente. Esempio: 1 ... 13 14 '15' 16 17 ... 100-->
    @for($pageIndex=$firstPageToDisplay; $pageIndex<=$lastPageToDisplay; $pageIndex++)
        @include('pagination.page_number', ['pageIndex'=>$pageIndex])
    @endfor
    
    <!-- Link alla'ultima pagina -->
    @if($lastPageToDisplay!=$lastPage)
        <!-- Inserisce i puntini se l'ultima pagina da visualizzare è distante di almeno una posizione dall'ultima pagina dell'elenco. 
        Altrimenti scriverebbe 4 5 ... 6 -->
        @if($lastPage-$lastPageToDisplay>1)
            ...
        @endif
        
        @include('pagination.page_number', ['pageIndex'=>$lastPage])
    @endif
    
</div>
@endif
