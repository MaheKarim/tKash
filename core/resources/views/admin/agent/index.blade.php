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
                                <th>@lang('Agent')</th>
                                <th>@lang('Email-Phone')</th>
                                <th>@lang('Country')</th>
                                <th>@lang('Joined At')</th>
                                <th>@lang('Balance')</th>
                                <th>@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($agents as $agent)
                                <tr>
                                    <td>
                                        <span class="fw-bold">{{$agent->fullname}}</span>
                                        <br>
                                        <span class="small">
                                    <a href="{{ route('admin.agents.detail', $agent->id) }}"><span>@</span>{{ $agent->username }}</a>
                                    </span>
                                    </td>


                                    <td>
                                        {{ $agent->email }}<br>{{ $agent->mobile }}
                                    </td>
                                    <td>
                                        <span class="fw-bold"
                                              title="{{ @$agent->address->country }}">{{ $agent->country_code }}</span>
                                    </td>


                                    <td>
                                        {{ showDateTime($agent->created_at) }}
                                        <br> {{ diffForHumans($agent->created_at) }}
                                    </td>


                                    <td>
                                    <span class="fw-bold">

                                    {{ $general->cur_sym }}{{ showAmount($agent->balance) }}
                                    </span>
                                    </td>

                                    <td>
                                        <div class="button--group">
                                            <a href="{{ route('admin.agents.detail', $agent->id) }}"
                                               class="btn btn-sm btn-outline--primary">
                                                <i class="las la-desktop"></i> @lang('Details')
                                            </a>
                                            {{--                                            @if (request()->routeIs('admin.users.kyc.pending'))--}}
                                            {{--                                                <a href="{{ route('admin.users.kyc.details', $agent->id) }}"--}}
                                            {{--                                                   target="_blank" class="btn btn-sm btn-outline--dark">--}}
                                            {{--                                                    <i class="las la-user-check"></i>@lang('KYC Data')--}}
                                            {{--                                                </a>--}}
                                            {{--                                            @endif--}}
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
                @if ($agents->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($agents) }}
                    </div>
                @endif
            </div>
        </div>


    </div>
@endsection

@push('breadcrumb-plugins')
    <x-search-form placeholder="Username / Email"/>
    <a href="{{ route('admin.agents.create') }}" class="btn btn--primary btn-sm">@lang('Add Agent')</a>
@endpush
