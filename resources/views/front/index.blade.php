@extends('layouts.front_layout')
@section('title',   'WETO | '.$siteSeo['page_title'])
@section('subheader')
    <!--// Banner \\-->
    <div class="weto-banner">
        <div class="weto-banner-slider">
            <div class="weto-banner-layer" style="background-image: url('{{asset('propertyUploads/'.$homeContent[0]['header_banner_contents'][0]['image'])}}');"></div>
        </div>
        <div class="banner-caption">
            <div class="weto-table">
                <div class="weto-table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="weto-table">
                                    <div class="weto-table-cell">
                                        <h1>{{ $homeContent[0]['header_banner_contents'][0]['text'] }}</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <form method="post" action="{{route('searchSend')}}" id="searchForm" enctype="multipart/form-data" class="banner-search">
                                    @csrf
                                    <h2>Check Availability</h2>
                                    <div class="cleafix"></div>
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
                                                    <label class="error" >{{ $message }}</label>
                                                    @enderror
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <input name="people" id="people" type="number" min="0" class="form-control" placeholder="People">
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
        </div>
    </div>
    <!--// Banner \\-->
@endsection
@section('content')

    <!--// Main Section \\-->
    <div class="weto-main-section weto-slider-sectionfull">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="fancy-title">Featured Properties</h2>
                    <div class="weto-slider-section">
                        @if(count($featured))
                            @foreach($featured as $property)
                                <div class="layer">
                                    <div class="weto-slider-wrap">
                                        @php
                                            $property_name = trim($property['name']," ");
                                            $property_name = strtolower($property_name) ;
                                            $property_name = preg_replace('/\s+/', '-', $property_name);
                                            $property_name = $property_name.'-'.$property['id'] ;
                                        @endphp
                                        <figure><a href="{{route('propertyDetails', [$property_name])}}" style="background-image: url('{{asset('propertyUploads/'.$property['property_main_photo']['main_photo'])}}');"></a>
                                        </figure>
                                        <div class="weto-slider-text">
                                            <h2><a href="{{route('propertyDetails', [$property_name])}}">"{{$property['name']}}"</a></h2>
                                            <span>{{$property['currency']}} {{$property['price_per_night']}} <small>per day</small></span>
                                            <section>
                                                <ul class="left-icon">
                                                    <li style="color: #ffffff;">{{$property['bedroom']}} <i class="fa fa-bed"></i></li>
                                                </ul>
                                                <ul class="right-icon">
                                                    <li style="color: #ffffff;"><a href="https://maps.google.com/?q={{$property['address'].' street number '.$property['number'].' '.$property['city']}}" target="_blank" style="color: white;"><i class="fa fa-map-marker"></i> {{$property['city']}}</a></li>
                                                </ul>
                                                <div class="clearfix"></div>
                                                <h3>
                                                    <span>{{$property['currency']}} {{$property['price_per_night']}}</span>
                                                    <br>
                                                    <small style="padding: 0">Per Day</small>
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
                                                <a href="{{$url}}" data-id="{{$property['id']}}" target="_blank" class="simple-btn pull-right reservation">RESERVATION</a>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-md-12 text-center">
                                <p>No featured properties to show.</p>
                            </div>
                        @endif
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

                                    @php
                                        $property_name = trim($property['name']," ");
                                        $property_name = strtolower($property_name) ;
                                        $property_name = preg_replace('/\s+/', '-', $property_name);
                                        $property_name = $property_name.'-'.$property['id'] ;
                                    @endphp
                                    <li class="col-md-3">
                                        <div class="weto-city-wrap">
                                            <figure><a href="{{route('propertyDetails', [$property_name])}}" style="background-image: url('{{asset('propertyUploads/'.$property['property_main_photo']['main_photo'])}}');"></a></figure>
                                            <div class="weto-city-text">
                                                <h2><a href="{{route('propertyDetails', [$property_name])}}">"{{$property['name']}}"</a></h2>
                                                <section>
                                                    <ul class="left-icon">
                                                        <li style="color: #ffffff;">{{$property['bedroom']}} <i class="fa fa-bed"></i></li>
                                                    </ul>
                                                    <ul class="right-icon">
                                                        <li style="color: #ffffff;"><a href="https://maps.google.com/?q={{$property['address'].' street number '.$property['number'].' '.$property['city']}}" target="_blank" style="color: white;"><i class="fa fa-map-marker"></i> {{$property['city']}}</a></li>
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
                                                    <a href="{{$url}}" data-id="{{$property['id']}}" target="_blank" class="simple-btn pull-right reservation">RESERVATION</a>
                                                </section>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <li class="col-md-12">
                                    <p class="text-center   ">No properties to show.</p>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--// Main Section \\-->


    <!--// Main Section \\-->
    <div class="weto-main-section weto-socialfull">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="fancy-title">WETO Social</h2>
                    <div class="weto-social">
                        <ul>
                            <li><a href="{{ $homeContent[0]['fb_link'] }}" target="_blank"><img src="{{asset('front/images/social1.png')}}" alt=""><span>Facebook</span></a></li>
                            <li><a href="{{ $homeContent[0]['insta_link'] }}" target="_blank"><img src="{{asset('front/images/social2.png')}}" alt=""><span>instagram</span></a></li>
{{--                            <li><a href="{{ $homeContent[0]['tweeter_link'] }}" target="_blank"><img src="{{asset('front/images/social3.png')}}" alt=""><span>Twitter</span></a></li>--}}
                            <li><a href="{{ $homeContent[0]['linkin_link'] }}" target="_blank"><img src="{{asset('front/images/social4.png')}}" alt=""><span>Linkedin</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--// Main Section \\-->

    <!--// Main Section \\-->
    <div class="weto-main-section weto-countfull">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="fancy-title">Accommodations</h2>
                    <div class="weto-count">
                        <ul>
                            <li>
                                <div class="numscroller" id="numscroller1"></div>
                                <span>{{$hotel_name}}</span>
                            </li>
                            <li>
                                <div class="numscroller" id="numscroller2"></div>
                                <span>{{$apartment_name}}</span>
                            </li>
                            <li>
                                <div class="numscroller" id="numscroller3"></div>
                                <span>{{$bb_name}}</span>
                            </li>
                            <li>
                                <div class="numscroller" id="numscroller5"></div>
                                <span>{{$villas_name}}</span>
                            </li>
                            <li>
                                <div class="numscroller" id="numscroller6"></div>
                                <span>Other</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--// Main Section \\-->

    @if (\Illuminate\Support\Facades\Cookie::get('privacy_policy') == null)
    <div class="js-cookie-consent cookie-consent fixed-bottom bg-success p-2 text-light text-center" id="cookie_div" style="background-color: #003333;">
        <span class="cookie-consent__message">
            We use cookies to give you the best online experience. By continuing to browse the site you are agreeing to our use of cookies and <a
                    href="/travel/terms-privacy-cookies-and-conditions" target="_blank" style="text-decoration: underline; color: #ffffff;">Privacy Policy</a>.
        </span>
        <button id="agree_btn" class="btn btn-sm btn-primary" style="background-color: #339999;">
            I Agree
        </button>
    </div>
    @endif
@endsection
@section('page-scripts')
    <script>
        $('#agree_btn').on('click', function () {
            $.ajax({
                type: "get",
                url: '{{route('setCookie')}}',
                success: function (data) {
                    $('#cookie_div').hide();
                },
                error: function () {
                    console.log('cookie error');
                },
            });
        });

        $(document).ready(function () {
            // Counter Function
            jQuery('#numscroller1').jQuerySimpleCounter({
                end:'{{$hotel}}',
                duration: 10000
            });
            jQuery('#numscroller2').jQuerySimpleCounter({
                end:'{{$apartment}}',
                duration: 10000
            });
            jQuery('#numscroller3').jQuerySimpleCounter({
                end:'{{$bb}}',
                duration: 10000
            });
            jQuery('#numscroller5').jQuerySimpleCounter({
                end:'{{$villas}}',
                duration: 10000
            });
            jQuery('#numscroller6').jQuerySimpleCounter({
                end:'{{$other}}',
                duration: 10000
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

    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', function () {
            var places = new google.maps.places.Autocomplete(document.getElementById('city'));
            google.maps.event.addListener(places, 'place_changed', function () {

            });
        });
    </script>
@endsection
