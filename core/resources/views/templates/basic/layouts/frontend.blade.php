<!-- Header -->
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>{{ $general->siteName(__($pageTitle)) }}</title>
    @include($activeTemplate. 'partials.frontend_style')
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
            <a class="navbar-brand logo" href="{{ url('/') }}"><img
                    src="{{ siteLogo() }}" alt="site_logo"></a>
            <button class="navbar-toggler header-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span id="hiddenNav"><i class="las la-bars"></i></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-menu ms-auto align-items-lg-center">
                    <li class="nav-item header-access-button d-block d-lg-none text-end">
                        <a class="btn btn--base rounded account-btn" href="{{ url('/user/login') }}"><i
                                class="icon-user"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>

                    @php
                        $pages = App\Models\Page::where('tempname',$activeTemplate)->where('is_default',Status::NO)->get();
                    @endphp
                    @foreach($pages as $k => $data)
                        <li class="nav-item"><a href="{{route('pages',[$data->slug])}}"
                                                class="nav-link">{{__($data->name)}}</a></li>
                    @endforeach

                    <li class="nav-item header-access-button">
                        <a class="btn btn--base rounded account-btn d-none d-lg-block"
                           href="{{ url('/user/login') }}"><i
                                class="icon-user"></i></a>
                        <a href="{{ url('/user/register') }}" class="btn btn--base">Get Started Now</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- ==================== Header End Here ==================== -->


@yield('content')

<!-- ==================== Footer Start Here ==================== -->
@include($activeTemplate . 'partials.frontend_footer')

<!-- ==================== Footer End Here ==================== -->

@include($activeTemplate. 'partials.frontend_script')

@stack('script')
</body>

</html>
