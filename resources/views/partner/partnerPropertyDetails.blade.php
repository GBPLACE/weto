@extends('layouts.front_layout')
@section('title', 'WTEO | Property Details')
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
                        <a href="{{route('editProperty', [$property['id']])}}" class="round-btn">Update Details</a>
                        @php
                            if (!is_null($property['property_url'])){
                                $url=$property['property_url'];
                                $check=substr($url, 0, 4);
                                if ($check != 'http'){
                                    $url='http://'.$url;
                                }
                            }
                        @endphp
                        <a target="_blank" href="{{$url}}" class="round-btn">Property Url</a>
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
                        <h2 class="f-title">Description</h2>
                        <p>{{$property['description']}}</p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row m-4">
                        <div>
                            <label>Select Year</label>
                            <select id="year">
                                @for($i=2020; $i<= 2050; $i++)
                                    <option @if(date('Y')==$i) selected @endif value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="ml-2">
                            <label>Select Month</label>
                            <select id="month">
                                <option @if(date('m')==1) selected @endif value="1">Jan</option>
                                <option @if(date('m')==2) selected @endif value="2">Fab</option>
                                <option @if(date('m')==3) selected @endif value="3">Mar</option>
                                <option @if(date('m')==4) selected @endif value="4">Apr</option>
                                <option @if(date('m')==5) selected @endif value="5">May</option>
                                <option @if(date('m')==6) selected @endif value="6">Jun</option>
                                <option @if(date('m')==7) selected @endif value="7">Jul</option>
                                <option @if(date('m')==8) selected @endif value="8">Aug</option>
                                <option @if(date('m')==9) selected @endif value="9">Sep</option>
                                <option @if(date('m')==10) selected @endif value="10">Oct</option>
                                <option @if(date('m')==11) selected @endif value="11">Nov</option>
                                <option @if(date('m')==12) selected @endif value="12">Dec</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-7" id="remove_graph">
                    <canvas id="graph" width="700" height="300" align="center"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!--// Main Section \\-->

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
    </script>
    <script src="{{asset('front/script/topup.js')}}"></script>
    <script>
        $(document).ready(function() {
            var month=$('#month :selected').val();
            var year=$('#year :selected').val();
            window.onload = graph(month, year);

            $('#month').on('change', function () {
                var month=$('#month :selected').val();
                var year=$('#year :selected').val();
                graph(month, year);
            });

            $('#year').on('change', function () {
                var month=$('#month :selected').val();
                var year=$('#year :selected').val();
                graph(month, year);
            });

        });

        function graph(month, year) {
            $.ajax({
                type: "post",
                url: '{{route('getGraphData')}}',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'month': month,
                    'year': year,
                    'property_id': '{{$id}}',
                },
                success: function (data) {
                    data = JSON.parse(data);
                    //alert(data);
                    $('#remove_graph').html('');
                    $('#remove_graph').append('<canvas id="graph" width="700" height="300" align="center"></canvas>');

                    var chartData = {
                        node: "graph",
                        dataset: data,
                        labels: ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"],
                        pathcolor: "#288ed4",
                        fillcolor: "#8e8e8e",
                        xPadding: 0,
                        yPadding: 0,
                        ybreakperiod: 50
                    };
                    drawlineChart(chartData);
                },
                error: function () {
                    console.log('error');
                },
            });
        }
    </script>
@endsection