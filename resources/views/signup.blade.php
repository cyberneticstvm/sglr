<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Swachhata Green Leaf Rating </title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('/assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/css/vendor.bundle.base.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('/assets/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('/assets/images/favicon.png') }}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="{{ asset('/assets/images/logo.svg') }}" alt="logo">
                            </div>
                            <h4>Swachhata Green Leaf Rating</h4>
                            <h6 class="fw-light">Signup.</h6>
                            {{ html()->form('POST', route('user.signup'))->class('pt-3')->open() }}
                            @csrf
                            <div class="form-group">
                                <label>Institution Name *</label>
                                {{ html()->text('institution_name', old('institution_name'))->class('form-control form-control-lg')->placeholder('Institution Name') }}
                                @error('institution_name')
                                <small class="text-danger">{{ $errors->first('institution_name') }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Institution Type *</label>
                                {{ html()->select('institution_type', $itypes->pluck('name', 'id'), old('institution_type'))->class('form-control form-control-lg select2')->placeholder('Select') }}
                                @error('institution_type')
                                <small class="text-danger">{{ $errors->first('institution_type') }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Mobile Number *</label>
                                {{ html()->text('mobile', old('mobile'))->class('form-control form-control-lg')->maxlength(10)->placeholder('xxx xxx xxxx') }}
                                @error('mobile')
                                <small class="text-danger">{{ $errors->first('mobile') }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email *</label>
                                {{ html()->text('email', old('email'))->class('form-control form-control-lg')->placeholder('Email') }}
                                @error('email')
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Local Body *</label>
                                {{ html()->select('local_body', $lbs->pluck('name', 'id'), old('local_body'))->class('form-control form-control-lg select2')->placeholder('Select') }}
                                @error('email')
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>District *</label>
                                {{ html()->select('district_id', $districts->pluck('name', 'id'), old('district_id'))->class('form-control form-control-lg select2')->placeholder('Select') }}
                                @error('district_id')
                                <small class="text-danger">{{ $errors->first('district_id') }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>User Name *</label>
                                {{ html()->text('username', old('username'))->class('form-control form-control-lg')->placeholder('Username') }}
                                @error('username')
                                <small class="text-danger">{{ $errors->first('username') }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password *</label>
                                {{ html()->password('password', old('password'))->class('form-control form-control-lg')->placeholder('******') }}
                                @error('password')
                                <small class="text-danger">{{ $errors->first('password') }}</small>
                                @enderror
                            </div>
                            <div class="mt-3">
                                {{ html()->submit('Signup')->class('btn btn-block btn-submit btn-primary btn-lg font-weight-medium auth-form-btn') }}
                            </div>
                            {{ html()->form()->close() }}
                        </div>
                        <div class="text-center mt-4 fw-light">
                            Already have an account? <a href="{{ route('login') }}" class="text-primary">Login</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('/assets/js/template.js') }}"></script>
    <script src="{{ asset('/assets/js/settings.js') }}"></script>
    <script src="{{ asset('/assets/js/todolist.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(function() {
            "use strict"
            $(".select2").select2();
        })
    </script>
    <!-- endinject -->
    @include("message")
</body>

</html>