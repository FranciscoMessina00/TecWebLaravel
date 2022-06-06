
<div class="contenitore-flex-2 justify-right text-mid ">
    <ul class="nav navbar-nav">
        <li class="nav-item " id="modifica">
            <a href="{{route('faq.edit',$faq->faqId)}}" class="tm-btn text-white nav-link margin-b-15">Modifica</a>
        </li>
        @include('layouts.delete-confirm', ['confirm' => 'faq.delete', 'params' => $faq->faqId])
    </ul>
</div>