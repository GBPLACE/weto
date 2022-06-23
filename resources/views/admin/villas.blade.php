@extends('layouts.admin_layout')
@section('title', 'WETO | Accommodations')
@section('content')
    <div class="app-main__inner">
        <div class="card-header-tab card-header">
            <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="pe-7s-map mr-3 text-muted opacity-6" style="font-size: 35px; color: #2d7b8a !important;"> </i>Add Accommodation</div>
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
                            <form action="{{route('villa.added')}}" method="post" id="villaForm">
                                @csrf
                                <ul class="search-form">
                                    <li>
                                        <label>Accommodation Name</label>
                                        <input type="text" name="villa_name" placeholder="Type here...">
                                        @error('villa_name')
                                        <label  class="error" >{{ $message }}</label>
                                        @enderror
                                    </li>
                                    <li>
                                        <button type="submit" style="margin: 30px 0px 0px;" class="btn btn-primary pull-left">Add</button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header-tab card-header">
                            <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="pe-7s-note2 mr-3 text-muted opacity-6" style="font-size: 35px;"> </i>Accommodations List</div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table style="width: 100%;" class="table table-hover table-striped table-bordered table-cursor">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Accommodation Name</th>
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
                            url: '{{route('villa.list')}}',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                'page_num': options.current,
                            },

                            success: function (data) {
                                data=JSON.parse(data);

                                var html = '';
                                var count = 1;
                                $.each(data['countries'], function (i, item) {
                                    var d = new Date(item.create_at);
                                    var created_at = d.getDate() + "-" + monthShortNames[d.getMonth()] + "-" + d.getFullYear();

                                    html += '<tr>' +
                                        '<td>' + count + '</td>' +
                                        '<td>' + item.villa +'</td>' +
                                        '<td>' + created_at + '</td>' +
                                        '<td>' +
                                        '<a type="button" class="tag edit_country" style="color: #ffffff;" data-id="'+item.id+'" data-villa="'+item.villa+'">Update</a>'+
                                        '<a type="button" class="tag delete_country" style="color: #ffffff;" data-id="'+item.id+'">Delete</a>'+
                                        '</td>' +
                                        '</tr>';
                                    ++count;
                                });
                                $('#example-2').show();

                                if (html == "") {
                                    html += '<tr class="text-center">' +
                                        '<td colspan="4">No Accommodation Found.</td>' +
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
                                    '<td colspan="4">No Accommodation Found.</td>' +
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
                    content: 'Are you sure you want to delete this Accommodation?',
                    buttons: {
                        confirm: function () {
                            $('.spinner').show();
                            $.ajax({
                                type: "post",
                                url: '{{route('villa.delete')}}',
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    'id': id,
                                },
                                success: function (data) {
                                    data = JSON.parse(data);
                                    if (data=='success'){
                                        pageloading(0);
                                        $('.spinner').hide();
                                        $.alert('Accommodation deleted successfully.');
                                    }
                                    else if(data=='exists'){
                                        $('.spinner').hide();
                                        $.alert('This Accommodation name is being used in some properties in the website so it cannot be deleted.');
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

            $(document).on('click', '.edit_country', function () {
                var id=$(this).data('id');

                var country_old=$(this).data('villa');

                $.confirm({
                    title: 'Update!',
                    content: '' +
                        '<form action="" class="formName">' +
                        '<div class="form-group">' +
                        '<label>Accommodation Name</label>' +
                        '<input type="text" name="villa" id="country" value="'+country_old+'" placeholder="Type here..." class="name form-control" required />' +
                        '</div>' +
                        '</form>',
                    buttons: {
                        formSubmit: {
                            text: 'Submit',
                            btnClass: 'btn-blue',
                            action: function () {
                                var name = this.$content.find('#country').val();
                                if(!name){
                                    $.alert('Accommodation name is required.');
                                    return false;
                                }
                                $('.spinner').show();
                                var country=$('#country').val();

                                $.ajax({
                                    type: "post",
                                    url: '{{route('villa.edit')}}',
                                    data: {
                                        "_token": "{{ csrf_token() }}",
                                        'id': id,
                                        'country': country,
                                    },
                                    success: function (data) {
                                        data = JSON.parse(data);
                                        if (data=='success'){
                                            pageloading(0);
                                            $('.spinner').hide();
                                            $.alert('Accommodation name updated successfully.');
                                        }
                                        else if(data=='exists'){
                                            $('.spinner').hide();
                                            $.alert('Accommodation name already exists.');
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
                            }
                        },
                        cancel: function () {
                            $.alert('Canceled!');
                        },
                    },
                });
            });

        });
    </script>
@endsection
