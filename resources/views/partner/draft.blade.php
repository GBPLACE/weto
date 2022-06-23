@extends('layouts.front_layout')
@section('title', 'WTEO | Drafts')
@section('subheader')
    <!--// Weto Subheader \\-->
    <div class="weto-subheader">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Drafts</h1>
                </div>
            </div>
        </div>
    </div>
    <!--// Weto Subheader \\-->
@endsection
@section('content')
    <!--// Main Section \\-->
    <div class="weto-main-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="margin-bottom: 10%;">
                    <div class="availability-table">
                        <table>
                            <tr>
                                <th>No</th>
                                <th>Property Name</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>Number</th>
                                <th>Capacity</th>
                                <th>Action</th>
                            </tr>
                            <tbody id="append_list">

                            </tbody>
                        </table>
                        <ul class="weto-pagination" id="example-2" style="display: none;">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-scripts')
    <script>
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
                            url: '{{route('getDrafts')}}',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                'page_num': options.current,
                            },

                            success: function (data) {
                                data=JSON.parse(data);

                                var html = '';
                                var count = 1;
                                $.each(data['draft'], function (i, item) {

                                    html += '<tr>' +
                                        '<td>' + count + '</td>' +
                                        '<td>' + item.name +'</td>' +
                                        '<td>' + item.country.country + '</td>' +
                                        '<td>' + item.city + '</td>' +
                                        '<td>' + item.number + '</td>' +
                                        '<td>' + item.capacity + '</td>' +
                                        '<td>' +
                                            '<a href="'+window.location.origin+'/partner/editProperty/'+item.id+'" class="btn btn-primary btn-sm" title="Update Property">Update</a>'+
                                            '<button type="button" class="btn btn-danger btn-sm delete_draft" data-id="'+item.id+'">Delete</button>'+
                                        '</td>' +
                                        '</tr>';
                                    ++count;
                                });
                                $('#example-2').show();

                                if (html == "") {
                                    html += '<tr class="text-center">' +
                                        '<td colspan="7">No Data</td>' +
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
                                    '<td colspan="7">No Data</td>' +
                                    '</tr>';
                                $('#append_list').html('');
                                $('#append_list').append(html);
                                $('#example-2').hide();
                            }
                        });
                    }
                });
            }

            $(document).on('click', '.delete_draft', function () {
                var id=$(this).data('id');

                $.confirm({
                    title: 'Confirm!',
                    content: 'Are you sure you want to delete this draft?',
                    buttons: {
                        confirm: function () {
                            $.ajax({
                                type: "post",
                                url: '{{route('deleteDraft')}}',
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    'id': id,
                                },
                                success: function (data) {
                                    data = JSON.parse(data);
                                    if (data=='success'){
                                        pageloading(0);
                                        $.alert('Draft deleted successfully.');
                                    }
                                    else{
                                        console.log('error');
                                        $.alert('Something went wrong.');
                                    }
                                },
                                error: function () {
                                    console.log('error');
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
