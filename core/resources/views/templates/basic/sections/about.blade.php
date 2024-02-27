@php
    $about = getContent('about.content', true);
    $aboutElement = getContent('about.element', orderById: true)
@endphp

<section class="about-section py-110 bg-img" data-background-image="assets/images/thumbs/about-bg.png')}}">
    <div class="container">
        <div class="row align-items-center flex-wrap-reverse">
            <div class="col-xl-6 col-lg-5">
                <div class="about-thumb">
                    <img
                        src="{{ getImage('assets/images/frontend/about/'.@$about->data_values->about_image, '650x650') }}"
                        alt="About Image">
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <div class="about-content">
                    <h2 class="about-content__title">{{ __(@$about->data_values->heading) }} </h2>
                    <p class="about-content__desc">
                        {{ __(@$about->data_values->description) }}
                    </p>
                    <ul class="about-content__list">
                        @foreach($aboutElement as $data)

                            <li class="about-content__list-item">
                                <span class="icon">
                                    @php echo @$data->data_values->title @endphp
                                </span>
                                <div class="content">
                                    <h3 class="number">{{ __(@$data->data_values->heading) }}</h3>
                                    <span class="desc">{{ __(@$data->data_values->subheading) }}</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
