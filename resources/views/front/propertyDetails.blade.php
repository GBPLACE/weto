@extends('layouts.front_layout')

@section('title', 'WETO | Property Details')

@section('subheader')

    <!--// Weto Subheader \\-->

    <div class="weto-subheader">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <h1>Property Details</h1>

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

                @php

                    if (!is_null($property['property_photo_order'])){

                        $other_count=count($property['property_photo_order']);

                    }

                    else{

                        $other_count=0;

                    }

                    $count=$other_count+1;      //added one for main photo

                @endphp

                <div class="col-md-6">

                    <div class="main-img-slider">

                        <span><i class="fa fa-camera"></i> {{$count}}</span>

                        <div class="img-slider-wrap">

                            <figure><a class="main-img elem" href="{{asset('propertyUploads/'.$property['property_main_photo']['main_photo'])}}" data-lcl-thumb="{{asset('propertyUploads/'.$property['property_main_photo']['main_photo'])}}" style="background-image: url('{{asset('propertyUploads/'.$property['property_main_photo']['main_photo'])}}');"></a></figure>

                            @foreach($property['property_photo_order'] as $photo)

                                <figure><a class="main-img elem" href="{{asset('propertyUploads/'.$photo['other_photos'])}}" data-lcl-thumb="{{asset('propertyUploads/'.$photo['other_photos'])}}" style="background-image: url('{{asset('propertyUploads/'.$photo['other_photos'])}}');"></a></figure>

                            @endforeach

                        </div>

                        <div class="mini-slider-wrap">

                            <figure class="mini-img" style="background-image: url('{{asset('propertyUploads/'.$property['property_main_photo']['main_photo'])}}');"></figure>

                            @foreach($property['property_photo_order'] as $photo)

                                <figure class="mini-img" style="background-image: url('{{asset('propertyUploads/'.$photo['other_photos'])}}');"></figure>

                            @endforeach

                        </div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="description-wrap">

                        <h2 class="r-name">{{$property['name']}}</h2>
{{--                        Accommodation Type:--}}
{{--                        <strong><span>{{$property_type_name}}</span></strong>--}}
                        <hr>

                        <h2 class="f-title">Address:</h2>

                        <ul class="address-detail">
                            <li><strong>Country:</strong> <span>{{$property['country']['country']}}</span></li>
                            <li><strong>City:</strong> <span>{{$property['city']}}</span></li>
                            <li><strong>Province:</strong> <span>{{$property['province']}}</span></li>
                            <li><strong>Address:</strong> <span>{{$property['address']}}</span></li>
                            <li><strong>Number:</strong> <span>{{$property['number']}}</span></li>
                            @if(!is_null($property['floor'])) <li><strong>Floor:</strong> <span>{{$property['floor']}}@if($property['floor']==1) ST @elseif($property['floor']==2) ND @elseif($property['floor']==3) RD @else TH @endif</span></li> @endif
                            <li><strong>CAP or Postal Code:</strong> <span>{{$property['capacity']}}</span></li>
                        </ul>

                        <h3>Price: <span>{{$property['currency']}} {{$property['price_per_night']}} <small>/Per Day</small></span></h3>

                        <div class="clearfix"></div>

                        @php

                            if (!is_null($property['property_url'])){

                                $url=$property['property_url'];

                                $check=substr($url, 0, 4);

                                if ($check != 'http'){

                                    $url='http://'.$url;

                                }

                            }

                        @endphp

                        <a target="_blank" href="{{$url}}" data-id="{{$property['id']}}" class="round-btn reservation">Reservation</a>

                        @if(!is_null($wishList))
                            <a href="{{route('removeFromWishList',$wishList['id'])}}" class="round-btn">❤️Remove From Wishlist</a>
                        @else
                            <a href="{{route('addToWishList',$property['id'])}}" class="round-btn"><i class="fa fa-heart-o"></i>Add to Wishlist</a>
                        @endif

                        <a href="https://maps.google.com/?q={{$property['address'].' street number '.$property['number'].' '.$property['city']}}" target="_blank" class="round-btn">Google Map</a>
                    </div>

                </div>

                <div class="col-md-12">

                    <div class="description-wrap">

                        <h2 class="f-title">Features:</h2>

                        <ul class="features">

                            @if($property['bedroom'] > 0)

                                <li><img src="{{asset('front/icons/bed.png')}}"><strong>{{$property['bedroom']}}</strong> Bedrooms</li>

                            @endif

                            @if($property['bathroom'] > 0)

                                <li><img src="{{asset('front/icons/toilet.png')}}"><strong>{{$property['bathroom']}}</strong> Bathrooms</li>

                            @endif

                            @if($property['property_attribute']['terrace'] == 1)

                                <li><img src="{{asset('front/icons/terrace.png')}}"><span>Terrace</span></li>

                            @endif

                            @if($property['property_attribute']['pool'] == 1)

                                <li><img src="{{asset('front/icons/water.png')}}"><span>Pool</span></li>

                            @endif

                            @if($property['property_attribute']['tennis'] == 1)

                                <li><img src="{{asset('front/icons/tennis.png')}}"><span>Tennis</span></li>

                            @endif

                            @if($property['property_attribute']['spa'] == 1)

                                <li><img src="{{asset('front/icons/beach-house.png')}}"><span>Spa</span></li>

                            @endif

                            @if($property['property_attribute']['gym'] == 1)

                                <li><img src="{{asset('front/icons/gym.png')}}"><span>Gym</span></li>

                            @endif

                            @if($property['property_attribute']['kitchen'] == 1)

                                <li><img src="{{asset('front/icons/cooking.png')}}"><span>Kitchen</span></li>

                            @endif

                            @if($property['property_attribute']['breakfast'] == 1)

                                <li><img src="{{asset('front/icons/breakfast.png')}}"><span>Breakfast</span></li>

                            @endif

                            @if($property['property_attribute']['restaurant'] == 1)

                                <li><img src="{{asset('front/icons/dinner.png')}}"><span>Restaurant</span></li>

                            @endif

                            @if($property['property_attribute']['wifi'] == 1)

                                <li><i class="fa fa-wifi"></i><span>Wifi</span></li>

                            @endif

                            @if($property['property_attribute']['tv'] == 1)

                                <li><img src="{{asset('front/icons/television.png')}}"><span>TV</span></li>

                            @endif

                            @if($property['property_attribute']['elevator'] == 1)

                                <li><img src="{{asset('front/icons/elevator.png')}}"><span>Elevator</span></li>

                            @endif

                            @if($property['property_attribute']['safebox'] == 1)

                                <li><img src="{{asset('front/icons/safebox.png')}}"><span>Safebox</span></li>

                            @endif

                            @if($property['property_attribute']['ac'] == 1)

                                <li><img src="{{asset('front/icons/air-conditioner.png')}}"><span>A/C</span></li>

                            @endif

                            @if($property['property_attribute']['coffee'] == 1)

                                <li><img src="{{asset('front/icons/food.png')}}"><span>Coffee</span></li>

                            @endif

                            @if($property['property_attribute']['pets_allowed'] == 1)

                                <li><img src="{{asset('front/icons/pet-bottle.png')}}"><span>Pets Allowed</span></li>

                            @endif

                            @if($property['property_attribute']['reception'] == 1)

                                <li><img src="{{asset('front/icons/hotel.png')}}"><span>Reception</span></li>

                            @endif

                            @if($property['property_attribute']['hairdryer'] == 1)

                                <li><img src="{{asset('front/icons/hair-dryer.png')}}"><span>Hairdryer</span></li>

                            @endif

                            @if($property['property_attribute']['bathrobe'] == 1)

                                <li><img src="{{asset('front/icons/bathrobe.png')}}"><span>Bathrobe</span></li>

                            @endif

                            @if($property['property_attribute']['towels'] == 1)

                                <li><img src="{{asset('front/icons/towel.png')}}"><span>Towels</span></li>

                            @endif

                            @if($property['property_attribute']['kit_bathroom'] == 1)

                                <li><img src="{{asset('front/icons/fashion.png')}}"><span>Kit Bathroom</span></li>

                            @endif

                            @if($property['property_attribute']['shower'] == 1)

                                <li><img src="{{asset('front/icons/shower.png')}}"><span>Shower</span></li>

                            @endif

                            @if($property['property_attribute']['bathtub'] == 1)

                                <li><img src="{{asset('front/icons/bathtub.png')}}"><span>Bathtub</span></li>

                            @endif

                            @if($property['property_attribute']['dishwasher'] == 1)

                                <li><img src="{{asset('front/icons/dishwashing.png')}}"><span>Dishwasher</span></li>

                            @endif

                            @if($property['property_attribute']['iron'] == 1)

                                <li><img src="{{asset('front/icons/laundry-service.png')}}"><span>Iron</span></li>

                            @endif

                            @if($property['property_attribute']['ironboard'] == 1)

                                <li><img src="{{asset('front/icons/ironing.png')}}"><span>Ironboard</span></li>

                            @endif

                            @if($property['property_attribute']['baby_cot'] == 1)

                                <li><img src="{{asset('front/icons/baby.png')}}"><span>Baby Cot</span></li>

                            @endif

                            @if($property['property_attribute']['stroller'] == 1)

                                <li><img src="{{asset('front/icons/baby-crib.png')}}"><span>Stroller</span></li>

                            @endif

                            @if($property['property_attribute']['parking'] == 1)

                                <li><img src="{{asset('front/icons/car.png')}}"><span>Parking</span></li>

                            @endif

                            @if($property['property_attribute']['garage'] == 1)

                                <li><img src="{{asset('front/icons/garage.png')}}"><span>Garage</span></li>

                            @endif

                            @if($property['property_attribute']['check_in_24h'] == 1)

                                <li><i class="fa fa-check"></i><span>Check in 24h</span></li>

                            @endif

                            @if($property['property_attribute']['luggage_deposit'] == 1)

                                <li><img src="{{asset('front/icons/suitcase.png')}}"><span>Luggage Deposit</span></li>

                            @endif

                            @if($property['property_attribute']['washing_machine'] == 1)

                                <li><img src="{{asset('front/icons/washing-machine.png')}}"><span>Washing Machine</span></li>

                            @endif

                        </ul>

                    </div>

                </div>

                <div class="col-md-12">

                    <div class="description-wrap">

                        <h2 class="f-title">description</h2>

                        <p>{{$property['description']}}</p>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!--// Main Section \\-->



    <!--// Main Section \\-->

    <div class="weto-main-section weto-cityfull">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <h2 class="fancy-title">Top Properties</h2>

                    <div class="weto-city weto-top-city">

                        <ul class="row">

                            @if(count($properties))

                                @foreach($properties as $property)

                                    <li class="col-md-3">

                                        <div class="weto-city-wrap">
                                            @php
                                                $property_name = trim($property['name']," ");
                                                $property_name = strtolower($property_name) ;
                                                $property_name = preg_replace('/\s+/', '-', $property_name);
                                                $property_name = $property_name.'-'.$property['id'] ;
                                            @endphp

                                            <figure><a href="{{route('propertyDetails', [$property_name])}}" style="background-image: url('{{asset('propertyUploads/'.$property['property_main_photo']['main_photo'])}}');"></a></figure>

                                            <div class="weto-city-text">

                                                <h2><a href="{{route('propertyDetails', [$property_name])}}">"{{$property['name']}}"</a></h2>

                                                <section>

                                                    <ul class="left-icon">

                                                        <li style="color: #ffffff;">{{$property['bedroom']}} <i class="fa fa-bed"></i></li>

                                                    </ul>

                                                    <ul class="right-icon">
                                                        <li style="color: #ffffff;"><a href="https://maps.google.com/?q={{$property['address'].$property['city']}}" target="_blank" style="color: white;"><i class="fa fa-map-marker"></i> {{$property['city']}}</a></li>
                                                    </ul>

                                                    <div class="clearfix"></div>

                                                    <h3>

                                                        <span>{{$property['currency']}} {{$property['price_per_night']}}</span>

                                                        <small>Per Day</small>

                                                    </h3>

                                                    @php

                                                        if (!is_null($property['property_url'])){

                                                            $url=$property['property_url'];

                                                            $check=substr($url, 0, 4);

                                                            if ($check != 'http'){

                                                                $url='http://'.$url;

                                                            }

                                                        }

                                                    @endphp

                                                    <a  href="{{$url}}" data-id="{{$property['id']}}" target="_blank" class="simple-btn pull-right reservation">RESERVATION</a>

                                                </section>

                                            </div>

                                        </div>

                                    </li>

                                @endforeach

                            @else

                                <li class="col-md-12">

                                    <p class="text-center">No properties to show.</p>

                                </li>

                            @endif

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!--// Main Section \\-->



    <!--// Subheader \\-->

    <div class="subheader subheaderfull">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="check-availability">

                        <h2>Check Availability</h2>

                        <form method="post" action="{{route('searchSend')}}" id="searchForm" enctype="multipart/form-data">

                            @csrf

                            <ul>

                                <li>

                                    <input name="city" id="city" type="text" class="form-control" placeholder="City" autocomplete="off">

                                    @error('city')

                                    <label  class="error" >{{ $message }}</label>

                                    @enderror

                                </li>

                                <li>

                                    <ul>

                                        <li>

                                            <input name="check_in" id="check_in" onkeypress="return dateValidate(event);" type="text" class="form-control dp1" placeholder="Check In" autocomplete="off">

                                            @error('check_in')

                                            <label  class="error" >{{ $message }}</label>

                                            @enderror

                                        </li>

                                        <li>

                                            <input name="check_out" id="check_out" onkeypress="return dateValidate(event);" type="text" class="form-control dp1" placeholder="Check Out" autocomplete="off">

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

                                    <select name="accommodation" id="accommodation" class="form-control">
                                        <option value="" style="display: none;">Accommodation</option>
                                        <option value="all">All</option>
                                        @if(count($accommodations))
                                            @foreach($accommodations as $accommodation)
                                                <option value="{{$accommodation->id}}">{{$accommodation->villa}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('accommodation')
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

        // image popup lightbox

        lc_lightbox('.elem', {

            wrap_class: 'lcl_fade_oc',

            gallery : true,

            thumb_attr: 'data-lcl-thumb',



            skin: 'minimal',

            radius: 0,

            padding : 0,

            border_w: 0,

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

    </script>


    <script type="text/javascript">

        google.maps.event.addDomListener(window, 'load', function () {

            var places = new google.maps.places.Autocomplete(document.getElementById('city'));

            google.maps.event.addListener(places, 'place_changed', function () {



            });

        });

    </script>

@endsection