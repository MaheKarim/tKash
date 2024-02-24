@extends($activeTemplate.'layouts.app')

@section('contents')
    <div class="card">
        <form action="{{route('user.cashOut.store')}}" method="post">
            @csrf
            <input type="hidden" name="currency">

            <div class="card custom--card">
                <div class="card-header">
                    <h5 class="card-title">@lang('Cashout')</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">@lang('Enter Agent Username')</label>
                        <input type="text" class="form--control form-control" name="username" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">@lang('Amount')</label>
                        <div class="input-group">
                            <input type="number" step="any" name="amount" class="form-control "
                                   value="{{ old('amount') }}"
                                   data-resource="{{ $data }}" autocomplete="off"
                                   required>
                            <span class="input-group-text">{{ $general->cur_text }}</span>
                        </div>
                    </div>
                    <div class="mt-3 preview-details d-none">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>@lang('Limit')</span>
                                <span><span class="min fw-bold">0</span> {{__($general->cur_text)}} - <span
                                        class="max fw-bold">0</span> {{__($general->cur_text)}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>@lang('Charge')</span>
                                <span><span class="charge fw-bold">0</span> {{__($general->cur_text)}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>@lang('Payable')</span> <span><span class="payable fw-bold"> 0</span> {{__($general->cur_text)}}</span>
                            </li>
                            <li class="list-group-item justify-content-between d-none rate-element">

                            </li>
                            <li class="list-group-item justify-content-between d-none in-site-cur">
                                <span>@lang('In') <span class="method_currency"></span></span>
                                <span class="final_amount fw-bold">0</span>
                            </li>
                            <li class="list-group-item justify-content-center crypto_currency d-none">
                                <span>@lang('Conversion with') <span class="method_currency"></span> @lang('and final value will Show on next step')</span>
                            </li>
                        </ul>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-3">@lang('Submit')</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('script')
    <script type="text/javascript">
        (function ($) {
            "use strict";
            $('input[name=amount]').change(function () {
                if (!$('input[name=amount]').val()) {
                    $('.preview-details').addClass('d-none');
                    return false;
                }
                var resource = $('input[name=amount]').data('resource');
                console.log(resource); // Undefined

                var fixed_charge = parseFloat(resource.fixed_charge);

                if (!isNaN(fixed_charge)) {
                    console.log("Fixed charge: " + fixed_charge);
                } else {
                    console.log("Fixed charge is not a valid number.");
                }
                var percent_charge = parseFloat(resource.percent_charge);
                var rate = parseFloat(resource.rate)
                var toFixedDigit = 2;
                $('.min').text(parseFloat(resource.min_trx_limit).toFixed(2));
                $('.max').text(parseFloat(resource.max_trx_limit).toFixed(2));
                var amount = parseFloat($('input[name=amount]').val());
                if (!amount) {
                    amount = 0;
                }
                if (amount <= 0) {
                    $('.preview-details').addClass('d-none');
                    return false;
                }
                $('.preview-details').removeClass('d-none');

                var charge = parseFloat(fixed_charge + (amount * percent_charge / 100)).toFixed(2);
                $('.charge').text(charge);
                if (resource.currency != '{{ $general->cur_text }}') {
                    var rateElement = `<span>@lang('Conversion Rate')</span> <span class="fw-bold">1 {{__($general->cur_text)}} = <span class="rate">${rate}</span>  <span class="base-currency">${resource.currency}</span></span>`;
                    $('.rate-element').html(rateElement);
                    $('.rate-element').removeClass('d-none');
                    $('.in-site-cur').removeClass('d-none');
                    $('.rate-element').addClass('d-flex');
                    $('.in-site-cur').addClass('d-flex');
                } else {
                    $('.rate-element').html('')
                    $('.rate-element').addClass('d-none');
                    $('.in-site-cur').addClass('d-none');
                    $('.rate-element').removeClass('d-flex');
                    $('.in-site-cur').removeClass('d-flex');
                }
                var receivable = parseFloat((parseFloat(amount) - parseFloat(charge))).toFixed(2);
                $('.receivable').text(receivable);
                var final_amount = parseFloat(parseFloat(receivable) * rate).toFixed(toFixedDigit);
                $('.final_amount').text(final_amount);
                $('.base-currency').text(resource.currency);
                $('.method_currency').text(resource.currency);
                $('input[name=amount]').on('input');
            });
            $('input[name=amount]').on('input', function () {
                var data = $('select[name=username]').change();
                $('.amount').text(parseFloat($(this).val()).toFixed(2));
            });
        })(jQuery);
    </script>
@endpush
