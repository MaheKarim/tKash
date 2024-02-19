@extends($activeTemplate.'layouts.app')

@section('contents')
    {{ auth()->guard('agent')->user()->balance }}
@endsection
