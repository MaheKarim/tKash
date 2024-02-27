@php
    $beneficial = getContent('beneficial.content', true);
    $beneficialElement = getContent('beneficial.element', orderById: true);
@endphp
<section class="beneficial-section py-110 bg-img"
         data-background-image="assets/images/thumbs/beneficial-bg.png')}}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-9">
                <div class="section-heading">
                    <h2 class="section-heading__title">{{ __(@$beneficial->data_values->heading) }}</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center g-3">
            @foreach($beneficialElement as $data)
                <div class="col-xl-3 col-lg-4 col-sm-6 col-xsm-6">
                    <div class="beneficial-item text-center">
                        <div class="beneficial-item__thumb">
                            <img
                                src="{{ getImage('assets/images/frontend/beneficial/' . @$data->data_values->beneficial_images_1 ) }}"
                                alt="Beneficial Image">
                        </div>
                        <h6 class="beneficial-item__title">{{ __(@$data->data_values->heading) }}</h6>
                    </div>
                </div>
            @endforeach
            <div class="col-12 text-center">
                <a href="#" class="section-link">See More Benifits</a>
            </div>
        </div>
    </div>
</section>
