@extends($activeTemplate.'layouts.app')
@section('contents')
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>{{ auth()->user()->username }}</strong> Dashboard</h1>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">@lang('Balance')</h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="dollar-sign"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3">{{ showAmount(auth()->user()->balance) }} {{ $general->cur_text }}</h1>
                        <div class="mb-0">
                                      <span class="text-success"> <i
                                              class="mdi mdi-arrow-bottom-right"></i> {{ showAmount(auth()->user()->balance) }} {{ $general->cur_text }} </span>
                            <span class="text-muted">@lang('Showing total transactions')</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
