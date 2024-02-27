@php
    $coverage = getContent('coverage.content', true);
    $coverageImages  = getContent('coverage.element', orderById: true);
@endphp

<div class="client pt-50 ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h5 class="section-heading__title">{{ @$coverage->data_values->heading }}
                        <span class="text--base">{{ @$coverage->data_values->color_content }}</span>
                        {{ @$coverage->data_values->subheading }}
                    </h5>
                </div>
            </div>
        </div>
        <div class="client_slider owl-carousel">
            @foreach($coverageImages as $key)
                <img
                    src="{{ getImage('assets/images/frontend/coverage/'.@$key->data_values->coverage_images, '170x35') }}"
                    alt="Coverage Image">
            @endforeach
        </div>
    </div>
</div>
