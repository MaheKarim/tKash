@extends($activeTemplate . 'layouts.app')
@section('contents')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">@lang('Send Money')</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.send.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>@lang('Enter Username')</label>
                            <input type="text" class="form-control mt-1" name="username" placeholder="Enter Username">
                        </div>

                        <div class="mb-3">
                            <label>@lang('Amount')</label>
                            <input type="number" class="form-control mt-1" name="amount" placeholder="Enter Amount">
                        </div>

                        <button class="btn btn-primary" type="submit">@lang('Submit')</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="list-group">
                        <div class="list-group-item d-flex flex-wrap justify-content-between">
                            <h6>@lang('Current Balance')</h6>
                            <span>{{ showAmount(auth()->user()->balance) }}</span>
                        </div>
                        <div class="list-group-item d-flex flex-wrap justify-content-between">
                            <h6>@lang('Daily Minimum Limit')</h6>
                            <span>{{ showAmount(gs()->daily_send_money_limit) }}</span>
                        </div>
                        <div class="list-group-item d-flex flex-wrap justify-content-between">
                            <h6>@lang('Daily Available Limit')</h6>
                            <span>{{ $availableLimit }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript">
        (function ($) {
            "use strict";
            console.log('hi');
        })(jQuery);
    </script>
@endpush
