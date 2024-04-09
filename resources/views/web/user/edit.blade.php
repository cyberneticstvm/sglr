@extends("web.base")
@section("content")
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5>Update User</h5>
                    {{ html()->form('POST', route('user.update', $user->id))->class('pt-3')->open() }}
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Name *</label>
                            {{ html()->text('name', $user->name)->class('form-control form-control-lg')->placeholder('Name') }}
                            @error('name')
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label>Mobile Number *</label>
                            {{ html()->text('mobile', $user->mobile)->class('form-control form-control-lg')->maxlength(10)->placeholder('xxx xxx xxxx') }}
                            @error('mobile')
                            <small class="text-danger">{{ $errors->first('mobile') }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label>Email *</label>
                            {{ html()->text('email', $user->email)->class('form-control form-control-lg')->placeholder('Email') }}
                            @error('email')
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label>District *</label>
                            {{ html()->select('district_id', $districts->pluck('name', 'id'), $user->district_id)->class('form-control form-control-lg select2')->placeholder('Select') }}
                            @error('district_id')
                            <small class="text-danger">{{ $errors->first('district_id') }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label>Role *</label>
                            {{ html()->select('role', $roles, $user->role)->class('form-control form-control-lg select2')->placeholder('Select') }}
                            @error('role')
                            <small class="text-danger">{{ $errors->first('role') }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label>User Name *</label>
                            {{ html()->text('username', $user->username)->class('form-control form-control-lg')->placeholder('Username') }}
                            @error('username')
                            <small class="text-danger">{{ $errors->first('username') }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label>Password *</label>
                            {{ html()->password('password', old('password'))->class('form-control form-control-lg')->placeholder('******') }}
                            @error('password')
                            <small class="text-danger">{{ $errors->first('password') }}</small>
                            @enderror
                        </div>
                        <div class="mt-3">
                            {{ html()->submit('Update')->class('btn btn-block btn-submit btn-primary btn-lg font-weight-medium auth-form-btn') }}
                        </div>
                    </div>
                    {{ html()->form()->close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection