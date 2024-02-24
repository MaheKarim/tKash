@extends($activeTemplate.'layouts.agent_app')

@section('content')
    {{ auth()->guard('agent')->user()->balance }}
@endsection
