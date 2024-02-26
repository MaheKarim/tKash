@extends('admin.layouts.app')
@section('panel')
<form action="" method="POST">
    <div class="row gy-4">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group ">
                                    <label> @lang('Site Title')</label>
                                    <input class="form-control" type="text" name="site_name" required value="{{$general->site_name}}">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group ">
                                    <label>@lang('Currency')</label>
                                    <input class="form-control" type="text" name="cur_text" required value="{{$general->cur_text}}">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group ">
                                    <label>@lang('Currency Symbol')</label>
                                    <input class="form-control" type="text" name="cur_sym" required value="{{$general->cur_sym}}">
                                </div>
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label> @lang('Timezone')</label>
                                <select class="select2-basic" name="timezone">
                                    @foreach($timezones as $key => $timezone)
                                    <option value="{{ @$key}}">{{ __($timezone) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label> @lang('Site Base Color')</label>
                                <div class="input-group">
                                    <span class="input-group-text p-0 border-0">
                                        <input type='text' class="form-control colorPicker" value="{{$general->base_color}}"/>
                                    </span>
                                    <input type="text" class="form-control colorCode" name="base_color" value="{{ $general->base_color }}"/>
                                </div>
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label> @lang('Site Secondary Color')</label>
                                <div class="input-group">
                                    <span class="input-group-text p-0 border-0">
                                        <input type='text' class="form-control colorPicker" value="{{$general->secondary_color}}"/>
                                    </span>
                                    <input type="text" class="form-control colorCode" name="secondary_color" value="{{ $general->secondary_color }}"/>
                                </div>
                            </div>
                        </div>


                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">@lang('Send Money Configuration')</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group ">
                                <label>@lang('Minimum Limit Per Transaction')</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="min_send_money_limit" required value="{{getAmount($general->min_send_money_limit)}}">
                                    <span class="input-group-text">{{__($general->cur_text)}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group ">
                                <label>@lang('Maximum Limit Per Transaction')</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="max_send_money_limit" required value="{{getAmount($general->max_send_money_limit)}}">
                                    <span class="input-group-text">{{__($general->cur_text)}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group ">
                                <label>@lang('Daily Limit')</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="daily_send_money_limit" required value="{{getAmount($general->daily_send_money_limit)}}">
                                    <span class="input-group-text">{{__($general->cur_text)}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group ">
                                <label>@lang('Monthly Limit')</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="monthly_send_money_limit" required value="{{getAmount($general->monthly_send_money_limit)}}">
                                    <span class="input-group-text">{{__($general->cur_text)}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group ">
                                <label>@lang('Fixed Charge')</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="send_money_fixed_charge" required value="{{getAmount($general->send_money_fixed_charge)}}">
                                    <span class="input-group-text">{{__($general->cur_text)}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group ">
                                <label>@lang('Percent Charge')</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="send_money_percent_charge" required value="{{$general->send_money_percent_charge}}">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">@lang('Cash In Configuration')</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group ">
                                <label>@lang('Minimum Limit Per Transaction')</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="min_cash_in_limit" required value="{{getAmount($general->min_cash_in_limit)}}">
                                    <span class="input-group-text">{{__($general->cur_text)}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group ">
                                <label>@lang('Maximum Limit Per Transaction')</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="max_cash_in_limit" required value="{{getAmount($general->max_cash_in_limit)}}">
                                    <span class="input-group-text">{{__($general->cur_text)}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group ">
                                <label>@lang('Daily Limit')</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="daily_cash_in_limit" required value="{{getAmount($general->daily_cash_in_limit)}}">
                                    <span class="input-group-text">{{__($general->cur_text)}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group ">
                                <label>@lang('Monthly Limit')</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="monthly_cash_in_limit" required value="{{getAmount($general->monthly_cash_in_limit)}}">
                                    <span class="input-group-text">{{__($general->cur_text)}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group ">
                                <label>@lang('Fixed Commission')</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="cash_in_fixed_commission" required value="{{getAmount($general->cash_in_fixed_commission)}}">
                                    <span class="input-group-text">{{__($general->cur_text)}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group ">
                                <label>@lang('Percent Commission')</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="cash_in_percent_commission" required value="{{$general->cash_in_percent_commission}}">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn--primary w-100 h-45">@lang('Submit')</button>

        </div>
    </div>
</form>

@endsection

@push('style')
<style>
    .select2-container {
        z-index: 0 !important;
    }
</style>
@endpush

@push('script-lib')
    <script src="{{ asset('assets/admin/js/spectrum.js') }}"></script>
@endpush

@push('style-lib')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/spectrum.css') }}">
@endpush

@push('script')
    <script>
        (function ($) {
            "use strict";
            $('.colorPicker').spectrum({
                color: $(this).data('color'),
                change: function (color) {
                    $(this).parent().siblings('.colorCode').val(color.toHexString().replace(/^#?/, ''));
                }
            });

            $('.colorCode').on('input', function () {
                var clr = $(this).val();
                $(this).parents('.input-group').find('.colorPicker').spectrum({
                    color: clr,
                });
            });

            $('select[name=timezone]').val("{{ $currentTimezone }}").select2();
            $('.select2-basic').select2({
                dropdownParent:$('.card-body')
            });
        })(jQuery);

    </script>
@endpush

