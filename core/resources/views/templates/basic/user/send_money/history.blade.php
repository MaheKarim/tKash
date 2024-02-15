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
                        <th class="d-none d-md-table-cell">@lang('Charge')</th>
                        <th class="d-none d-md-table-cell">@lang('TRX')</th>
                        <th class="d-none d-xl-table-cell">@lang('Start Date')</th>
                        <th class="d-none d-xl-table-cell">@lang('End Date')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dispatchHistory as $history)
                        <tr>
                            <td>{{ data_get($history, 'details') }}</td>
                            <td class="d-none d-md-table-cell">{{ __(showAmount(data_get($history, 'amount'))) }}</td>
                            <td class="d-none d-md-table-cell">{{ __(showAmount(data_get($history, 'charge'))) }}</td>
                            <td class="d-none d-md-table-cell">{{ __(data_get($history, 'trx')) }}</td>
                            <td class="d-none d-xl-table-cell">{{ __(diffForHumans(data_get($history, 'created_at'))) }}</td>
                            <td class="d-none d-xl-table-cell">{{ __(diffForHumans(data_get($history, 'updated_at'))) }}</td>
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
    </div>
@endsection
