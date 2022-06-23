@extends('layouts.admin_layout')
@section('title', 'WETO | Settings')
@section('content')
    <div class="app-main__inner">
        <div class="card-header-tab card-header">
            <div class="card-header-title font-size-lg text-capitalize font-weight-normal">Account Settings</div>
        </div>
        <div class="tabs-animation">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
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
                            <form action="{{route('submitAdminSettings')}}" method="post" id="settingsForm">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Current Password</label>
                                            <input name="password" type="password" class="form-control" placeholder="">
                                            @error('password')
                                            <label  class="error" >{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input name="new_password" id="new_password" type="password" class="form-control" placeholder="">
                                            @error('new_password')
                                            <label  class="error" >{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Repeat New Password</label>
                                            <input name="new_password_conformation" type="password" class="form-control" placeholder="">
                                            @error('new_password_conformation')
                                            <label  class="error" >{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
{{--                                    <div class="col-md-4">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label>Select Profile Image</label>--}}
{{--                                            <input type="file" class="form-control">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection