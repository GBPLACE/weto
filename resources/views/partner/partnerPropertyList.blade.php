@extends('layouts.front_layout')

@section('title', 'WTEO | Property List')

@section('subheader')

    <!--// Weto Subheader \\-->

    <div class="weto-subheader">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <h1>Property List</h1>

                </div>

                <div class="col-md-12 text-center">

                    <a href="{{route('addProperty')}}" class="submit2">Add New Property</a>

                </div>

            </div>

        </div>

    </div>

    <!--// Weto Subheader \\-->

@endsection

@section('content')



    <!--// Main Section \\-->

    <div class="weto-main-section weto-slider-sectionfull">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="weto-slider-section2">

                        <div class="row" id="append_list">



                        </div>

                    </div>

                    <ul class="weto-pagination" id="example-2" style="display: none">



                    </ul>

                </div>

            </div>

        </div>

    </div>

    <!--// Main Section \\-->

@endsection

@section('page-scripts')



    <script>

        $( document ).ready(function() {

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

                            url: '{{route('getPartnerProperties')}}',

                            //dataType: 'json',

                            data: {



                                "_token": "{{ csrf_token() }}",

                                'page_num': options.current,

                            },



                            success: function (data) {

                                data = JSON.parse(data);



                                var html = '';

                                $.each(data['property'], function (i, item) {

                                    var myStr = item.name ;
                                    myStr=myStr.toLowerCase();
                                    myStr=myStr.replace(/(^\s+|[^a-zA-Z0-9 ]+|\s+$)/g,"");   //this one
                                    myStr=myStr.replace(/\s+/g, "-");
                                    var property = myStr+"-"+item.id ;

                                    var status="" ;

                                    if( item.reject==1 ) {

                                        status = "<span class='banner-status-reject'>Rejected</span>" ;
                                    }
                                    else if( item.verify==1 ) {

                                        status = "<span class='banner-status'>Approved</span>" ;
                                    }
                                    else {

                                        status = "<span class='banner-status' style='background-color: gray;'>Pending For Approval</span>" ;
                                    }

                                    html +='<div class="layer">'+

                                        '<div class="weto-slider-wrap">'+

                                        '<figure>'+status+'<a href="'+window.location.origin+'/partner/partnerPropertyDetails/'+property+'" style="background-image: url('+window.location.origin+'/propertyUploads/'+item.property_main_photo.main_photo+');"></a>'+

                                        '<figcaption>'+

                                        '<a href="'+window.location.origin+'/partner/partnerPropertyDetails/'+property+'" class="fa fa-link" title="Property Details"></a>'+

                                        '<a href="'+window.location.origin+'/partner/editProperty/'+item.id+'" class="fa fa-edit" title="Update Property"></a>'+

                                        '<a type="button" data-toggle="modal" data-target="#deleteModal" class="fa fa-trash delete_property" style="color: white;" data-id="'+item.id+'" title="Delete Property"></a>'+

                                        '<br>'+

                                        '<a href="'+window.location.origin+'/partner/setUnavailability/'+item.id+'" style="padding: 0px 15px; width: auto; margin: 10px 0px 0px;">Set Availability</a>'+

                                        '</figcaption>'+

                                        '</figure>'+

                                        '<div class="weto-slider-text">'+

                                        '<h2><a href="'+window.location.origin+'/partner/partnerPropertyDetails/'+property+'">"'+item.name+'"</a></h2>'+

                                        '<span>'+item.currency+' '+item.price_per_night+' <small>Per Day</small></span>'+

                                        '<section>'+

                                        '<ul class="left-icon">'+

                                        '<li style="color: #ffffff;">'+item.bedroom+'  <i class="fa fa-bed"></i></li>'+

                                        '</ul>'+

                                        '<ul class="right-icon">'+

                                        '<li style="color: #ffffff;"><a href="https://maps.google.com/?q='+item.address+' street number '+item.number+' '+item.city+'" style="color: white;" target="_blank"><i class="fa fa-map-marker"></i> '+item.city+'<a></li>'+

                                        '</ul>'+
                                            

                                        '<div class="clearfix"></div>'+

                                        '<h3>'+

                                        '<span>'+item.currency+' '+item.price_per_night+'</span>'+

                                        '<small>Per Day</small>'+

                                        '</h3>'+

                                        '<a href="'+window.location.origin+'/partner/partnerPropertyDetails/'+property+'" class="simple-btn pull-right">'+item.click.length+' Clicks</a>'+

                                        '</section>'+

                                        '</div>'+

                                        '</div>'+

                                        '</div>';

                                });

                                $('#example-2').show();



                                if (html == "") {

                                    html += '<div class="col-md-12 text-center">'+

                                        '<p>You have no property.</p>'+

                                        '</div>';



                                    $('#example-2').hide();

                                }



                                $('#append_list').html('');

                                $('#append_list').append(html);



                                refresh({

                                    total: data['total'], // 可选

                                    length: 6, // 可选

                                });

                            },

                            error: function (data) {

                                var html = '';

                                html += '<div class="col-md-12 text-center">'+

                                    '<p>You have no property.</p>'+

                                    '</div>';

                                $('#append_list').html('');

                                $('#append_list').append(html);



                                $('#example-2').hide();

                            }

                        });

                    }

                });

            }



            $(document).on('click', '.delete_property', function () {

                var id=$(this).data('id');



                $.confirm({

                    title: 'Confirm!',

                    content: 'Are you sure you want to delete this property?',

                    buttons: {

                        confirm: function () {

                            $.ajax({

                                type: "post",

                                url: '{{route('deleteProperty')}}',

                                data: {

                                    "_token": "{{ csrf_token() }}",

                                    'id': id,

                                },

                                success: function (data) {

                                    data = JSON.parse(data);

                                    if (data=='success'){

                                        pageloading(0);

                                        $.alert('Property deleted successfully.');

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

