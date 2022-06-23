@extends('layouts.admin_layout')
@section('title', 'WETO | Users List')
@section('content')
    <div class="app-main__inner">
        <div class="card-header-tab card-header">
            <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="pe-7s-map mr-3 text-muted opacity-6" style="font-size: 35px; color: #2d7b8a !important;"> </i>Search</div>
        </div>
        <div class="tabs-animation">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <form id="userFrom" enctype="multipart/form-data" onsubmit="return false">
                                <ul class="search-form">
                                    <li>
                                        <label>Name</label>
                                        <input type="text" name="name" id="name" placeholder="Type here...">
                                        <i class="fa fa-times"></i>
                                    </li>
                                    <li>
                                        <button type="submit" id="search_btn" style="margin: 30px 0px 0px;" class="btn btn-primary pull-left">Search</button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header-tab card-header">
                            <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="pe-7s-note2 mr-3 text-muted opacity-6" style="font-size: 35px;"> </i>Users List</div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table style="width: 100%;" class="table table-hover table-striped table-bordered table-cursor">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
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
        $(document).ready(function () {
            window.onload = pageloading(0);

            var name=null;

            $('#search_btn').on('click', function () {
                if ($('#userFrom').valid()===true){
                    name= $('#name').val();

                    pageloading(0);
                }
            });

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
                            url: '{{route('getUsersList')}}',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                'page_num': options.current,
                                'name' : name,
                            },

                            success: function (data) {
                                data=JSON.parse(data);

                                var html = '';
                                var count = 1;
                                $.each(data['users'], function (i, item) {

                                    html += '<tr>' +
                                        '<td>' + count + '</td>' +
                                        '<td>' + item.name +'</td>' +
                                        '<td>' + item.email + '</td>' +
                                        '<td>' +
                                            '<a type="button" class="tag delete_users" style="color: #ffffff;" data-id="'+item.id+'">Delete Account</a>'+
                                        '</td>' +
                                        '</tr>';
                                    ++count;
                                });
                                $('#example-2').show();
                                
                                if (html == "") {
                                    html += '<tr class="text-center">' +
                                        '<td colspan="4">No Users Found.</td>' +
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
                                    '<td colspan="4">No Users Found.</td>' +
                                    '</tr>';
                                $('#append_list').html('');
                                $('#append_list').append(html);
                                $('#example-2').hide();
                            }
                        });
                    }
                });
            }

            $(document).on('click', '.delete_users', function () {
                var id=$(this).data('id');

                $.confirm({
                    title: 'Confirm!',
                    content: 'This action CANNOT be undone. Are you sure you want to delete this user?',
                    buttons: {
                        confirm: function () {
                            $('.spinner').show();
                            $.ajax({
                                type: "post",
                                url: '{{route('deleteUser')}}',
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    'id': id,
                                },
                                success: function (data) {
                                    data = JSON.parse(data);
                                    if (data=='success'){
                                        pageloading(0);
                                        $('.spinner').hide();
                                        $.alert('User deleted successfully.');
                                    }
                                    else{
                                        $('.spinner').hide();
                                        $.alert('Something went wrong.');
                                    }
                                },
                                error: function () {
                                    $('.spinner').hide();
                                    $.alert('Something went wrong.');
                                },
                            });
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
