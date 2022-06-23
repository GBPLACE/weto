@extends('layouts.register_layout')
@section('title', 'WETO | Login')
@section('content')
    <!--<div class="weto-table">-->
        <!--<div class="weto-table-cell">-->
            <form action="{{route('loginSubmit')}}" method="post" class="login-form" id="loginForm">
                @csrf
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
                <ul>
                    <li><input type="text" name="email" class="form-control"
                               placeholder="Email address">
                        @error('email')
                        <label class="error">{{ $message }}</label>
                        @enderror
                    </li>
                    <li>
                        <input type="password" name="password" class="form-control show_password" placeholder="Password">
                        @error('password')
                        <label class="error">{{ $message }}</label>
                        @enderror
                    </li>
                    <li><a href="javascript:void(0)" class="remb pull-right show_password_btn">Show Password</a></li>
                    <li><input type="submit" class="submit" value="Log in"></li>
                    <li><a href="{{route('email')}}" class="remb pull-right">Forgot Password?</a></li>
                </ul>
            </form>
        <!--</div>-->
    <!--</div>-->
    <div class="footer-wrap">
        <span>Don't have an account? <strong><a href="{{route('userSignup')}}">Sign up as User</a></strong></span>
{{--        <h6>{{ $homeContent[0]['footer_logo_text'] }}</h6>--}}
    </div>
@endsection