@extends($activeTemplate.'layouts.frontend')
@section('content')
    <!--========================== Banner Section Start ==========================-->
    @include($activeTemplate . 'sections.banner')
    <!--========================== Banner Section End ==========================-->

    <!--========================== Coverage Section Start ==========================-->
    @include($activeTemplate . 'sections.coverage')
    <!--========================== Coverage Section End ==========================-->
    <!--========================== About Section Start ==========================-->
    @include($activeTemplate.  'sections.about')

    <!--========================== About Section End ==========================-->

    <!--========================== Feature Section Start ==========================-->
    <section class="feature-section pb-110 bg-img" data-background-image="assets/images/thumbs/feature-bg.png')}}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h2 class="section-heading__title">Our Features</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center g-3">
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="feature-item text-center">
                        <span class="feature-item__icon">
                            <img src="{{ asset('assets/appy/images/icon-img/1.png') }}" alt="">
                        </span>
                        <h6 class="feature-item__title">Accept online bookings</h6>
                        <p class="feature-item__desc">Your own mobile-optimised booking website or integration with
                            your
                            existing site...</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="feature-item text-center">
                        <span class="feature-item__icon">
                            <img src="{{ asset('assets/appy/images/icon-img/2.png') }}" alt="">
                        </span>
                        <h6 class="feature-item__title">Notifications vai sms/email</h6>
                        <p class="feature-item__desc">Your own mobile-optimised booking website or integration with
                            your
                            existing site...</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="feature-item text-center">
                        <span class="feature-item__icon">
                            <img src="{{ asset('assets/appy/images/icon-img/3.png') }}" alt="">
                        </span>
                        <h6 class="feature-item__title">Client & Admin App</h6>
                        <p class="feature-item__desc">Your own mobile-optimised booking website or integration with
                            your
                            existing site...</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="feature-item text-center">
                        <span class="feature-item__icon">
                            <img src="{{ asset('assets/appy/images/icon-img/4.png') }}" alt="">
                        </span>
                        <h6 class="feature-item__title">Accept Payments</h6>
                        <p class="feature-item__desc">Your own mobile-optimised booking website or integration with
                            your
                            existing site...</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="feature-item text-center">
                        <span class="feature-item__icon">
                            <img src="{{ asset('assets/appy/images/icon-img/5.png') }}" alt="">
                        </span>
                        <h6 class="feature-item__title">Integration & API</h6>
                        <p class="feature-item__desc">Your own mobile-optimised booking website or integration with
                            your
                            existing site...</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="feature-item text-center">
                        <span class="feature-item__icon">
                            <img src="{{ asset('assets/appy/images/icon-img/6.png') }}" alt="">
                        </span>
                        <h6 class="feature-item__title">Custom Features</h6>
                        <p class="feature-item__desc">Your own mobile-optimised booking website or integration with
                            your
                            existing site...</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="feature-item text-center">
                        <span class="feature-item__icon">
                            <img src="{{ asset('assets/appy/images/icon-img/7.png') }}" alt="">
                        </span>
                        <h6 class="feature-item__title">Customization</h6>
                        <p class="feature-item__desc">Your own mobile-optimised booking website or integration with
                            your
                            existing site...</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="feature-item text-center">
                        <span class="feature-item__icon">
                            <img src="{{ asset('assets/appy/images/icon-img/8.png') }}" alt="">
                        </span>
                        <h6 class="feature-item__title">Products & Promotions</h6>
                        <p class="feature-item__desc">Your own mobile-optimised booking website or integration with
                            your
                            existing site...</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--========================== Feature Section End ==========================-->

    <!--========================== Video Section Start ==========================-->
    <section class="video-section pb-110 bg-img" data-background-image="assets/images/thumbs/video-bg.png')}}">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-6">
                    <div class="video-content">
                        <h2 class="video-content__title">Online Booking System formal service based industries</h2>
                        <p class="video-content__desc">
                            AppointLab AppoinLab software for the process of scheduling and managing appointments,
                            bookings,
                            and reservations for businesses and organizations. These software tools are used across
                            various
                            industries to automate and organize the appointment-setting process, making it more
                            efficient
                            for both service providers and clients. Here are some key features and benefits commonly
                            associated with appointment software:
                        </p>
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-5 col-md-6">
                    <div class="video-thumb">
                        <img src="{{ asset('assets/appy/images/thumbs/video-thumb.png') }}" alt="">
                        <a href="https://player.vimeo.com/video/665903020?h=2484efd831"
                           class="play-btn popup_video"><i class="icon-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
    <section class="benefit-section pb-110">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-7">
                    <div class="benefit">
                        <h2 class="benefit__title">What is Benefits of <span class="text--base">AppointLab</span>
                            Software
                        </h2>
                        <p class="benefit__desc">
                            AppointLab AppoinLab software for the process of scheduling and managing appointments,
                            bookings,
                            and reservations for businesses
                        </p>
                        <ul class="benefit__list">
                            <li class="benefit__item">
                                <h6 class="title">Time Efficiency</h6>
                                <p class="desc">
                                    Automates appointment scheduling, reducing the need for manual coordination and
                                    communication.
                                </p>
                            </li>
                            <li class="benefit__item">
                                <h6 class="title">Improved Customer Experience</h6>
                                <p class="desc">
                                    Provides a convenient and user-friendly experience for clients, enhancing customer
                                    satisfaction.
                                </p>
                            </li>
                        </ul>
                        <a href="#" class="section-link">See More Benifits</a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-5">
                    <div class="benefit-thumb">
                        <span class="one">
                            <img src="{{ asset('assets/appy/images/thumbs/benefit-01.png') }}" alt="">
                        </span>
                        <span class="two">
                            <img src="{{ asset('assets/appy/images/thumbs/benefit-02.png') }}" alt="">
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
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

