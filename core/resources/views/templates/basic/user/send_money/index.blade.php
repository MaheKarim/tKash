@extends($activeTemplate.'layouts.app')
@section('contents')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Send Money</h5>
        </div>
        <div class="card-body">
            <form action="{{route('user.send.store')}}" method="POST">
                @csrf
                <label> Enter Username </label>
                <input type="text" class="form-control mt-1" name="username" placeholder="Enter Username">
                <label> Amount </label>
                <input type="number" class="form-control mt-1" name="amount" placeholder="Enter Amount">
                <label> Remark </label>
                <input type="text" class="form-control mt-1" name="remark" placeholder="Remark">

                <button class="btn btn-primary btn-sm mt-3" type="submit">Submit</button>
            </form>
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
