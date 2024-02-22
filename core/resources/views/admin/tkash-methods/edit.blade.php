@extends('admin.layouts.app')

@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="{{ route('admin.tkash-methods.update', $method->id) }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="payment-method-item">
                            <div class="form-group">
                                <label>@lang('Name')</label>
                                <input type="text" class="form-control" name="name" value="{{ $method->name }}"
                                       required/>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>@lang('Currency')</label>
                                        <div class="input-group">
                                            <input type="text" name="currency" class="form-control border-radius-5"
                                                   value="{{ $method->currency }}" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>@lang('Rate')</label>
                                        <div class="input-group">
                                            <span class="input-group-text">1 {{ __($general->cur_text) }}
                                                =
                                            </span>
                                            <input type="text" class="form-control" name="rate"
                                                   value="{{ getAmount($method->rate) }}" required/>
                                            <span class="currency_symbol input-group-text"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="payment-method-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card border--primary mb-2">
                                            <h5 class="card-header bg--primary">@lang('Trx Amount Range')</h5>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>@lang('Minimum Amount')</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="min_trx_limit"
                                                               value="{{ getAmount($method->min_trx_limit)}}" required/>
                                                        <span
                                                            class="input-group-text"> {{ __($general->cur_text) }} </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>@lang('Maximum Amount')</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="max_trx_limit"
                                                               value="{{getAmount($method->max_trx_limit) }}" required/>
                                                        <span
                                                            class="input-group-text"> {{ __($general->cur_text) }} </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="card border--primary">
                                            <h5 class="card-header bg--primary">@lang('Charge')</h5>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>@lang('Fixed Charge')</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="fixed_charge"
                                                               value="{{ getAmount($method->fixed_charge) }}" required/>
                                                        <span
                                                            class="input-group-text"> {{ __($general->cur_text) }} </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>@lang('Percent Charge')</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="percent_charge"
                                                               value="{{ getAmount($method->percent_charge) }}"
                                                               required>
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="card border--primary mb-2">
                                            <h5 class="card-header bg--primary">@lang('User Limit Range')</h5>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>@lang('Minimum Amount - Daily')</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                               name="user_daily_trx_limit"
                                                               value="{{ getAmount($method->user_daily_trx_limit)}}"
                                                               required/>
                                                        <span
                                                            class="input-group-text"> {{ __($general->cur_text) }} </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>@lang('Maximum Amount - Monthly')</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                               name="user_monthly_trx_limit"
                                                               value="{{getAmount($method->user_monthly_trx_limit) }}"
                                                               required/>
                                                        <span
                                                            class="input-group-text"> {{ __($general->cur_text) }} </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="card border--primary mb-2">
                                            <h5 class="card-header bg--primary">@lang('Agent Limit Range')</h5>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>@lang('Minimum Amount - Daily')</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                               name="agent_daily_trx_limit"
                                                               value="{{ getAmount($method->agent_daily_trx_limit)}}"
                                                               required/>
                                                        <span
                                                            class="input-group-text"> {{ __($general->cur_text) }} </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>@lang('Maximum Amount - Monthly')</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                               name="agent_monthly_trx_limit"
                                                               value="{{getAmount($method->agent_monthly_trx_limit) }}"
                                                               required/>
                                                        <span
                                                            class="input-group-text"> {{ __($general->cur_text) }} </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn--primary w-100 h-45">@lang('Submit')</button>
                    </div>
                </form>
            </div><!-- card end -->
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <x-back route="{{ route('admin.tkash-methods.index') }}"/>
@endpush

@push('script')
    <script>
        (function ($) {
            "use strict";

            $('input[name=currency]').on('input', function () {
                $('.currency_symbol').text($(this).val());
            });
            $('.currency_symbol').text($('input[name=currency]').val());

            $('.addUserData').on('click', function () {
                var html = `
                <div class="col-md-12 user-data">
                    <div class="form-group">
                        <div class="input-group mb-md-0 mb-4">
                            <div class="col-md-4">
                                <input name="field_name[]" class="form-control" type="text" required>
                            </div>
                            <div class="col-md-3 mt-md-0 mt-2">
                                <select name="type[]" class="form-control" required>
                                    <option value="text" > @lang('Input Text') </option>
                                    <option value="textarea" > @lang('Textarea') </option>
                                    <option value="file"> @lang('File') </option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-md-0 mt-2">
                                <select name="validation[]"
                                        class="form-control" required>
                                    <option value="required"> @lang('Required') </option>
                                    <option value="nullable">  @lang('Optional') </option>
                                </select>
                            </div>
                            <div class="col-md-2 mt-md-0 mt-2 text-end">
                                <span class="input-group-btn">
                                    <button class="btn btn--danger btn-lg removeBtn w-100" type="button">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>`;

                $('.addedField').append(html);
            });


            $(document).on('click', '.removeBtn', function () {
                $(this).closest('.user-data').remove();
            });

            @if(old('currency'))
            $('input[name=currency]').trigger('input');
            @endif
        })(jQuery);


    </script>
@endpush
