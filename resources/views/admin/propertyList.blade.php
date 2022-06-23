@extends('layouts.admin_layout')

@section('title', 'WETO | Properties List')

@section('content')

    <div class="app-main__inner">

        <div class="card-header-tab card-header">

            <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="pe-7s-map mr-3 text-muted opacity-6" style="font-size: 35px; color: #2d7b8a !important;"> </i>Properties</div>

        </div>

        <div class="tabs-animation">

            <div class="row">

                <div class="col-md-12">

                    <div class="card mb-3">

                        <div class="card-body">

                            <form action="" id="propertyListSearchForm">

                                <ul class="search-form">

                                    <li>

                                        <label>City</label>

                                        <input name="city" id="city" type="text" placeholder="Type here..." autocomplete="off">

                                        <i class="fa fa-times"></i>

                                    </li>

                                    <li>

                                        <label>People</label>

                                        <input name="people" id="people" type="text" placeholder="Type here...">

                                        <i class="fa fa-times"></i>

                                    </li>

                                    <li>

                                        <label>Rooms</label>

                                        <input name="rooms" id="rooms" type="text" placeholder="Type here...">

                                        <i class="fa fa-times"></i>

                                    </li>

                                    <li>

                                        <label>Accommodation Type</label>

                                        <select name="type" id="type">
                                            <option value="">Select Option</option>
                                            @foreach( $property_type_name as $property_type )
                                                <option value="{{ $property_type->id }}">{{ $property_type->name }}</option>
                                            @endforeach

                                        </select>

                                    </li>

                                    <li>

                                        <label>Blocked/ Available</label>

                                        <select name="block" id="block">

                                            <option value="">Select Option</option>

                                            <option value="1">Blocked</option>

                                            <option value="0">Available</option>

                                        </select>

                                    </li>

                                    <li>

                                        <button type="button" id="submit_search" style="margin: 30px 0px 0px;" class="btn btn-primary pull-left">Submit</button>

                                    </li>

                                </ul>

                            </form>

                        </div>

                    </div>

                </div>

                <div class="col-md-12">

                    <div class="card mb-3">

                        <div class="card-body">

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

        </div>

    </div>

@endsection

@section('page-scripts')

    <script type="text/javascript">

        google.maps.event.addDomListener(window, 'load', function () {

            var places = new google.maps.places.Autocomplete(document.getElementById('city'));

            google.maps.event.addListener(places, 'place_changed', function () {



            });

        });

    </script>

    <script>

        $( document ).ready(function() {

            window.onload = pageloading(0);



            var city=null;

            var people=null;

            var rooms=null;

            var type=null;

            var block=null;



            $('#submit_search').on('click', function () {

                if ($('#propertyListSearchForm').valid()===true){

                    city= $('#city').val();

                    people= $('#people').val();

                    rooms= $('#rooms').val();

                    type= $('#type :selected').val();

                    block= $('#block :selected').val();



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

                            url: '{{route('getPropertyListForAdmin')}}',

                            //dataType: 'json',

                            data: {

                                "_token": "{{ csrf_token() }}",

                                'page_num': options.current,

                                'city' : city,

                                'people' : people,

                                'rooms' : rooms,

                                'type' : type,

                                'block' : block,

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

                                    html +='<div class="layer">'+

                                        '<div class="weto-slider-wrap strip">'+

                                        '<figure>'+

                                        '<a href="'+window.location.origin+'/admin/viewPropertyDetails/'+property+'" style="background-image: url('+window.location.origin+'/propertyUploads/'+item.property_main_photo.main_photo+');">';



                                    if(item.featured==0){

                                        html   +='<label style="background-color: gray" class="add_to_featured" onclick="return false" type="button" data-id="'+item.id+'">Add to featured properties</label>';

                                    }

                                    else{

                                        html   +='<label style="background-color: #2C7A8A" class="remove_from_featured" onclick="return false" type="button" data-id="'+item.id+'">Remove from featured properties</label>';

                                    }

                                    if(item.block==1){

                                        html   +='<span>Blocked</span>';

                                    }

                                    html    +='</a>'+

                                        '<figcaption>'+

                                        '<a href="'+window.location.origin+'/admin/viewPropertyDetails/'+property+'" class="fa fa-link" title="Property Details"></a>'+

                                        '<a href="'+window.location.origin+'/admin/updateProperty/'+item.id+'" class="fa fa-edit" title="Update Property"></a>';

                                    if(item.block==0){

                                        html   +='<a href="javascript:void(0)" class="fa fa-ban block_property" style="color: white;" data-id="'+item.id+'" title="Block Property"></a>';

                                    }

                                    else{

                                        html   +='<a href="javascript:void(0)" class="fa fa-ban unblock_property" style="color: white;" data-id="'+item.id+'" title="Unblock Property"></a>';

                                    }

                                    html+='<a href="javascript:void(0)" class="fa fa-trash delete_property" style="color: white;" data-id="'+item.id+'" title="Delete Property"></a>'+

                                        '</figcaption>'+

                                        '</figure>'+

                                        '<div class="weto-slider-text">'+

                                        '<h2><a href="'+window.location.origin+'/admin/viewPropertyDetails/'+property+'">"'+item.name+'"</a></h2>'+

                                        '<span>'+item.currency+' '+item.price_per_night+' <small>per day</small></span>'+

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

                                        '<br><small>Per Day</small>'+

                                        '</h3>'+

                                        '</section>'+

                                        '</div>'+

                                        '</div>'+

                                        '</div>';

                                });

                                $('#example-2').show();





                                if (html == "") {

                                    html += '<div class="col-md-12 text-center">'+

                                        '<p>No property available.</p>'+

                                        '</div>';



                                    $('#example-2').hide();

                                }



                                $('#append_list').html('');

                                $('#append_list').append(html);



                                refresh({

                                    total: data['total'], // 可选

                                    length: 20, // 可选

                                });

                            },

                            error: function () {

                                var html = '';

                                html += '<div class="col-md-12 text-center">'+

                                    '<p>No property available.</p>'+

                                    '</div>';

                                $('#append_list').html('');

                                $('#append_list').append(html);



                                $('#example-2').hide();

                            }

                        });

                    }

                });

            }



            // Add to featured

            $(document).on('click', '.add_to_featured', function () {

                var id=$(this).data('id');



                $.confirm({

                    title: 'Confirm!',

                    content: 'Are you sure you want to add this to featured properties?',

                    buttons: {

                        confirm: function () {

                            $.ajax({

                                type: "post",

                                url: '{{route('addToFeatured')}}',

                                data: {

                                    "_token": "{{ csrf_token() }}",

                                    'id': id,

                                },

                                success: function (data) {

                                    data = JSON.parse(data);

                                    if (data=='success'){

                                        pageloading(0);

                                        $.alert('Property added to featured properties.');

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





            // Remove from featured

            $(document).on('click', '.remove_from_featured', function () {

                var id=$(this).data('id');



                $.confirm({

                    title: 'Confirm!',

                    content: 'Are you sure you want to remove this from featured properties?',

                    buttons: {

                        confirm: function () {

                            $.ajax({

                                type: "post",

                                url: '{{route('removeFromFeatured')}}',

                                data: {

                                    "_token": "{{ csrf_token() }}",

                                    'id': id,

                                },

                                success: function (data) {

                                    data = JSON.parse(data);

                                    if (data=='success'){

                                        pageloading(0);

                                        $.alert('Property removed from featured properties.');

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



            //block property

            $(document).on('click', '.block_property', function () {

                var id=$(this).data('id');



                $.confirm({

                    title: 'Confirm!',

                    content: 'Are you sure you want to block this property?',

                    buttons: {

                        confirm: function () {

                            $.ajax({

                                type: "post",

                                url: '{{route('blockProperty')}}',

                                data: {

                                    "_token": "{{ csrf_token() }}",

                                    'id': id,

                                },

                                success: function (data) {

                                    data = JSON.parse(data);

                                    if (data=='success'){

                                        pageloading(0);

                                        $.alert('Property blocked successfully.');

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



            //unblock property

            $(document).on('click', '.unblock_property', function () {

                var id=$(this).data('id');



                $.confirm({

                    title: 'Confirm!',

                    content: 'Are you sure you want to unblock this property?',

                    buttons: {

                        confirm: function () {

                            $.ajax({

                                type: "post",

                                url: '{{route('unblockProperty')}}',

                                data: {

                                    "_token": "{{ csrf_token() }}",

                                    'id': id,

                                },

                                success: function (data) {

                                    data = JSON.parse(data);

                                    if (data=='success'){

                                        pageloading(0);

                                        $.alert('Property unblocked successfully.');

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





            //delete property

            $(document).on('click', '.delete_property', function () {
                var id=$(this).data('id');
                $.confirm({
                    title: 'Confirm!',
                    content: 'This action CANNOT be undone. Are you sure you want to delete this property?'+
                        '<form action="" class="formName">' +
                        '<div class="form-group">' +
                        '<label>Add Reason</label>' +
                        '<textarea type="text" name="reason" id="reason" placeholder="Type here..." class="form-control" required></textarea>' +
                        '</div>' +
                        '</form>',
                    buttons: {
                        formSubmit: {
                            text: 'Submit',
                            btnClass: 'btn-blue',
                            action: function () {
                                var reason = this.$content.find('#reason').val();
                                if(!reason){
                                    $.alert('Reason is required.');
                                    return false;
                                }
                                $('.spinner').show();
                                var reason=$('#reason').val();

                                $.ajax({
                                    type: "post",
                                    url: '{{route('deletePropertyByAdmin')}}',
                                    data: {
                                        "_token": "{{ csrf_token() }}",
                                        'id': id,
                                        'reason': reason,
                                    },
                                    success: function (data) {
                                        data = JSON.parse(data);
                                        if (data == 'success') {
                                            pageloading(0);
                                            $('.spinner').hide();
                                            $.alert('Property deleted successfully.');

                                        }
                                        else {
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