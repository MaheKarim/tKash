<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" type="image/png" href="{{getImage(getFilePath('logoIcon') .'/favicon.png')}}">

    <title> {{ $general->siteName(__($pageTitle ?? '')) }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/global/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/vendor/bootstrap-toggle.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/global/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/global/css/line-awesome.min.css')}}">

    @stack('style-lib')

    <link rel="stylesheet" href="{{asset('assets/admin/css/vendor/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/_app.css')}}">

    @stack('style')
    <link href="{{ asset('assets/adminkit/css/app.css') }}" rel="stylesheet">

</head>

<body>
<div class="wrapper">
    @include($activeTemplate.'partials.agent_sidebar')
    <div class="main">
        @include($activeTemplate.'partials.agent_topbar')
        <main class="content">

            @yield('content')

        </main>
        @include('partials.notify')

        @include($activeTemplate.'partials.footer')
    </div>
</div>
<script src="{{asset('assets/global/js/jquery-3.7.1.min.js')}}"></script>
{{--<script src="{{asset('assets/global/js/bootstrap.bundle.min.js')}}"></script>--}}
<script src="{{asset('assets/admin/js/vendor/bootstrap-toggle.min.js')}}"></script>
<script src="{{asset('assets/admin/js/vendor/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('assets/admin/js/vendor/select2.min.js')}}"></script>
<script src="{{asset('assets/admin/js/app.js')}}"></script>

<script src="{{ asset($activeTemplateTrue.'js/jquery.validate.js') }}"></script>
@stack('script-lib')
@include('partials.plugins')

@stack('script')
<script>
    (function ($) {
        "use strict";
        $(".langSel").on("change", function () {
            window.location.href = "{{ route('home') }}/change/" + $(this).val();
        });

    })(jQuery);
</script>

<script>
    (function ($) {
        "use strict";

        $('form').on('submit', function () {
            if ($(this).valid()) {
                $(':submit', this).attr('disabled', 'disabled');
            }
        });

        var inputElements = $('[type=text],[type=password],select,textarea');
        $.each(inputElements, function (index, element) {
            element = $(element);
            element.closest('.form-group').find('label').attr('for', element.attr('name'));
            element.attr('id', element.attr('name'))
        });

        $.each($('input, select, textarea'), function (i, element) {

            if (element.hasAttribute('required')) {
                $(element).closest('.form-group').find('label').addClass('required');
            }

        });


        $('.showFilterBtn').on('click', function () {
            $('.responsive-filter-card').slideToggle();
        });


        Array.from(document.querySelectorAll('table')).forEach(table => {
            let heading = table.querySelectorAll('thead tr th');
            Array.from(table.querySelectorAll('tbody tr')).forEach((row) => {
                Array.from(row.querySelectorAll('td')).forEach((colum, i) => {
                    colum.setAttribute('data-label', heading[i].innerText)
                });
            });
        });

    })(jQuery);
</script>
<script src="{{ asset('assets/adminkit/js/app.js') }}"></script>

</body>

</html>
