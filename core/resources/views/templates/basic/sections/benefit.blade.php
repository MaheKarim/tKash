@php
    $benefit = getContent('benefit.content', true);
    $benefitElement = getContent('benefit.element', orderById: true);
@endphp

<section class="benefit-section pb-110">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-7">
                <div class="benefit">
                    <h2 class="benefit__title">{{ __(@$benefit->data_values->heading_start) }} <span
                            class="text--base">{{ __(@$benefit->data_values->color_heading) }}</span>
                        {{ __(@$benefit->data_values->heading_end) }}
                    </h2>
                    <p class="benefit__desc">
                        {{ __(@$benefit->data_values->subheading) }}
                    </p>
                    <ul class="benefit__list">
                        @foreach($benefitElement as $data)
                            <li class="benefit__item">
                                <h6 class="title">{{ __(@$data->data_values->heading) }}</h6>
                                <p class="desc">
                                    {{ __(@$data->data_values->subheading) }}
                                </p>
                            </li>
                        @endforeach
                    </ul>
                    <a href="#" class="section-link">See More Benifits</a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-5">
                <div class="benefit-thumb">
                        <span class="one">
                            <img
                                src="{{ getImage('assets/images/frontend/benefit/'.@$benefit->data_values->benefit_images_1, "423x423") }}"
                                alt="Benefit Images">
                        </span>
                    <span class="two">
                            <img
                                src="{{ getImage('assets/images/frontend/benefit/'.@$benefit->data_values->benefit_images_2, "423x423") }}"
                                alt="Benefit Images">
                        </span>
                </div>
            </div>
        </div>
    </div>
</section>

