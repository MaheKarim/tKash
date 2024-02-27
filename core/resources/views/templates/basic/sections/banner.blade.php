@php
    /*
     * singleQuery True / false
     * By default singleQuery is false , If you want only one row you have to set `True`
     * limit to fetch record of data
     */
    $banner = getContent('banner.content', true, true);
@endphp
<section class="banner-section bg-img" data-background-image="assets/images/thumbs/banner-bg.png">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-11 text-center">
                <div class="banner-content">
                    <span class="banner-shape one"><img src="{{ asset('assets/appy/images/shapes/1.png') }}" alt=""></span>
                    <span class="banner-shape two"><img src="{{ asset('assets/appy/images/shapes/3.png') }}" alt=""></span>
                    <span class="banner-shape three"><img src="{{ asset('assets/appy/images/shapes/4.png') }}" alt=""></span>
                    <h1 class="banner-content__title">
                        <span class="text--base">{{ @$banner->data_values->title }}</span>
                        {{ @$banner->data_values->heading }}
                    </h1>
                    <p class="banner-content__desc">
                        {{ @$banner->data_values->subheading }}
                    </p>
                </div>
                <div class="banner-screenshot">
                        <span class="banner-shape four"><img src="{{ asset('assets/appy/images/shapes/2.png') }}"
                                                             alt=""></span>
                    <img src="{{ getImage('assets/images/frontend/banner/'.@$banner->data_values->banner_image, '1028x735') }}" alt="Banner Image">
                </div>
            </div>
        </div>
    </div>
</section>
