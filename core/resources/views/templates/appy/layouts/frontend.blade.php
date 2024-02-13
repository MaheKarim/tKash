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
@yield('content')

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
