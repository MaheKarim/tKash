@extends($activeTemplate.'layouts.frontend')
@section('content')
    <!--========================== Banner Section Start ==========================-->
    @include($activeTemplate . 'sections.banner')
    <!--========================== Banner Section End ==========================-->

    <!--========================== Coverage Section Start ==========================-->
    @include($activeTemplate . 'sections.coverage')
    <!--========================== Coverage Section End ==========================-->
    <!--========================== About Section Start ==========================-->
    @include($activeTemplate . 'sections.about')
    <!--========================== About Section End ==========================-->

    <!--========================== Feature Section Start ==========================-->
    @include($activeTemplate . 'sections.feature')
    <!--========================== Feature Section End ==========================-->

    <!--========================== Video Section Start ==========================-->
    @include($activeTemplate . 'sections.video')
    <!--========================== Video Section End ==========================-->

    <!--========================== Pricing Section Start ==========================-->
    <section class="pricing-section pb-110">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-heading">
                        <h2 class="section-heading__title">Our Pricing Plan</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center g-3">
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="pricing-item">
                        <div class="pricing-item__heading bg-img"
                             data-background-image="assets/appy/images/thumbs/pricing-header-bg.png">
                            <h5 class="pricing-item__category">Basic</h5>
                            <h3 class="pricing-item__price">$8.25<sub>/month</sub></h3>
                        </div>
                        <div class="pricing-item__content">
                            <ul class="pricing-item__list">
                                <li class="pricing-item__item">Online bookings for your clients</li>
                                <li class="pricing-item__item">Manual bookings for you</li>
                                <li class="pricing-item__item">Mobile responsive booking website</li>
                                <li class="pricing-item__item">Booking website in clients time zone</li>
                                <li class="pricing-item__item">Bookings via Facebook Page</li>
                                <li class="pricing-item__item">intergration using iframe</li>
                                <li class="pricing-item__item">website can be disabled</li>
                            </ul>
                            <a href="#" class="btn btn-outline--base">Get Started Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="pricing-item">
                        <div class="pricing-item__heading bg-img"
                             data-background-image="assets/appy/images/thumbs/pricing-header-bg.png">
                            <h5 class="pricing-item__category">Standard</h5>
                            <h3 class="pricing-item__price">$24.9<sub>/month</sub></h3>
                        </div>
                        <div class="pricing-item__content">
                            <ul class="pricing-item__list">
                                <li class="pricing-item__item">Online bookings for your clients</li>
                                <li class="pricing-item__item">Manual bookings for you</li>
                                <li class="pricing-item__item">Mobile responsive booking website</li>
                                <li class="pricing-item__item">Booking website in clients time zone</li>
                                <li class="pricing-item__item">Bookings via Facebook Page</li>
                                <li class="pricing-item__item">intergration using iframe</li>
                                <li class="pricing-item__item">website can be disabled</li>
                            </ul>
                            <a href="#" class="btn btn-outline--base">Get Started Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="pricing-item">
                        <div class="pricing-item__heading bg-img"
                             data-background-image="assets/appy/images/thumbs/pricing-header-bg.png">
                            <h5 class="pricing-item__category">Premium</h5>
                            <h3 class="pricing-item__price">$49.5<sub>/month</sub></h3>
                        </div>
                        <div class="pricing-item__content">
                            <ul class="pricing-item__list">
                                <li class="pricing-item__item">Online bookings for your clients</li>
                                <li class="pricing-item__item">Manual bookings for you</li>
                                <li class="pricing-item__item">Mobile responsive booking website</li>
                                <li class="pricing-item__item">Booking website in clients time zone</li>
                                <li class="pricing-item__item">Bookings via Facebook Page</li>
                                <li class="pricing-item__item">intergration using iframe</li>
                                <li class="pricing-item__item">website can be disabled</li>
                            </ul>
                            <a href="#" class="btn btn-outline--base">Get Started Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="pricing-item">
                        <div class="pricing-item__heading bg-img"
                             data-background-image="assets/appy/images/thumbs/pricing-header-bg.png">
                            <h5 class="pricing-item__category">Premium Pro</h5>
                            <h3 class="pricing-item__price">$85.9<sub>/month</sub></h3>
                        </div>
                        <div class="pricing-item__content">
                            <ul class="pricing-item__list">
                                <li class="pricing-item__item">Online bookings for your clients</li>
                                <li class="pricing-item__item">Manual bookings for you</li>
                                <li class="pricing-item__item">Mobile responsive booking website</li>
                                <li class="pricing-item__item">Booking website in clients time zone</li>
                                <li class="pricing-item__item">Bookings via Facebook Page</li>
                                <li class="pricing-item__item">intergration using iframe</li>
                                <li class="pricing-item__item">website can be disabled</li>
                            </ul>
                            <a href="#" class="btn btn-outline--base">Get Started Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--========================== Pricing Section End ==========================-->

    <!--========================== Benefit Section Start ==========================-->
    @include($activeTemplate. 'sections.benefit')
    <!--========================== Benefit Section End ==========================-->

    <!--========================== Beneficial Section Start ==========================-->
    <section class="beneficial-section py-110 bg-img"
             data-background-image="assets/images/thumbs/beneficial-bg.png')}}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-sm-9">
                    <div class="section-heading">
                        <h2 class="section-heading__title">Who will be Beneficial by this software</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center g-3">
                <div class="col-xl-3 col-lg-4 col-sm-6 col-xsm-6">
                    <div class="beneficial-item text-center">
                        <div class="beneficial-item__thumb">
                            <img src="{{ asset('assets/appy/images/thumbs/beneficial-01.png') }}" alt="">
                        </div>
                        <h6 class="beneficial-item__title">Doctor & Healthcare Provider</h6>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 col-xsm-6">
                    <div class="beneficial-item text-center">
                        <div class="beneficial-item__thumb">
                            <img src="{{ asset('assets/appy/images/thumbs/beneficial-02.png') }}" alt="">
                        </div>
                        <h6 class="beneficial-item__title">Business Consultants</h6>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 col-xsm-6">
                    <div class="beneficial-item text-center">
                        <div class="beneficial-item__thumb">
                            <img src="{{ asset('assets/appy/images/thumbs/beneficial-03.png') }}" alt="">
                        </div>
                        <h6 class="beneficial-item__title">Freelancers</h6>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 col-xsm-6">
                    <div class="beneficial-item text-center">
                        <div class="beneficial-item__thumb">
                            <img src="{{ asset('assets/appy/images/thumbs/beneficial-04.png') }}" alt="">
                        </div>
                        <h6 class="beneficial-item__title">Lawyers & Attorneys</h6>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 col-xsm-6">
                    <div class="beneficial-item text-center">
                        <div class="beneficial-item__thumb">
                            <img src="{{ asset('assets/appy/images/thumbs/beneficial-05.png') }}" alt="">
                        </div>
                        <h6 class="beneficial-item__title">Consultants</h6>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 col-xsm-6">
                    <div class="beneficial-item text-center">
                        <div class="beneficial-item__thumb">
                            <img src="{{ asset('assets/appy/images/thumbs/beneficial-06.png') }}" alt="">
                        </div>
                        <h6 class="beneficial-item__title">Professional Trainer</h6>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 col-xsm-6">
                    <div class="beneficial-item text-center">
                        <div class="beneficial-item__thumb">
                            <img src="{{ asset('assets/appy/images/thumbs/beneficial-07.png') }}" alt="">
                        </div>
                        <h6 class="beneficial-item__title">Financial Advisor</h6>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 col-xsm-6">
                    <div class="beneficial-item text-center">
                        <div class="beneficial-item__thumb">
                            <img src="{{ asset('assets/appy/images/thumbs/beneficial-08.png') }}" alt="">
                        </div>
                        <h6 class="beneficial-item__title">Tutors & Teachers</h6>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <a href="#" class="section-link">See More Benifits</a>
                </div>
            </div>
        </div>
    </section>
    <!--========================== Beneficial Section End ==========================-->

    <!--========================== Testimonials Section Start ==========================-->
    @include($activeTemplate.'sections.testimonial')
    <!--========================== Testimonials Section End ==========================-->
    <!--========================== FAQ's Section Start ==========================-->
    <section class="faq-section pb-110 bg-img" data-background-image="assets/images/thumbs/faq-bg.png')}}">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-6 col-md-7">
                    <div class="faq-content">
                        <h2 class="faq-content__title">What`s People Want to know About Us</h2>
                        <div class="accordion custom--accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h6 class="accordion-header" id="acdnH01">
                                    <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#acdnDtArId01"
                                            aria-expanded="false" aria-controls="acdnDtArId01">
                                        How can You Use Our Software ?
                                    </button>
                                </h6>
                                <div id="acdnDtArId01" class="accordion-collapse collapse" aria-labelledby="acdnH01"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        An appointment system, also known as an appointment scheduling system, is a
                                        software
                                        solution or mechanism designed to facilitate the process of scheduling and
                                        managing
                                        appointments, bookings, or reservations.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h6 class="accordion-header" id="acdnH02">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#acdnDtArId02" aria-expanded="true"
                                            aria-controls="acdnDtArId02">
                                        What is Appointment System?
                                    </button>
                                </h6>
                                <div id="acdnDtArId02" class="accordion-collapse collapse show"
                                     aria-labelledby="acdnH02" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        An appointment system, also known as an appointment scheduling system, is a
                                        software
                                        solution or mechanism designed to facilitate the process of scheduling and
                                        managing
                                        appointments, bookings, or reservations.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h6 class="accordion-header" id="acdnH03">
                                    <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#acdnDtArId03"
                                            aria-expanded="false" aria-controls="acdnDtArId03">
                                        Our Vision?
                                    </button>
                                </h6>
                                <div id="acdnDtArId03" class="accordion-collapse collapse" aria-labelledby="acdnH03"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        An appointment system, also known as an appointment scheduling system, is a
                                        software
                                        solution or mechanism designed to facilitate the process of scheduling and
                                        managing
                                        appointments, bookings, or reservations.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h6 class="accordion-header" id="acdnH04">
                                    <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#acdnDtArId04"
                                            aria-expanded="false" aria-controls="acdnDtArId04">
                                        How can You Use Our Software ?
                                    </button>
                                </h6>
                                <div id="acdnDtArId04" class="accordion-collapse collapse" aria-labelledby="acdnH04"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        An appointment system, also known as an appointment scheduling system, is a
                                        software
                                        solution or mechanism designed to facilitate the process of scheduling and
                                        managing
                                        appointments, bookings, or reservations.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-md-5">
                    <div class="faq-thumb">
                        <img src="{{ asset('assets/appy/images/thumbs/faq-thumb.png') }}" class="w-100"
                             alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--========================== FAQ's Section End ==========================-->

@endsection

