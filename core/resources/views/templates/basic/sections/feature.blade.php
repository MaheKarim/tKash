@php
    /*
     *   singleQuery True / false
     * By default singleQuery is false , If you want only one row you have to set `True`
     *
     * limit to fetch record of data
     */

     $feature = getContent('feature.content', true);
     $featureList = getContent('feature.element', orderById: true);
@endphp

<section class="feature-section pb-110 bg-img" data-background-image="assets/images/thumbs/feature-bg.png')}}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <h2 class="section-heading__title">{{ __(@$feature->data_values->heading) }}</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center g-3">
            @foreach($featureList as $data)
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="feature-item text-center">
                        <span class="feature-item__icon">
                            <img
                                src="{{ getImage('assets/images/frontend/feature/'.@$data->data_values->feature_image) }}"
                                alt="">
                        </span>
                        <h6 class="feature-item__title">{{ __(@$data->data_values->heading) }}</h6>
                        <p class="feature-item__desc">{{ __(@$data->data_values->subheading) }}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
