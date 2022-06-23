@extends('layouts.admin_login_layout')
@section('title', 'WETO | Password Recovery')
@section('content')

    <div class="app-container">
        <div class="h-100 bg-plum-plate bg-animation">
            <div class="d-flex h-100 justify-content-center align-items-center">
                <div class="mx-auto app-login-box col-md-6">
                    <div class="modal-dialog w-100">
                        <div class="modal-content">
                            <form action="{{route('submitAdminPasswordReset')}}" method="post" id="submitPasswordResetForm">
                                @csrf
                                <div class="modal-header">
                                    <div class="h5 modal-title text-center" style="width: 100%;"><div style=";background: url('{{asset('propertyUploads/'.$homeContent[0]['header_logo'])}}');background-position: center;background-size: contain;background-repeat: no-repeat;" class="app-logo-inverse mx-auto mb-3"></div>Forgot your Password?<h6 class="mt-1 mb-0 opacity-8"><span>Use the form below to reset password.</span></h6></div>
                                </div>
                                <div class="modal-body">
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
                                    <div>
                                        <input type="hidden" name="admin_id" value="{{$admin_id}}">
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input name="password" id="password" value="{{old('password')}}" placeholder="New Password here..." type="password" class="form-control">
                                                    @error('password')
                                                    <label  class="error" >{{ $message }}</label>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input name="password_conformation" value="{{old('password_conformation')}}" placeholder="Password Conformation here..." type="password" class="form-control">
                                                    @error('password_conformation')
                                                    <label  class="error" >{{ $message }}</label>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <h6 class="mb-0"><a href="{{route('adminLogin')}}" class="text-primary">Sign in existing account</a></h6>
                                </div>
                                <div class="modal-footer clearfix">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
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