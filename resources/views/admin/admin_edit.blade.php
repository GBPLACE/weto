@extends('layouts.admin_layout')

@section('title', 'WETO | Admins')

@section('content')

    <div class="app-main__inner">

        <div class="card-header-tab card-header">

            <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="pe-7s-map mr-3 text-muted opacity-6" style="font-size: 35px; color: #2d7b8a !important;"> </i>Edit Admin</div>

        </div>

        <div class="tabs-animation">

            <div class="row">

                <div class="col-md-12">

                    <div class="card mb-3">

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

                            <form action="{{ route('admin.update') }}" method="post" id="addAdminFromEdit" enctype="multipart/form-data">

                                <input name="admin_id" value="{{ $admin->id }}" type="hidden">

                                @csrf

                                <ul class="search-form">

                                    <li>

                                        <label>Name</label>

                                        <input value="{{ $admin->name }}" type="text" name="admin_name" placeholder="Type here...">

                                        @error('admin_name')

                                        <label  class="error" >{{ $message }}</label>

                                        @enderror

                                    </li>
                                    <li>

                                        <label>Email</label>

                                        <input value="{{ $admin->email }}" type="email" name="email" placeholder="Type here...">

                                        @error('email')

                                        <label  class="error" >{{ $message }}</label>

                                        @enderror

                                    </li>
                                    <li>

                                        <label>Current Password</label>

                                        <input type="password" name="admin_password" placeholder="Type here...">

                                        @error('admin_password')

                                        <label  class="error" >{{ $message }}</label>

                                        @enderror

                                    </li>
                                    <li>

                                        <label>New Password</label>

                                        <input name="new_password" id="admin_password" type="password"  placeholder="Type here...">

                                        @error('country_name')

                                        <label  class="error" >{{ $message }}</label>

                                        @enderror

                                    </li>
                                    <li>

                                        <label>Confirm Password</label>

                                        <input type="password" name="confirm_admin_password" placeholder="Type here...">

                                        @error('country_name')

                                        <label  class="error" >{{ $message }}</label>

                                        @enderror

                                    </li>

                                    <li>

                                        <button type="submit" style="margin: 30px 0px 0px;" class="btn btn-primary pull-left">Edit Admin</button>

                                    </li>

                                </ul>

                            </form>

                        </div>

                    </div>

                </div>


            </div>

        </div>

    </div>



    <!-- bootstrap spinner-->

    <div class="spinner" style="display: none;">

        <div class="spinner-border text-primary" role="status">

            <span class="sr-only">Loading...</span>

        </div>

    </div>

@endsection

