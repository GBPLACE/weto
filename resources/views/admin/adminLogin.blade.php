@extends('layouts.admin_login_layout')
@section('title', 'WETO | Login')
@section('content')

    <div class="app-container">
        <div class="h-100 bg-plum-plate bg-animation">
            <div class="d-flex h-100 justify-content-center align-items-center">
                <div class="mx-auto app-login-box col-md-8">
                    <div class="modal-dialog w-100 mx-auto">
                        <div class="modal-content">
                            <form method="post" action="submitAdminLogin" id="loginForm">
                                @csrf
                                <div class="modal-body">
                                    <div class="h5 modal-title text-center">
                                        <div style="background: url('{{asset('propertyUploads/'.$homeContent[0]['header_logo'])}}');background-position: center;background-size: contain;background-repeat: no-repeat;" class="app-logo-inverse mx-auto mb-3"></div>
                                        <h4 class="mt-2">
                                            <div>Welcome back,</div>
                                            <span>Please sign in to your account below.</span>
                                        </h4>
                                    </div>
                                    @if(session()->has('error'))
                                        <div class="alert alert-danger text-center">
                                            {{ session()->get('error') }}
                                        </div>
                                    @endif
                                    @if(session()->has('message'))
                                        <div class="alert alert-success text-center">
                                            {{ session()->get('message') }}
                                        </div>
                                    @endif
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <input name="email" id="exampleEmail" value="{{old('email')}}" placeholder="Email here..." type="email" class="form-control">
                                                @error('email')
                                                <label  class="error" >{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <input name="password" id="examplePassword" value="{{old('password')}}" placeholder="Password here..." type="password" class="form-control">
                                                @error('password')
                                                <label  class="error" >{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
{{--                                    <div class="position-relative form-check"><input name="check" id="exampleCheck" type="checkbox" class="form-check-input"><label for="exampleCheck" class="form-check-label">Keep me logged in</label></div>--}}
                                </div>
                                <div class="modal-footer clearfix">
                                    <div class="float-left"><a href="{{route('forgotPassword')}}" class="btn-lg btn btn-link">Recover Password</a></div>
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary btn-lg">Login to Dashboard</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="text-center text-white opacity-8 mt-3">© {{date('Y')}} - All Rights Reserved</div>
                </div>
            </div>
        </div>
    </div>
@endsection