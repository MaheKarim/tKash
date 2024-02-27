@php
    $footer = getContent('contact_us.content', true);
    $socialIcon = getContent('social_icon.element', orderById: true);
@endphp
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
                        <h6 class="footer-item__title">{{ __(@$footer->data_values->title )}}</h6>
                        <p class="footer-item__desc">{{ __(@$footer->data_values->short_details) }}</p>
                        <ul class="social-list">
                            @foreach($socialIcon as $icon)
                                <li class="social-list__item">
                                    <a href="{{ @$icon->data_values->url }}"
                                       class="social-list__link {{ @$icon->data_values->title }} active">
                                        @php echo  @$icon->data_values->social_icon @endphp
                                    </a>
                                </li>
                            @endforeach
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
                            <li class="footer-contact-menu__item"> {{ __(@$footer->data_values->contact_details) }}
                            </li>
                            <li class="footer-contact-menu__item">{{ __(@$footer->data_values->contact_number) }}</li>
                            <li class="footer-contact-menu__item">{{ __(@$footer->data_values->email_address) }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Top End-->

    <!-- bottom Footer -->

</footer>
