@extends('layouts.admin_layout')

@section('title', 'WETO | Admins')

@section('content')

    <div class="app-main__inner">

        <div class="card-header-tab card-header">

            <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="pe-7s-map mr-3 text-muted opacity-6" style="font-size: 35px; color: #2d7b8a !important;"> </i>Add Admin</div>

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

                            <form action="{{ route('admin.create') }}" method="post" id="addAdminFrom" enctype="multipart/form-data">

                                @csrf

                                <ul class="search-form">

                                    <li>

                                        <label>Name</label>

                                        <input value="{{old('admin_name')}}" type="text" name="admin_name" placeholder="Type here...">

                                        @error('admin_name')

                                        <label  class="error" >{{ $message }}</label>

                                        @enderror

                                    </li>
                                    <li>

                                        <label>Email</label>

                                        <input value="{{old('email')}}" type="email" name="email" placeholder="Type here...">

                                        @error('email')

                                        <label  class="error" >{{ $message }}</label>

                                        @enderror

                                    </li>
                                    <li>

                                        <label>Password</label>

                                        <input value="" type="password" name="admin_password" id="admin_password" placeholder="Type here...">

                                        @error('admin_password')

                                        <label  class="error" >{{ $message }}</label>

                                        @enderror

                                    </li>
                                    <li>

                                        <label>Confirm Password</label>

                                        <input type="password" name="confirm_admin_password" placeholder="Type here...">

                                        @error('confirm_admin_password')

                                        <label  class="error" >{{ $message }}</label>

                                        @enderror

                                    </li>

                                    <li>

                                        <button type="submit" style="margin: 30px 0px 0px;" class="btn btn-primary pull-left">Add Admin</button>

                                    </li>

                                </ul>

                            </form>

                        </div>

                    </div>

                </div>

                <div class="col-md-12">

                    <div class="card mb-3">

                        <div class="card-header-tab card-header">

                            <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="pe-7s-note2 mr-3 text-muted opacity-6" style="font-size: 35px;"> </i>Admins List</div>

                        </div>

                        <div class="card-body">

                            <div class="table-responsive">

                                <table style="width: 100%;" class="table table-hover table-striped table-bordered table-cursor">

                                    <thead>

                                    <tr>

                                        <th>No</th>

                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Created at</th>

                                        <th>Action</th>

                                    </tr>

                                    </thead>

                                    <tbody id="append_list">



                                    </tbody>

                                </table>

                                <ul class="weto-pagination" id="example-2" style="display:none;">



                                </ul>

                            </div>

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

        var monthShortNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",

            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"

        ];



        $(document).ready(function () {

            window.onload = pageloading(0);



            function pageloading(page) {

                $('#example-2').pagination({

                    total: 1, // 总数据条数

                    current: 1, // 当前页码

                    length: 1, // 每页数据量

                    size: 1, // 显示按钮个数

                    prev: 'Previous',

                    next: 'Next',



                    ajax: function (options, refresh, $target) {

                        $.ajax({

                            type: "post",

                            url: '{{route('admin.list')}}',

                            data: {

                                "_token": "{{ csrf_token() }}",

                                'page_num': options.current,

                            },



                            success: function (data) {

                                data=JSON.parse(data);



                                var html = '';

                                var count = 1;

                                $.each(data['countries'], function (i, item) {

                                    var d = new Date(item.created_at);

                                    var created_at = d.getDate() + "-" + monthShortNames[d.getMonth()] + "-" + d.getFullYear();

                                    if(item.id == 1) {
                                        html = "" ;
                                    }else{

                                        html += '<tr>' +

                                            '<td>' + i + '</td>' +

                                            '<td>' + item.name +'</td>' +

                                            '<td>' + item.email +'</td>' +

                                            '<td>' + created_at + '</td>' +

                                            '<td>' +

                                            '<a href="'+window.location.origin+'/admin/admin-edit/'+item.id+'" class="tag edit_country" style="color: #ffffff;">Update</a>'+

                                            '<a type="button" class="tag delete_country" style="color: #ffffff;" data-id="'+item.id+'">Delete</a>'+

                                            '</td>' +

                                            '</tr>';
                                    }



                                    ++count;

                                });

                                $('#example-2').show();



                                if (html == "") {

                                    html += '<tr class="text-center">' +

                                        '<td colspan="4">No Admins Found.</td>' +

                                        '</tr>';

                                    $('#example-2').hide();

                                }



                                $('#append_list').html('');

                                $('#append_list').append(html);



                                refresh({

                                    total: data['total'], // 可选

                                    length: 10, // 可选

                                });

                            },

                            error: function () {

                                var html = '';

                                html += '<tr class="text-center">' +

                                    '<td colspan="4">No Admins Found.</td>' +

                                    '</tr>';

                                $('#append_list').html('');

                                $('#append_list').append(html);

                                $('#example-2').hide();

                            }

                        });

                    }

                });

            }







            $(document).on('click', '.delete_country', function () {

                var id=$(this).data('id');


                $.confirm({

                    title: 'Confirm!',

                    content: 'Are you sure you want to delete this admin?',

                    buttons: {

                        confirm: function () {

                            window.location.href = window.location.origin+"/admin/admin-delete/"+id ;
                        },

                        cancel: function () {

                            $.alert('Canceled!');

                        },

                    }

                });

            });



        });

    </script>

@endsection

