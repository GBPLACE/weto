@extends('layouts.front_layout')

@section('title', 'WETO | Wishlist')

@section('subheader')

    <!--// Weto Subheader \\-->

    <div class="weto-subheader">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <h1>Wishlist</h1>

                </div>

            </div>

        </div>

    </div>

    <!--// Weto Subheader \\-->

@endsection

@section('content')

    <!--// Main Section \\-->

    <div class="weto-main-section wishlist-full">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="weto-slider-section2">

                        <div class="row" id="append_list">



                        </div>

                    </div>

                    <ul class="weto-pagination" id="example-2" style="display: none;">



                    </ul>

                </div>

            </div>

        </div>

    </div>

    <!--// Main Section \\-->



    <!--// Subheader \\-->

    <div class="subheader">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="check-availability">

                        <h2>Check Availability</h2>

                        <form method="post" action="{{route('searchSend')}}" id="searchForm" enctype="multipart/form-data">

                            @csrf

                            <ul>

                                <li>

                                    <input name="city" id="city" type="text" class="form-control" placeholder="City">

                                    @error('city')

                                    <label  class="error" >{{ $message }}</label>

                                    @enderror

                                </li>

                                <li>

                                    <ul>

                                        <li>

                                            <input name="check_in" id="check_in" type="text" class="form-control dp1" placeholder="Check In" autocomplete="off">

                                            @error('check_in')

                                            <label  class="error" >{{ $message }}</label>

                                            @enderror

                                        </li>

                                        <li>

                                            <input name="check_out" id="check_out" type="text" class="form-control dp1" placeholder="Check Out" autocomplete="off">

                                            @error('check_out')

                                            <label  class="error" >{{ $message }}</label>

                                            @enderror

                                        </li>

                                    </ul>

                                </li>

                                <li>

                                    <input name="people" id="people" type="number" class="form-control" placeholder="People">

                                    @error('people')

                                    <label  class="error" >{{ $message }}</label>

                                    @enderror

                                </li>

                                <li>

                                    <input name="rooms" id="rooms" type="number" class="form-control" placeholder="Rooms">

                                    @error('rooms')

                                    <label  class="error" >{{ $message }}</label>

                                    @enderror

                                </li>

                                <li class="full center">

                                    <input type="submit" value="Check Availability" id="submit_search">

                                </li>

                            </ul>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!--// Subheader \\-->

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

                            url: '{{route('getWishList')}}',

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
                                    var property = myStr+"-"+item.id;

                                    html += '<div class="layer">'+

                                        '<div class="weto-slider-wrap">'+

                                        '<figure><a href="'+window.location.origin+'/propertyDetails/'+property+'" style="background-image: url('+window.location.origin+'/propertyUploads/'+item.property_main_photo.main_photo+');"></a>'+

                                        '<span type="button" class="delete_from_wishlist" data-id="'+data['wishlist_id'][i]+'"><i class="fa fa-heart" style="color: red;"></i> Remove From Wishlist</span>'+

                                        '<figcaption>'+

                                        '<a href="'+window.location.origin+'/propertyDetails/'+property+'" class="fa fa-link" title="Property Details"></a>'+

                                        '</figcaption>'+

                                        '</figure>'+

                                        '<div class="weto-slider-text">'+

                                        '<h2><a href="'+window.location.origin+'/propertyDetails/'+property+'">"'+item.name+'"</a></h2>'+

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

                                        '</h3>';

                                    if(item.property_url!=null){

                                        var url=item.property_url;

                                        var check=url.slice(0, 4);

                                        if (check!='http'){

                                            url='http://'+url;

                                        }

                                    }

                                    html +='<a href="'+url+'" target="_blank" data-id="'+item.id+'" class="simple-btn pull-right reservation">RESERVATION</a>'+

                                        '</section>'+

                                        '</div>'+

                                        '</div>'+

                                        '</div>';

                                });

                                $('#example-2').show();



                                $('#total_locations').text(data['total']);



                                if (html == "") {

                                    html += '<div class="col-md-12 text-center">'+

                                        '<p>No properties in wishlist.</p>'+

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

                                    '<p>No properties in wishlist.</p>'+

                                    '</div>';

                                $('#append_list').html('');

                                $('#append_list').append(html);

                                $('#example-2').hide();

                            }

                        });

                    }

                });

            }



            $(document).on('click', '.delete_from_wishlist', function () {

                var id=$(this).data('id');



                $.confirm({

                    title: 'Confirm!',

                    content: 'Are you sure you want to remove this property from wishlist?',

                    buttons: {

                        confirm: function () {

                            $.ajax({

                                type: "post",

                                url: '{{route('deleteFromWishList')}}',

                                data: {

                                    "_token": "{{ csrf_token() }}",

                                    'id': id,

                                },

                                success: function (data) {

                                    data = JSON.parse(data);

                                    if (data=='success'){

                                        pageloading(0);

                                        $.alert('Property removed from wishlist successfully.');

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



            $(document).on('click', '.reservation', function () {

                var id=$(this).data('id');



                $.ajax({

                    type: "post",

                    url: '{{route('addClick')}}',

                    data: {

                        "_token": "{{ csrf_token() }}",

                        'id': id,

                    },

                    success: function (data) {

                        data = JSON.parse(data);

                        if (data=='success'){

                            console.log('success');

                        }

                        else{

                            console.log('error');

                        }

                    },

                    error: function () {

                        console.log('error');

                    },

                });

            });



        });

    </script>

@endsection