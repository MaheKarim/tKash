@php
    /*
     *   singleQuery True / false
     * By default singleQuery is false , If you want only one row you have to set `True`
     *
     * limit to fetch record of data
     */
    $faq = getContent('faq.content',true);
    $faqElement = getContent('faq.element',orderById:true);
@endphp
<section class="faq-section pb-110 bg-img" data-background-image="assets/images/thumbs/faq-bg.png')}}">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-xl-6 col-md-7">
                <div class="faq-content">
                    <h2 class="faq-content__title">{{ __(@$faq->data_values->heading) }}</h2>
                    <div class="accordion custom--accordion" id="accordionExample">
                        @foreach($faqElement as $data)
                            <div class="accordion-item">
                                <h6 class="accordion-header" id="acdnH01">
                                    <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#acdnDtArId01"
                                            aria-expanded="false" aria-controls="acdnDtArId01">
                                        {{ __(@$data->data_values->question) }}
                                    </button>
                                </h6>
                                <div id="acdnDtArId01" class="accordion-collapse collapse" aria-labelledby="acdnH01"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {{ __(@$data->data_values->answer) }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xl-5 offset-xl-1 col-md-5">
                <div class="faq-thumb">
                    <img src="{{ getImage('assets/images/frontend/faq/'. @$faq->data_values->faq_image, '535x535') }}"
                         class="w-100"
                         alt="FAQ Image">
                </div>
            </div>
        </div>
    </div>
</section>
