@extends('admin.layouts.app')

@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                            <tr>
                                <th>@lang('Methods')</th>
                                <th>@lang('Min')-@lang('Max Trx Limit')</th>
                                <th>@lang('Charge')</th>
                                <th>@lang('Currency')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($methods as $method)
                                <tr>
                                    <td><span class="fw-bold">{{ data_get($method, 'name') }}</span></td>
                                    <td>{{ showAmount(data_get($method, 'min_trx_limit')) }}
                                        - {{ showAmount(data_get($method, 'max_trx_limit')) }}</td>
                                    <td>{{ showAmount($method->fixed_charge)}} {{__($general->cur_text) }} {{ (0 < $method->percent_charge) ? ' + '. showAmount($method->percent_charge) .' %' : '' }} </td>
                                    <td>{{ data_get($method, 'currency') }}({{ data_get($general, 'cur_sym') }})</td>
                                    <td>
                                        @php echo $method->statusBadge @endphp
                                    </td>
                                    <td>
                                        <div class="button--group">
                                            @if($method->status == Status::ENABLE)
                                                <button class="btn btn-sm btn-outline--danger ms-1 confirmationBtn"
                                                        data-question="@lang('Are you sure to disable this method?')"
                                                        data-action="{{ route('admin.tkash-methods.status',$method->id) }}">
                                                    <i class="la la-eye-slash"></i> @lang('Disable')
                                                </button>
                                            @else
                                                <button class="btn btn-sm btn-outline--success ms-1 confirmationBtn"
                                                        data-question="@lang('Are you sure to enable this method?')"
                                                        data-action="{{ route('admin.tkash-methods.status',$method->id) }}">
                                                    <i class="la la-eye"></i> @lang('Enable')
                                                </button>
                                            @endif
                                            <a href="{{ route('admin.agents.detail', $method->id) }}"
                                               class="btn btn-sm btn-outline--primary">
                                                <i class="las la-desktop"></i> @lang('Edit')
                                            </a>
                                        </div>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                @if ($methods->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($methods) }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <x-confirmation-modal/>
@endsection

@push('breadcrumb-plugins')
    <x-search-form placeholder="Methods"/>
    <a href="{{ route('admin.agents.create') }}" class="btn btn--primary btn-sm">@lang('Add Method')</a>
@endpush
