@php
    $testimonial = getContent('testimonial.content',true);
    $getTestimonial = $testimonial->data_values;
@endphp
    <!--========================== Testimonials Section Start ==========================-->

<section class="testimonials py-110">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <h2 class="section-heading__title">What Say`s Our Happy Client </h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center g-3">
            <div class="col-lg-6 col-md-10">
                <div class="testimonail-card">
                    <div class="testimonail-card__top">
                        <div class="rating-wrapper">
                            <ul class="rating-list">
                                <li class="rating-list__item"><i class="icon-star"></i></li>
                                <li class="rating-list__item"><i class="icon-star"></i></li>
                                <li class="rating-list__item"><i class="icon-star"></i></li>
                                <li class="rating-list__item"><i class="icon-star"></i></li>
                                <li class="rating-list__item"><i class="icon-star"></i></li>
                            </ul>
                            <h6 class="text">For {{ @$getTestimonial->for }}</h6>
                        </div>
                        <h6 class="testimonail-card__name">By <span
                                class="text--base">{{ @$getTestimonial->author_name }}</span>
                        </h6>
                    </div>
                    <p class="testimonail-card__desc">
                        {{ @$getTestimonial->testimonial }}
                    </p>
                </div>
            </div>
            <div class="col-lg-6 col-md-10">
                <div class="testimonail-card">
                    <div class="testimonail-card__top">
                        <div class="rating-wrapper">
                            <ul class="rating-list">
                                <li class="rating-list__item"><i class="icon-star"></i></li>
                                <li class="rating-list__item"><i class="icon-star"></i></li>
                                <li class="rating-list__item"><i class="icon-star"></i></li>
                                <li class="rating-list__item"><i class="icon-star"></i></li>
                                <li class="rating-list__item"><i class="icon-star"></i></li>
                            </ul>
                            <h6 class="text">For Flexibility</h6>
                        </div>
                        <h6 class="testimonail-card__name">By <span class="text--base">Martin Hook</span></h6>
                    </div>
                    <p class="testimonail-card__desc">
                        This app has many features in it to handle a solid appointment is great.you will be able to
                        handle it. I went to support a few times and they alwaysded quickly,There is always space to
                        grow an improve.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 col-md-10">
                <div class="testimonail-card">
                    <div class="testimonail-card__top">
                        <div class="rating-wrapper">
                            <ul class="rating-list">
                                <li class="rating-list__item"><i class="icon-star"></i></li>
                                <li class="rating-list__item"><i class="icon-star"></i></li>
                                <li class="rating-list__item"><i class="icon-star"></i></li>
                                <li class="rating-list__item"><i class="icon-star"></i></li>
                                <li class="rating-list__item"><i class="icon-star"></i></li>
                            </ul>
                            <h6 class="text">For Flexibility</h6>
                        </div>
                        <h6 class="testimonail-card__name">By <span class="text--base">Martin Hook</span></h6>
                    </div>
                    <p class="testimonail-card__desc">
                        This app has many features in it to handle a solid appointment is great.you will be able to
                        handle it. I went to support a few times and they alwaysded quickly,There is always space to
                        grow an improve.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 col-md-10">
                <div class="testimonail-card">
                    <div class="testimonail-card__top">
                        <div class="rating-wrapper">
                            <ul class="rating-list">
                                <li class="rating-list__item"><i class="icon-star"></i></li>
                                <li class="rating-list__item"><i class="icon-star"></i></li>
                                <li class="rating-list__item"><i class="icon-star"></i></li>
                                <li class="rating-list__item"><i class="icon-star"></i></li>
                                <li class="rating-list__item"><i class="icon-star"></i></li>
                            </ul>
                            <h6 class="text">For Flexibility</h6>
                        </div>
                        <h6 class="testimonail-card__name">By <span class="text--base">Martin Hook</span></h6>
                    </div>
                    <p class="testimonail-card__desc">
                        This app has many features in it to handle a solid appointment is great.you will be able to
                        handle it. I went to support a few times and they alwaysded quickly,There is always space to
                        grow an improve.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--========================== Testimonials Section End ==========================-->
