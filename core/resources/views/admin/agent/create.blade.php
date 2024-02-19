@extends('admin.layouts.app')

@section('panel')
    <div class="row">
        <div class="col-12">

            <div class="card mt-30">
                <div class="card-header">
                    <h5 class="card-title mb-0">@lang('Create New Agent') </h5>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.agents.update',[$agent->id])}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>@lang('First Name')</label>
                                    <input class="form-control" type="text" name="firstname" required
                                           value="{{$agent->firstname}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">@lang('Last Name')</label>
                                    <input class="form-control" type="text" name="lastname" required
                                           value="{{$agent->lastname}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Email') </label>
                                    <input class="form-control" type="email" name="email" value="{{$agent->email}}"
                                           required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Mobile Number') </label>
                                    <div class="input-group ">
                                        <span class="input-group-text mobile-code"></span>
                                        <input type="number" name="mobile" value="{{ old('mobile') }}" id="mobile"
                                               class="form-control checkUser" required>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label>@lang('Address')</label>
                                    <input class="form-control" type="text" name="address"
                                           value="{{@$agent->address->address}}">
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="form-group">
                                    <label>@lang('City')</label>
                                    <input class="form-control" type="text" name="city"
                                           value="{{@$agent->address->city}}">
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="form-group ">
                                    <label>@lang('State')</label>
                                    <input class="form-control" type="text" name="state"
                                           value="{{@$agent->address->state}}">
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="form-group ">
                                    <label>@lang('Zip/Postal')</label>
                                    <input class="form-control" type="text" name="zip"
                                           value="{{@$agent->address->zip}}">
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="form-group ">
                                    <label>@lang('Country')</label>
                                    <select name="country" class="form-control">
                                        @foreach($countries as $key => $country)
                                            <option data-mobile_code="{{ $country->dial_code }}"
                                                    value="{{ $key }}">{{ __($country->country) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group  col-xl-3 col-md-6 col-12">
                                <label>@lang('Email Verification')</label>
                                <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"
                                       data-bs-toggle="toggle" data-on="@lang('Verified')"
                                       data-off="@lang('Unverified')" name="ev"
                                       @if($agent->ev) checked @endif>

                            </div>

                            <div class="form-group  col-xl-3 col-md-6 col-12">
                                <label>@lang('Mobile Verification')</label>
                                <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"
                                       data-bs-toggle="toggle" data-on="@lang('Verified')"
                                       data-off="@lang('Unverified')" name="sv"
                                       @if($agent->sv) checked @endif>

                            </div>
                            <div class="form-group col-xl-3 col-md- col-12">
                                <label>@lang('2FA Verification') </label>
                                <input type="checkbox" data-width="100%" data-height="50" data-onstyle="-success"
                                       data-offstyle="-danger" data-bs-toggle="toggle" data-on="@lang('Enable')"
                                       data-off="@lang('Disable')" name="ts" @if($agent->ts) checked @endif>
                            </div>
                            <div class="form-group col-xl-3 col-md- col-12">
                                <label>@lang('KYC') </label>
                                <input type="checkbox" data-width="100%" data-height="50" data-onstyle="-success"
                                       data-offstyle="-danger" data-bs-toggle="toggle" data-on="@lang('Verified')"
                                       data-off="@lang('Unverified')" name="kv" @if($agent->kv == 1) checked @endif>
                            </div>
                        </div>


                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn--primary w-100 h-45">@lang('Submit')
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>
                    {{--                    @include('admin.agent._form')--}}
                </div>
            </div>

        </div>
    </div>
@endsection

@push('script')
    <script>
        (function ($) {
            "use strict"
            $('.bal-btn').click(function () {
                var act = $(this).data('act');
                $('#addSubModal').find('input[name=act]').val(act);
                if (act == 'add') {
                    $('.type').text('Add');
                } else {
                    $('.type').text('Subtract');
                }
            });

            let mobileElement = $('.mobile-code');
            let selectedCountryCode = '{{ isset($agent) ? $agent->country_code : old("country") }}';
            let selectedDialCode = $('select[name=country] option[value="' + selectedCountryCode + '"]').data('mobile_code');
            $('select[name=country]').change(function () {
                let dialCode = $('select[name=country] :selected').data('mobile_code');
                mobileElement.text('+' + dialCode);
            }).change(); // Trigger change event initially

            $('select[name=country]').val(selectedCountryCode);

            let mobileNumber = '{{ isset($agent) ? $agent->mobile : old("mobile") }}';
            mobileNumber = mobileNumber.replace(selectedDialCode, '');
            $('input[name=mobile]').val(mobileNumber);
            mobileElement.text('+' + selectedDialCode);
        })(jQuery);
    </script>
@endpush


