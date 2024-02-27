@php
    /*
     * singleQuery True / false
     * By default singleQuery is false , If you want only one row you have to set `True`
     * limit to fetch record of data
     */
    $video = getContent('video.content', true);
@endphp
<section class="video-section pb-110 bg-img" data-background-image="assets/images/thumbs/video-bg.png')}}">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-6">
                <div class="video-content">
                    <h2 class="video-content__title">{{ __(@$video->data_values->heading) }}</h2>
                    <p class="video-content__desc"> {{ __(@$video->data_values->subheading) }}
                    </p>
                </div>
            </div>
            <div class="col-xl-5 offset-xl-1 col-lg-5 col-md-6">
                <div class="video-thumb">
                    <img src="{{ asset('assets/appy/images/thumbs/video-thumb.png') }}" alt="">
                    <a href="{{ @$video->data_values->video_link }}"
                       class="play-btn popup_video"><i class="icon-play"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
