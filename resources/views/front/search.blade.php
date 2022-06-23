@extends('layouts.front_layout')

@section('title', 'WETO | '.$siteSeo["page_title"])

@section('subheader')

    <!--// Subheader \\-->

    <div class="subheader" style="padding: 38px 0 5px;">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="check-availability">

                        <h2>explore properties</h2>

                        <form id="searchForm" enctype="multipart/form-data">

                            <ul>

                                <li><input name="city" id="city" @if(Request::segment(1)=='searchSend') value="{{$city}}" @endif type="text" class="form-control" placeholder="City"></li>

                                <li>

                                    <ul>

                                        <li><input name="check_in" id="check_in" @if(Request::segment(1)=='searchSend') value="{{$check_in}}" @endif onkeypress="return dateValidate(event);" type="text" class="form-control dp1" placeholder="Check In" autocomplete="off"></li>

                                        <li><input name="check_out" id="check_out" @if(Request::segment(1)=='searchSend') value="{{$check_out}}" @endif onkeypress="return dateValidate(event);" type="text" class="form-control dp1" placeholder="Check Out" autocomplete="off"></li>

                                    </ul>

                                </li>

                                <li><input name="people" id="people" @if(Request::segment(1)=='searchSend') value="{{$people}}" @endif type="number" min="1" class="form-control" placeholder="People"></li>

                                <li>
                                    <select name="accommodation" id="accommodation" class="form-control">
                                        <option value="" style="display: none;">Accommodation</option>
                                        <option @if(Request::segment(1)=='searchSend') @if($accommodation_search=='all') selected @endif @endif value="all">All</option>
                                        @if(count($accommodations))
                                            @foreach($accommodations as $accommodation)
                                                <option @if(Request::segment(1)=='searchSend') @if($accommodation_search==$accommodation->id) selected @endif @endif value="{{$accommodation->id}}">{{$accommodation->villa}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </li>

                                <li class="full center"><input type="button" value="Search" id="submit_search"></li>

                            </ul>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!--// Subheader \\-->

@endsection

@section('content')

    <!--// Main Section \\-->

    <div class="weto-main-section weto-slider-sectionfull">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <h2 class="fancy-title" id="search_total" style="display: none;">Found <span id="total_locations"></span> locations</h2>

                    <ul class="sorting">

                        <li><strong>More Options</strong></li>

                        <li>

                            <select name="type" id="type">

                                <option value="">Accommodation Type</option>

                                @foreach( $property_type_name as $property_type )
                                    <option value="{{ $property_type->id }}">{{ $property_type->name }}</option>
                                @endforeach


                            </select>

                        </li>

                        <li>

                            <select name="price_range" id="price_range">

                                <option value="">Price Range</option>

                                <option value="maxToMin">Maximum to Minimum</option>

                                <option value="minToMax">Minimum to Maximum</option>

                            </select>

                        </li>

                    </ul>

                    <div class="weto-slider-section2" id="append_list">



                    </div>

                    <ul class="weto-pagination" id="example-2" style="display: none;">



                    </ul>

                </div>

            </div>

        </div>

    </div>

    <!--// Main Section \\-->



    <!-- Inputs when redirected from other pages for search-->

    @if(Request::segment(1)=='searchSend')

        <input type="hidden" name="search_city" id="search_city" value="{{$city}}">

        <input type="hidden" name="search_check_in" id="search_check_in" value="{{$check_in}}">

        <input type="hidden" name="search_check_out" id="search_check_out" value="{{$check_out}}">

        <input type="hidden" name="search_people" id="search_people" value="{{$people}}">

        <input type="hidden" name="search_rooms" id="search_rooms" value="{{$accommodation_search}}">

    @else

        <input type="hidden" name="search_city" id="search_city" value="">

        <input type="hidden" name="search_check_in" id="search_check_in" value="">

        <input type="hidden" name="search_check_out" id="search_check_out" value="">

        <input type="hidden" name="search_people" id="search_people" value="">

        <input type="hidden" name="search_rooms" id="search_rooms" value="">

    @endif



@endsection

@section('page-scripts')

    <script>

        $( document ).ready(function() {

            var city=null;

            var check_in=null;

            var check_out=null;

            var people=null;

            var accommodation=null;

            var type=null;

            var price_range=null;



            if ($('#search_check_in').val()!='' && $('#search_check_in').val()!=null){

                city= $('#search_city').val();

                check_in= $('#search_check_in').val();

                check_out= $('#search_check_out').val();

                people= $('#search_people').val();

                accommodation= $('#accommodation :selected').val();



                pageloading(0);

                $('#search_total').show();

            }

            else{

                window.onload = pageloading(0);

            }



            $('#submit_search').on('click', function () {

                if($('#searchForm').valid()===true){

                    city= $('#city').val();

                    check_in= $('#check_in').val();

                    check_out= $('#check_out').val();

                    people= $('#people').val();

                    accommodation= $('#accommodation :selected').val();

                    type=$( "#type option:selected" ).val();
                    price_range=$( "#price_range option:selected" ).val();

                    pageloading(0);

                    $('#search_total').show();

                }

            });



            $('#type').on('change', function () {
                city= $('#city').val();
                check_in= $('#check_in').val();
                check_out= $('#check_out').val();
                people= $('#people').val();
                accommodation= $('#accommodation :selected').val();

                type=$( "#type option:selected" ).val();
                price_range=$( "#price_range option:selected" ).val();

                pageloading(0);

                $('#search_total').show();

            });



            $('#price_range').on('change', function () {
                city= $('#city').val();
                check_in= $('#check_in').val();
                check_out= $('#check_out').val();
                people= $('#people').val();
                accommodation= $('#accommodation :selected').val();

                type=$( "#type option:selected" ).val();
                price_range=$( "#price_range option:selected" ).val();

                pageloading(0);

                $('#search_total').show();

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

                            url: '{{route('getPropertiesList')}}',

                            //dataType: 'json',

                            data: {

                                "_token": "{{ csrf_token() }}",

                                'page_num': options.current,

                                'city': city,

                                'check_in': check_in,

                                'check_out': check_out,

                                'people': people,

                                'accommodation': accommodation,

                                'type' : type,

                                'price_range' : price_range,

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

                                        '<div class="weto-slider-wrap">'+

                                        '<figure><a href="'+window.location.origin+'/propertyDetails/'+property+'" style="background-image: url('+window.location.origin+'/propertyUploads/'+item.property_main_photo.main_photo+');"></a>'+

                                        '<figcaption>'+

                                        '<a href="'+window.location.origin+'/propertyDetails/'+property+'" class="fa fa-link" title="Property Details"></a>'+

                                        '</figcaption>'+

                                        '</figure>'+

                                        '<div class="weto-slider-text">'+

                                        '<h2><a href="'+window.location.origin+'/propertyDetails/'+property+'">"'+item.name+'"</a></h2>'+

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

                                        '<small>Per Day</small>'+

                                        '</h3>'+

                                        '</section>'+

                                        '</div>'+

                                        '</div>'+

                                        '</div>';

                                });



                                $('#total_locations').text(data['total']);

                                $('#example-2').show();



                                if (html == "") {

                                    html += '<div class="text-center">'+

                                        '<p>No properties found.</p>'+

                                        '</div>';

                                    $('#example-2').hide();

                                }



                                $('#append_list').html('');

                                $('#append_list').append(html);



                                refresh({

                                    total: data['total'], // 可选

                                    length: 18, // 可选

                                });

                            },

                            error: function (data) {

                                var html = '';

                                html += '<div class="text-center">'+

                                    '<p>No properties found.</p>'+

                                    '</div>';

                                $('#append_list').html('');

                                $('#append_list').append(html);

                                $('#example-2').hide();

                            }

                        });

                    }

                });

            }



        });

    </script>

    <script type="text/javascript">

        google.maps.event.addDomListener(window, 'load', function () {

            var places = new google.maps.places.Autocomplete(document.getElementById('city'));

            google.maps.event.addListener(places, 'place_changed', function () {



            });

        });

    </script>

@endsection