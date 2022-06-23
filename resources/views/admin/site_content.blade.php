@extends('layouts.admin_layout')

@section('title', 'WETO | Add Site Content')

@section('content')



    <div class="app-main__inner">

        <div class="card-header-tab card-header">

            <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="pe-7s-map mr-3 text-muted opacity-6" style="font-size: 35px; color: #2d7b8a !important;"> </i>Add Site Content</div>

        </div>

        <div class="tabs-animation">

            <div class="row">

                <div class="col-md-12">

                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="weto-edit-info">

                                @if(session()->has('success'))

                                    <div class="alert alert-success text-center">

                                        {{ session()->get('success') }}

                                    </div>

                                @endif

                                <form  enctype="multipart/form-data" id="site-content" action="{{ route('site.content.created') }}" method="post">

                                    @csrf

                                    <ul>

                                        <li class="full">

                                            <label>Select Favicon Image</label>

                                            <div>

                                                <input class="form-control" type="file" name="favicon_img" id="file-upload-demo_0">

                                            </div>

                                            <ul>

                                                <li style="margin-top: 20px;" id="old_main_photo_0">

                                                    <img style="max-width: 300px;" src="{{asset('propertyUploads/'.$data[0]['favicon'])}}">

                                                </li>

                                                <li class="width3" id="show_main_photo_0" style="display: none;">

                                                    <img id="output_0">

                                                </li>

                                            </ul>

                                        </li>



                                        <li class="full">

                                            <label>Select Banner Image</label>

                                            <div>

                                                <input class="form-control" type="file" name="banner_img" id="file-upload-demo">

                                                <input name="banner_id" type="hidden" value="{{ $data[0]['header_banner_contents'][0]['id'] }}" >

                                            </div>



                                            <ul>

                                                <li style="margin-top: 20px;" id="old_main_photo">

                                                    <input type="hidden" name="site_id" value="{{$data[0]['id']}}">

                                                        <img style="max-width: 300px;" src="{{asset('propertyUploads/'.$data[0]['header_banner_contents'][0]['image'])}}">

                                                </li>

                                                <li class="width3" id="show_main_photo" style="display: none;">

                                                    <img id="output">

                                                </li>

                                            </ul>

                                        </li>



                                        <li class="full">

                                            <label>Banner Text</label>

                                            <textarea name="banner_txt" class="form-control">{{ $data[0]['header_banner_contents'][0]['text'] }}</textarea>

                                             @error('banner_txt')
                                                <label  class="error" >{{ $message }}</label>
                                             @enderror
                                        </li>

                                        <li class="full">

                                            <label>Select Logo Image</label>

                                            <div>

                                                <input class="form-control" type="file" name="logo" id="file-upload-demo_1">



                                                <ul>

                                                <li style="margin-top: 20px;" id="old_main_photo_1">

                                                    <input type="hidden" name="logo" value="">

                                                        <img style="max-width: 300px;" src="{{asset('propertyUploads/'.$data[0]['header_logo'])}}">

                                                </li>

                                                    <li class="width3" id="show_main_photo_1" style="display: none;">

                                                        <img id="output_1">

                                                    </li>

                                                </ul>

                                            </div>

                                        </li>

                                        <li>

                                            <label>Facebook URl</label>

                                            <input value="{{ $data[0]['fb_link'] }}" name="facebook_url" type="text" class="form-control">
                                             @error('facebook_url')
                                                <label  class="error" >{{ $message }}</label>
                                             @enderror
                                        </li>

                                        <li>

                                            <label>Instagram URl</label>

                                            <input value="{{ $data[0]['insta_link'] }}" name="insta_url" type="text" class="form-control">
                                             @error('insta_url')
                                                <label  class="error" >{{ $message }}</label>
                                             @enderror
                                        </li>

                                        <li>

                                            <label>Tweeter URL</label>

                                            <input value="{{ $data[0]['tweeter_link'] }}" name="tweeter_url" type="text" class="form-control">
                                             @error('tweeter_url')
                                                <label  class="error" >{{ $message }}</label>
                                             @enderror
                                        </li>

                                        <li>

                                            <label>LinkedIn URL</label>

                                            <input value="{{ $data[0]['linkin_link'] }}" name="linkedin_url" type="text" class="form-control">
                                             @error('linkedin_url')
                                                <label  class="error" >{{ $message }}</label>
                                             @enderror
                                        </li>

                                        <li>

                                            <label>Footer Title</label>

                                            <input value="{{ $data[0]['footer_title'] }}" name="footer_title" type="text" class="form-control">
                                             @error('footer_title')
                                                <label  class="error" >{{ $message }}</label>
                                             @enderror
                                        </li>

                                        <li class="full">

                                            <label>Footer Text</label>

                                            <textarea name="footer_txt" class="form-control"> {{ $data[0]['footer_text'] }} </textarea>
                                             @error('footer_txt')
                                                <label  class="error" >{{ $message }}</label>
                                             @enderror
                                        </li>

                                        <li class="full">

                                            <label>Select Footer Logo Image</label>

                                            <div>

                                                <input class="form-control" type="file" name="footer_logo_img" id="file-upload-demo_00">

                                            </div>



                                            <ul>

                                                <li style="margin-top: 20px;" id="old_main_photo_00">

                                                    <img style="max-width: 300px;" src="{{asset('propertyUploads/'.$data[0]['footer_logo'])}}">

                                                </li>

                                                <li class="width3" id="show_main_photo_00" style="display: none;">

                                                    <img id="output_00">

                                                </li>

                                            </ul>

                                        </li>

                                        <li class="full">

                                            <label>Footer logo Text</label>

                                            <textarea name="footer_logo_txt" class="form-control"> {{ $data[0]['footer_logo_text'] }} </textarea>
                                             @error('footer_logo_txt')
                                                <label  class="error" >{{ $message }}</label>
                                             @enderror
                                        </li>

                                        <li class="full">

                                            <label>Footer Credits</label>

                                            <textarea name="footer_Credits" class="form-control"> {{ $data[0]['footer_Credits'] }} </textarea>
                                             @error('footer_Credits')
                                                <label  class="error" >{{ $message }}</label>
                                             @enderror
                                        </li>



                                        <li><input type="submit" class="btn btn-primary" value="Submit"></li>

                                    </ul>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@stop

@section('page-scripts')

    <script>

        $(document).ready(function () {



            $("#file-upload-demo").on("change", function(e) {

                $('#show_main_photo').show();

                $('#old_main_photo').hide();



                var reader = new FileReader();

                reader.onload = function(){

                    $('#output').attr('src', reader.result);

                };

                reader.readAsDataURL(event.target.files[0]);

            });



            $("#file-upload-demo_1").on("change", function(e) {

                $('#show_main_photo_1').show();

                $('#old_main_photo_1').hide();



                var reader = new FileReader();

                reader.onload = function(){



                    $('#output_1').attr('src', reader.result);

                };

                reader.readAsDataURL(event.target.files[0]);

            });



            $("#file-upload-demo_0").on("change", function(e) {

                $('#show_main_photo_0').show();

                $('#old_main_photo_0').hide();



                var reader = new FileReader();

                reader.onload = function(){



                    $('#output_0').attr('src', reader.result);

                };

                reader.readAsDataURL(event.target.files[0]);

            });



            $("#file-upload-demo_00").on("change", function(e) {

                $('#show_main_photo_00').show();

                $('#old_main_photo_00').hide();



                var reader = new FileReader();

                reader.onload = function(){



                    $('#output_00').attr('src', reader.result);

                };

                reader.readAsDataURL(event.target.files[0]);

            });



        });

    </script>



@endsection