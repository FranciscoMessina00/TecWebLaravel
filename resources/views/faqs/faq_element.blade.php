
<li class="text-gold text-large">
    <h3>{{$element}}. {{$faq->question}}</h3>
    <p class="margin-b-20 text-mid text-black">{{$faq->answer}}</p>
     @can('edit-faq')
        @include('faqs/buttons_faq_admin')
    @endcan
</li>