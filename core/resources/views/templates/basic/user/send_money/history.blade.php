@extends($activeTemplate.'layouts.app')
@section('contents')
    <div class="row">
        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">

                    <h5 class="card-title mb-0">Latest Transaction</h5>
                </div>
                <table class="table table-hover my-0">
                    <thead>
                    <tr>
                        <th>@lang('Receiver')</th>
                        <th class="d-none d-md-table-cell">@lang('Amount')</th>
                        <th class="d-none d-md-table-cell">@lang('TRX')</th>
                        <th class="d-none d-xl-table-cell">@lang('Start Date')</th>
                        <th class="d-none d-xl-table-cell">@lang('End Date')</th>
                        <th>@lang('Status')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dispatchHistory as $history)
                        <tr>
                            <td>{{ data_get($history, 'receiver.username') }}</td>
                            <td class="d-none d-md-table-cell">{{ getAmount(data_get($history, 'amount')) }}</td>
                            <td class="d-none d-md-table-cell">{{ data_get($history, 'trx') }}</td>
                            <td class="d-none d-xl-table-cell">{{ diffForHumans(data_get($history, 'created_at')) }}</td>
                            <td class="d-none d-xl-table-cell">{{ diffForHumans(data_get($history, 'updated_at')) }}</td>
                            <td>
                                @if($history->status == \App\Constants\Status::PAYMENT_SUCCESS)
                                    <span class="badge bg-success">Success</span>
                                @else
                                    <span class="badge bg-danger">Failed</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if ($dispatchHistory->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($dispatchHistory) }}
                    </div>
                @endif
            </div>
        </div>
        {{--        <div class="col-12 col-lg-4 col-xxl-3 d-flex">--}}
        {{--            <div class="card flex-fill w-100">--}}
        {{--                <div class="card-header">--}}

        {{--                    <h5 class="card-title mb-0">Monthly Sales</h5>--}}
        {{--                </div>--}}
        {{--                <div class="card-body d-flex w-100">--}}
        {{--                    <div class="align-self-center chart chart-lg">--}}
        {{--                        <canvas id="chartjs-dashboard-bar"></canvas>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </div>
@endsection
{{--@push('breadcrumb-plugins')--}}
{{--    <x-search-form placeholder="Username / Email"/>--}}
{{--@endpush--}}
