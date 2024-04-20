@extends("web.base")
@section("content")
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5>Add New User</h5>
                    {{ html()->form('PUT', route('password.update'))->class('pt-3')->open() }}
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Password *</label>
                            {{ html()->password('password', old('password'))->class('form-control form-control-lg')->placeholder('******') }}
                            @error('password')
                            <small class="text-danger">{{ $errors->first('password') }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label>Confirm Password *</label>
                            {{ html()->password('password_confirmation', old('password_confirmation'))->class('form-control form-control-lg')->placeholder('******') }}
                            @error('password_confirmation')
                            <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                            @enderror
                        </div>
                        <div class="mt-3">
                            {{ html()->submit('Reset')->class('btn btn-block btn-submit btn-primary btn-lg font-weight-medium auth-form-btn') }}
                        </div>
                    </div>
                    {{ html()->form()->close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection