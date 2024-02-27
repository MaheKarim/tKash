@extends($activeTemplate.'layouts.agent_app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Cash In</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('agent.cashIn.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="mb-3">
                        <label> Enter Username </label>
                        <input type="text" class="form-control mt-1" name="username" placeholder="Enter Username">
                    </div>
                    <div class="mb-3">
                        <label> Amount </label>
                        <input type="number" class="form-control mt-1" name="amount" placeholder="Enter Amount">
                    </div>
                </div>
                <button class="btn btn-primary mt-3" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
