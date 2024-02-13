<!-- Header -->
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>{{ $general->siteName(__($pageTitle)) }}</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/appy/images/logo/favicon.png') }}">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/appy/css/bootstrap.min.css') }}">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{ asset('assets/appy/css/fontawesome-all.min.css') }}">
    <!-- Line awesome -->
    <link rel="stylesheet" href="{{ asset('assets/appy/css/line-awesome.min.css') }}">
    <!-- Custom Icons -->
    <link rel="stylesheet" href="{{ asset('assets/appy/css/appoinlab-icons.css') }}">
    <!-- Lightcase -->
    <link rel="stylesheet" href="{{ asset('assets/appy/css/lightcase.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('assets/appy/css/datepicker.min.css') }}">
    <!-- Calendar -->
    <link rel="stylesheet" href="{{ asset('assets/appy/css/jsRapCalendar.css') }}">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('assets/appy/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/appy/css/owl.carousel.min.css') }}">
    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('assets/appy/css/main.css') }}">

    @stack('style')
</head>

<body>

<!--==================== Preloader Start ====================-->
<div class="preloader">
    <div class="loader-p"></div>
</div>
<!--==================== Preloader End ====================-->

<!--==================== Overlay Start ====================-->
<div class="body-overlay"></div>
<!--==================== Overlay End ====================-->

<!--==================== Sidebar Overlay End ====================-->
<div class="sidebar-overlay"></div>
<!--==================== Sidebar Overlay End ====================-->

<!-- ==================== Scroll to Top End Here ==================== -->
<a class="scroll-top"><i class="las la-long-arrow-alt-up"></i></a>
<!-- ==================== Scroll to Top End Here ==================== -->
<!-- ==================== Header Start Here ==================== -->
<header class="header" id="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand logo" href="index.html"><img
                    src="{{ asset('assets/appy/images/logo/logo.png') }}" alt=""></a>
            <button class="navbar-toggler header-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span id="hiddenNav"><i class="las la-bars"></i></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-menu ms-auto align-items-lg-center">
                    <li class="nav-item header-access-button d-block d-lg-none text-end">
                        <a class="btn btn--base rounded account-btn" href="login.html"><i class="icon-user"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Benefit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Beneficial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Faq </a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Blog <span class="nav-item__icon"><i class="las la-angle-down"></i></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-menu__list"><a class="dropdown-item dropdown-menu__link" href="blog.html">Blog</a></li>
                        <li class="dropdown-menu__list"><a class="dropdown-item dropdown-menu__link" href="#">Blog Details</a>
                        </li>
                    </ul>
                </li>  -->
                    <li class="nav-item header-access-button">
                        <a class="btn btn--base rounded account-btn d-none d-lg-block" href="login.html"><i
                                class="icon-user"></i></a>
                        <a href="#" class="btn btn--base">Get Started Now</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- ==================== Header End Here ==================== -->


<!--========================== Banner Section Start ==========================-->
<section class="banner-section bg-img" data-background-image="assets/images/thumbs/banner-bg.png">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-11 text-center">
                <div class="banner-content">
                        <span class="banner-shape one"><img src="{{ asset('assets/appy/images/shapes/1.png') }}"
                                                            alt=""></span>
                    <span class="banner-shape two"><img src="{{ asset('assets/appy/images/shapes/3.png') }}"
                                                        alt=""></span>
                    <span class="banner-shape three"><img src="{{ asset('assets/appy/images/shapes/4.png') }}"
                                                          alt=""></span>
                    <h1 class="banner-content__title">
                        <span class="text--base">AppoinLab</span> Your Appoinment Process with Our Software
                        Template
                    </h1>
                    <p class="banner-content__desc">
                        Begin making your fantasy appointment with a definitive multi vendor appointment also you
                        can
                        unlimited project like you want.
                    </p>
                </div>
                <div class="banner-screenshot">
                        <span class="banner-shape four"><img src="{{ asset('assets/appy/images/shapes/2.png') }}"
                                                             alt=""></span>
                    <img src="{{ asset('assets/appy/images/thumbs/banner-screenshot-2.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!--========================== Banner Section End ==========================-->

<!--========================== Coverage Section Start ==========================-->
<div class="client pt-50 ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h5 class="section-heading__title">Trusted by <span class="text--base">95,000+</span>
                        businesses
                    </h5>
                </div>
            </div>
        </div>
        <div class="client_slider owl-carousel">
            <img src="{{ asset('assets/appy/images/clients/client-02.png') }}" alt="">
            <img src="{{ asset('assets/appy/images/clients/client-03.png') }}" alt="">
            <img src="{{ asset('assets/appy/images/clients/client-04.png') }}" alt="">
            <img src="{{ asset('assets/appy/images/clients/client-01.png') }}" alt="">
            <img src="{{ asset('assets/appy/images/clients/client-05.png') }}" alt="">
            <img src="{{ asset('assets/appy/images/clients/client-06.png') }}" alt="">
            <img src="{{ asset('assets/appy/images/clients/client-03.png') }}" alt="">
        </div>
    </div>
</div>
<!--========================== Coverage Section End ==========================-->
<!--========================== About Section Start ==========================-->
<section class="about-section py-110 bg-img" data-background-image="assets/images/thumbs/about-bg.png')}}">
    <div class="container">
        <div class="row align-items-center flex-wrap-reverse">
            <div class="col-xl-6 col-lg-5">
                <div class="about-thumb">
                    <img src="{{ asset('assets/appy/images/thumbs/about.png') }}" alt="">
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <div class="about-content">
                    <h2 class="about-content__title">Best Sass Software For Your Appointment Service </h2>
                    <p class="about-content__desc">
                        AppoinLab appoinLab software for the process of scheduling and managing appointments,
                        bookings,
                        and reservations for businesses and organizations. These software tools are used across
                        various
                        industries to automate and organize the appointment-setting process, making it more
                        efficient
                        for both service providers and clients. Here are some key features and benefits commonly
                        associated with appointment software:
                    </p>
                    <ul class="about-content__list">
                        <li class="about-content__list-item">
                                <span class="icon">
                                    <i class="icon-smile"></i>
                                </span>
                            <div class="content">
                                <h3 class="number">98%</h3>
                                <span class="desc">Customer Satisfaction</span>
                            </div>
                        </li>
                        <li class="about-content__list-item">
                                <span class="icon">
                                    <i class="icon-subscription-member"></i>
                                </span>
                            <div class="content">
                                <h3 class="number">15<sub>M</sub></h3>
                                <span class="desc">Subscription Member</span>
                            </div>
                        </li>
                        <li class="about-content__list-item">
                                <span class="icon">
                                    <i class="icon-save-cost"></i>
                                </span>
                            <div class="content">
                                <h3 class="number">40%</h3>
                                <span class="desc">Save Cost</span>
                            </div>
                        </li>
                        <li class="about-content__list-item">
                                <span class="icon">
                                    <i class="icon-subscription-member"></i>
                                </span>
                            <div class="content">
                                <h3 class="number">15<sub>M</sub></h3>
                                <span class="desc">Subscription Member</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
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
@include('templates.appy.sections.testimonial')
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

<!-- Footer -->

<!-- ==================== Footer Start Here ==================== -->
<footer class="footer-area">
        <span class="footer-area__shape"><img src="{{ asset('assets/appy/images/shapes/5.png') }}"
                                              alt=""></span>
    <span class="footer-area__shape two"><img src="{{ asset('assets/appy/images/shapes/6.png') }}"
                                              alt=""></span>
    <div class="footer-area__inner pt-110">
        <div class="container">
            <div class="row gy-4">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-msm-6">
                    <div class="footer-item">
                        <h6 class="footer-item__title">About AppointLab</h6>
                        <p class="footer-item__desc">We will assist you in becoming more successful.</p>
                        <ul class="social-list">
                            <li class="social-list__item"><a href="#"
                                                             class="social-list__link facebook active"><i
                                        class="icon-facebook"></i></a>
                            </li>
                            <li class="social-list__item"><a href="#" class="social-list__link twitter"> <i
                                        class="icon-twitter"></i></a></li>
                            <li class="social-list__item"><a href="#" class="social-list__link linkedin">
                                    <i class="icon-linkedin"></i></a></li>
                            <li class="social-list__item"><a href="#" class="social-list__link instagram">
                                    <i class="icon-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-msm-6">
                    <div class="footer-item">
                        <h6 class="footer-item__title">Features</h6>
                        <ul class="footer-menu">
                            <li class="footer-menu__item"><a href="#" class="footer-menu__link">Accept
                                    Online</a></li>
                            <li class="footer-menu__item"><a href="#" class="footer-menu__link">Booking</a>
                            </li>
                            <li class="footer-menu__item"><a href="#"
                                                             class="footer-menu__link">Notifications Via
                                    SMS</a></li>
                            <li class="footer-menu__item"><a href="#" class="footer-menu__link">Integration
                                    & API</a>
                            </li>
                            <li class="footer-menu__item"><a href="#" class="footer-menu__link">Client &
                                    Admin App</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-msm-6">
                    <div class="footer-item">
                        <h6 class="footer-item__title">Learn More</h6>
                        <ul class="footer-menu">
                            <li class="footer-menu__item"><a href="#" class="footer-menu__link">How to
                                    work</a></li>
                            <li class="footer-menu__item"><a href="#" class="footer-menu__link">Why we
                                    are</a></li>
                            <li class="footer-menu__item"><a href="#" class="footer-menu__link">Coverage
                                    area</a></li>
                            <li class="footer-menu__item"><a href="#" class="footer-menu__link">Common</a>
                            </li>
                            <li class="footer-menu__item"><a href="#"
                                                             class="footer-menu__link">Question</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-msm-6">
                    <div class="footer-item">
                        <h6 class="footer-item__title">Resources</h6>
                        <ul class="footer-menu">
                            <li class="footer-menu__item"><a href="#" class="footer-menu__link">Help
                                    Center</a></li>
                            <li class="footer-menu__item"><a href="#" class="footer-menu__link">Our
                                    Stories</a></li>
                            <li class="footer-menu__item"><a href="#" class="footer-menu__link">What is
                                    funding</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-5 col-sm-6 col-msm-6">
                    <div class="footer-item">
                        <h6 class="footer-item__title">Contact Info</h6>
                        <ul class="footer-contact-menu">
                            <li class="footer-contact-menu__item">5617 Glassford Street New York, NY 10000, USA
                            </li>
                            <li class="footer-contact-menu__item">123+9999 - 8888 - 5555</li>
                            <li class="footer-contact-menu__item">contactinfo@gmail.com</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Top End-->

    <!-- bottom Footer -->
    <div class="bottom-footer py-3">
        <div class="container">
            <div class="text-center">
                <p class="bottom-footer__text">Copyright &copy; 2023 appointLab All Right Reserved</p>
            </div>
        </div>
    </div>
</footer>
<!-- ==================== Footer End Here ==================== -->
<!-- Jquery js -->
<script src="{{ asset('assets/appy/js/jquery-3.6.3.min.js') }}"></script>
<!-- Bootstrap Bundle Js -->
<script src="{{ asset('assets/appy/js/boostrap.bundle.min.js') }}"></script>
<!-- Owl Carousel js -->
<script src="{{ asset('assets/appy/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/appy/js/owl.carousel.filter.js') }}"></script>
<!-- Date Picker js -->
<script src="{{ asset('assets/appy/js/datepicker.min.js') }}"></script>
<script src="{{ asset('assets/appy/js/datepicker.en.js') }}"></script>
<!-- Calendar js -->
<script src="{{ asset('assets/appy/js/jsRapCalendar.js') }}"></script>
<!-- Lightcase js -->
<script src="{{ asset('assets/appy/js/lightcase.js') }}"></script>
<!-- Viewport js -->
<script src="{{ asset('assets/appy/js/viewport.jquery.js') }}"></script>

<!-- main js -->
<script src="{{ asset('assets/appy/js/main.js') }}"></script>

@stack('script')
</body>

</html>
