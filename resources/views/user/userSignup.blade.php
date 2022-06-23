@extends('layouts.register_layout')@section('title', 'WETO | Signup')@section('content')
<!--<div class="weto-table">        <div class="weto-table-cell">            -->
<form action="{{route('registerUser')}}" method="POST" class="login-form" id="registerUserForm">                @csrf                @if(session()->has('error'))                    <div class="alert alert-danger text-center">                        {{ session()->get('error') }}                    </div>                @endif                @if(session()->has('message'))                    <div class="alert alert-success text-center">                        {{ session()->get('message') }}                    </div>                @endif                <ul>                    <li>                        <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Full Name">                        @error('name')                        <label  class="error" >{{ $message }}</label>                        @enderror                    </li>                    <li>                        <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="Email address">                        @error('email')                        <label  class="error" >{{ $message }}</label>                        @enderror                    </li>                    <li>                        <input type="password" name="password" value="{{old('password')}}" id="password" class="form-control" placeholder="Password">                        <span class="qi">i</span>                        <div class="pop">                            <p>Password should be at least 8 characters long.</p>                        </div>                        @error('password')                        <label  class="error" >{{ $message }}</label>                        @enderror                    </li>                    <li>                        <input type="password" name="password_conformation" value="{{old('password_conformation')}}" id="password_conformation" class="form-control" placeholder="Confirm Password">                        @error('password_conformation')                        <label  class="error" >{{ $message }}</label>                        @enderror                    </li>                    <li>                        <input type="submit" class="submit" value="Sign up">                    </li>                </ul>            </form>
<!--</div>    </div>-->
<div class="footer-wrap">        <span>Do you have an account? <strong><a href="{{route('login')}}">Sign in</a></strong></span>{{--        <h6>{{ $homeContent[0]['footer_logo_text'] }}</h6>--}}    </div>@endsection