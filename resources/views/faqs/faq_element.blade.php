<li class="text-gold text-large">
    {{$faq->question}}
    @can('edit-faq')
        @include('faqs/buttons_faq_admin')
    @endcan
    <p class="margin-b-20 text-mid text-black">{{$faq->answer}}</p>
</li>