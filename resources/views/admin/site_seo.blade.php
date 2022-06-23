@extends('layouts.admin_layout')
@section('title', 'WETO | Site SEO')
@section('content')
    <div class="app-main__inner">
        <div class="card-header-tab card-header">
            <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="pe-7s-map mr-3 text-muted opacity-6" style="font-size: 35px; color: #2d7b8a !important;"> </i>Add Site SEO</div>
        </div>
        <div class="tabs-animation">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            @if(session()->has('success'))
                                <div class="alert alert-success text-center">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            <form method="post"  action="{{ route('site.pages.seo') }}" id="site_seo">
                                {{ csrf_field()  }}
                                <ul class="search-form">
                                    <li>
                                        <label>Select SEO Page</label>
                                        <select style="width: 100%; border-radius: 6px;" name="site_page_number" id="site_pages">
                                            <option value="">Select Option</option>
                                            <option value="1">Home</option>
                                            <option value="2">Search</option>
                                            <option value="3">Become Host</option>
                                        </select>
                                        @error('site_page_number')
                                            <label  class="error" >{{ $message }}</label>
                                        @enderror
                                    </li>
                                    <li>
                                        <label>Page Title</label>
                                        <input name="page_title" type="text" placeholder="Type here...">
                                        <i class="fa fa-times"></i>
                                        <input name="seo_id" id="page_id" type="hidden" value="">

                                         @error('page_title')
                                            <label  class="error" >{{ $message }}</label>
                                        @enderror
                                    </li>
                                    <li>
                                        <label>Keywords</label>
                                        <input name="keywords" type="text" placeholder="Type here...">
                                         @error('keywords')
                                            <label  class="error" >{{ $message }}</label>
                                        @enderror
                                        <i class="fa fa-times"></i>
                                    </li>
                                    <li>
                                    <li class="full">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control" placeholder="Type here..."></textarea>
                                         @error('description')
                                            <label  class="error" >{{ $message }}</label>
                                        @enderror
                                    <li>
                                        <button type="submit" id="submit_search" style="margin: 30px 0px 0px;" class="btn btn-primary pull-left">Submit</button>
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

@section('page-scripts')
    <script>
        $( "#site_pages" ).change(function() {

            var id = $(this).val() ;
            $('.spinner').show();
            $.ajax({
                type: "post",
                url: '{{route('page.Seo.content')}}',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': id,
                },
                success: function (data) {
                    var json = JSON.parse(data) ;
                    //console.log( json ) ;

                    $('input[name="page_title"]').val( json.page_title ) ;
                    $('input[name="keywords"]').val( json.keywords ) ;
                    $('textarea[name="description"]').val( json.description ) ;
                    $('#page_id').val( json.id ) ;
                    $('.spinner').hide();
                },
                error: function () {
                    //console.log('error');
                    $('.spinner').hide();
                    $.alert('Something went wrong.');
                },
            });
        });
    </script>
@endsection

