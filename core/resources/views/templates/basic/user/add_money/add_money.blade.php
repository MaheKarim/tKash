@extends($activeTemplate.'layouts.app')

@section('contents')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">@lang('Selects Payments Method')</h5>
        </div>
        <div class="card-body">
            <label>@lang('Select Payment Method')</label>
            <select class="form-select mb-3">
                @foreach($gatewayCurrency as $data )
                    <option>{{ __($data->name) }}</option>
                @endforeach
            </select>
            <label>@lang('Enter Amount')</label>
            <input type="number" class="form-control mb-3" name="amount">
            <button class="btn btn-primary w-100" type="submit">@lang('Add Money')</button>
        </div>
    </div>
@endsection
@push('script')
    <script>
        "use strict";
    </script>
@endpush
