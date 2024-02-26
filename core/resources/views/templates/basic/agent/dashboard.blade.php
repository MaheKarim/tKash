@extends($activeTemplate.'layouts.agent_app')

@section('content')
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>{{ auth()->guard('agent')->user()->username }}</strong> Dashboard</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">@lang('Deposit Balance')</h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="shopping-cart"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3">{{ showAmount(auth()->guard('agent')->user()->balance) }} {{ $general->cur_text }}</h1>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">@lang('Commission Balance')</h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="dollar-sign"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3">{{ showAmount(auth()->guard('agent')->user()->commission_balance) }} {{ $general->cur_text }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
