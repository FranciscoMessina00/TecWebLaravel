
<div class="contenitore-flex-2 justify-right text-mid ">
    <ul class="nav navbar-nav">
        <li class="nav-item " id="modifica">
            <a href="{{route('faq.edit',$faq->faqId)}}" class="tm-btn text-white nav-link margin-b-15">Modifica</a>
        </li>
        <li class="nav-item " id="elimina">
            <div class="tm-btn tm-btn-brown text-white nav-link margin-b-15 no-select">Elimina</div>
        </li>
        <li class="nav-item nascondi" id="sicuro">
            <div class="tm-btn tm-btn-brown text-white nav-link margin-b-15 no-select tm-btn-no-pointer">Sicuro?</div>
        </li>
        <li class="nav-item nascondi" id="si">
            <a href="{{route('faq.delete',$faq->faqId)}}" class="tm-btn tm-btn-green text-white nav-link margin-b-15">Si</a>
        </li>
        <li class="nav-item nascondi" id="no">
            <div class="tm-btn tm-btn-red text-white nav-link margin-b-15 no-select">No</div>
        </li>
    </ul>
</div>