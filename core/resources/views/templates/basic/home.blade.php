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
    @include($activeTemplate.'sections.beneficial')
    <!--========================== Beneficial Section End ==========================-->

    <!--========================== Testimonials Section Start ==========================-->
    @include($activeTemplate.'sections.testimonial')
    <!--========================== Testimonials Section End ==========================-->
    <!--========================== FAQ's Section Start ==========================-->
    @include($activeTemplate . 'sections.faq')
    <!--========================== FAQ's Section End ==========================-->

@endsection

