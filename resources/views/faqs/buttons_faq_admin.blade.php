<div class="contenitore-flex-2 justify-right text-mid ">
    <ul class="nav navbar-nav">
        <li class="nav-item ">
            <a href="{{route('faq.edit',$faq->faqId)}}" class="tm-btn text-white nav-link margin-b-15">Modifica</a>
        </li>
        <li class="nav-item ">
            <a class="tm-btn tm-btn-brown text-white nav-link margin-b-15 no-select">Elimina</a>
        </li>
        <li class="nav-item nascondi">
            <div class="tm-btn tm-btn-brown text-white nav-link margin-b-15 no-select">Sicuro?</div>
        </li>
        <li class="nav-item nascondi">
            <a href="{{route('faq.delete',$faq->faqId)}}" class="tm-btn tm-btn-green text-white nav-link margin-b-15">Si</a>
        </li>
        <li class="nav-item nascondi">
            <div class="tm-btn tm-btn-red text-white nav-link margin-b-15 no-select">No</div>
        </li>
    </ul>
</div>