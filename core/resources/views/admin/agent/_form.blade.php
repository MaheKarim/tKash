<form action="{{ isset($agent) ? route('admin.agents.update', [$agent->id]) : route('admin.agents.store') }}"
      method="POST" enctype="multipart/form-data">
    @csrf

    @if(isset($agent))
        @method('POST')
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="form-group ">
                <label>@lang('First Name')</label>
                <input class="form-control" type="text" name="firstname" required
                       value="{{ isset($agent) ? $agent->firstname : old('firstname') }}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="form-control-label">@lang('Last Name')</label>
                <input class="form-control" type="text" name="lastname" required
                       value="{{ isset($agent) ? $agent->lastname : old('lastname') }}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>@lang('Email') </label>
                <input class="form-control" type="email" name="email"
                       value="{{ isset($agent) ? $agent->email : old('email') }}" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>@lang('Mobile Number') </label>
                <div class="input-group ">
                    <span class="input-group-text mobile-code"></span>
                    <input type="number" name="mobile" value="{{ isset($agent) ? $agent->mobile : old('mobile') }}"
                           id="mobile"
                           class="form-control checkUser" required>
                </div>
            </div>
        </div>
    </div>
    <!-- Rest of the form fields -->

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="form-group">
                <button type="submit"
                        class="btn btn--primary w-100 h-45">@lang(isset($agent) ? 'Update' : 'Submit')</button>
            </div>
        </div>
    </div>
</form>
