@extends('layouts.register_layout')

@section('title', 'WETO | Add Property')

@section('content')

    <!--<div class="weto-add-pro-wrap">-->

    <!--    <div class="weto-table">-->

    <!--        <div class="weto-table-cell">-->

                <form action="{{route('submitProperty')}}" method="post" class="form-wrpper" id="addPropertyForm" enctype="multipart/form-data">

                    @csrf

                    <section class="form-cntr login-form" id="one">

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

                        @if ($errors->any())

                            <div class="alert alert-danger text-center">

                                @foreach ($errors->all() as $error)

                                    {{$error}}

                                @endforeach

                            </div>

                        @endif

                        <ul>

                            <li>

                                <input name="name" value="{{old('name')}}" type="text" class="form-control" placeholder="Property Name">

                                @error('name')

                                <label  class="error" >{{ $message }}</label>

                                @enderror

                            </li>

                            <li>

                                <select name="Villa_category" id="Villa_category" class="form-control">

                                    <option value="" style="display: none;">Accommodation</option>
                                    @foreach( $villas as $villa )
                                        <option value="{{ $villa->id }}">{{ $villa->villa }}</option>

                                    @endforeach
                                </select>

                                @error('country_id')

                                <label  class="error" >{{ $message }}</label>

                                @enderror

                            </li>

                            <li>

                                <select name="country_id" id="country_id" class="form-control">

                                    <option value="" style="display: none;">Select Country</option>

                                    @if(count($countries))

                                        @foreach($countries as $country)

                                            <option value="{{$country->id}}">{{$country->country}}</option>

                                        @endforeach

                                    @endif

                                    <option value="other_country">Other</option>

                                </select>

                                @error('country_id')

                                <label  class="error" >{{ $message }}</label>

                                @enderror

                            </li>

                            <li>

                                <input name="city" id="city" value="{{old('city')}}" type="text" class="form-control" placeholder="City" autocomplete="off">

                                @error('city')

                                <label  class="error" >{{ $message }}</label>

                                @enderror

                            </li>

                            <li>

                                    <input name="province_name" id="province_name" value="" type="text" class="form-control" placeholder="Province">

                                @error('province_name')

                                <label  class="error" >{{ $message }}</label>

                                @enderror
                            </li>

                            <li id="country_name_li" style="display: none;">

                                <input name="country_name" id="country_name" value="{{old('country_name')}}" type="text" class="form-control" placeholder="Country Name">

                                @error('country_name')

                                <label  class="error" >{{ $message }}</label>

                                @enderror

                            </li>

                            <li>

                                <input name="address" value="{{old('address')}}" type="text" class="form-control" placeholder="Address">

                                @error('address')

                                <label  class="error" >{{ $message }}</label>

                                @enderror

                            </li>

                            <li>

                                <ul>

                                    <li>

                                        <input name="number" value="{{old('number')}}" type="text" class="form-control" placeholder="Number">

                                        @error('number')

                                        <label  class="error" >{{ $message }}</label>

                                        @enderror

                                    </li>

                                    <li>

                                        <input name="capacity" value="{{old('capacity')}}" style="padding-left: 10px;" type="text" class="form-control" placeholder="CAP or Postal Code">

                                        @error('capacity')

                                        <label  class="error" >{{ $message }}</label>

                                        @enderror

                                    </li>

                                </ul>

                            </li>

                            <li>

                                <a href="javascript:void(0)" class="one1 submit2 pull-right">Next Step</a>

                            </li>

                        </ul>

                    </section>

                    <section class="form-cntr login-form" id="two">

                        <ul>

                            <li>

                                <input name="number_of_people" value="{{old('number_of_people')}}" style="padding-left: 10px;" type="text" class="form-control" placeholder="Maximum Number of People">

                                @error('number_of_people')

                                <label  class="error" >{{ $message }}</label>

                                @enderror

                            </li>

                            <li>

                                <select name="type" class="form-control">

                                    <option value="" style="display: none;">Accommodation Type</option>

                                    @foreach( $property_types as $property_type )

                                        <option value="{{ $property_type->id }}">{{ $property_type->name }}</option>
                                    @endforeach



{{--                                    <option value="Apartment">Apartment</option>--}}

{{--                                    <option value="House">House</option>--}}

{{--                                    <option value="Hotel">Hotel</option>--}}

{{--                                    <option value="Hostel">Hostel</option>--}}

{{--                                    <option value="Loft">Loft</option>--}}

{{--                                    <option value="Other">Other</option>--}}

                                </select>

                                @error('type')

                                <label  class="error" >{{ $message }}</label>

                                @enderror

                            </li>

                            <li>

                                <select name="bedroom" id="" class="form-control">

                                    <option value="" style="display:none;">Bedroom</option>

                                    <option value="0">0</option>

                                    <option value="1">1</option>

                                    <option value="2">2</option>

                                    <option value="3">3</option>

                                    <option value="4">4</option>

                                    <option value="5">5</option>

                                    <option value="6">6</option>

                                    <option value="7">7</option>

                                    <option value="8">8</option>

                                    <option value="9">9</option>

                                    <option value="10">10</option>


                                </select>

                                @error('bedroom')

                                <label  class="error" >{{ $message }}</label>

                                @enderror

                            </li>

                            <li>

                                <select name="bathroom" id="" class="form-control">

                                    <option value="" style="display:none;">Bathroom</option>

                                    <option value="0">0</option>

                                    <option value="1">1</option>

                                    <option value="2">2</option>

                                    <option value="3">3</option>

                                    <option value="4">4</option>

                                    <option value="5">5</option>

                                </select>

                                @error('bathroom')

                                <label  class="error" >{{ $message }}</label>

                                @enderror

                            </li>

                            <li>

                                <input name="floor" value="{{old('floor')}}" type="text" class="form-control" placeholder="Floor">

                                @error('floor')

                                <label  class="error" >{{ $message }}</label>

                                @enderror

                            </li>

                            <li>

                                <a href="javascript:void(0)" class="one2 submit2 pull-left">Back Step</a>

                                <a href="javascript:void(0)" class="two1 submit2 pull-right">Next Step</a>

                            </li>

                        </ul>

                    </section>

                    <section class="form-cntr" id="three">

                        <div class="checkbox-section">

                            <ul>

                                <li><input name="terrace" value="1" id="1" type="checkbox"><label for="1">Terrace</label></li>

                                <li><input name="pool" value="1" id="2" type="checkbox"><label for="2">Pool</label></li>

                                <li><input name="tennis" value="1" id="3" type="checkbox"><label for="3">Tennis</label></li>

                                <li><input name="spa" value="1" id="4" type="checkbox"><label for="4">spa</label></li>

                                <li><input name="gym" value="1" id="5" type="checkbox"><label for="5">Gym</label></li>

                                <li><input name="kitchen" value="1" id="6" type="checkbox"><label for="6">Kitchen</label></li>

                                <li><input name="breakfast" value="1" id="7" type="checkbox"><label for="7">Breakfast</label></li>

                                <li><input name="restaurant" value="1" id="8" type="checkbox"><label for="8">Restaurant</label></li>

                                <li><input name="wifi" value="1" id="9" type="checkbox"><label for="9">Wifi</label></li>

                                <li><input name="tv" value="1" id="10" type="checkbox"><label for="10">TV</label></li>

                                <li><input name="elevator" value="1" id="a" type="checkbox"><label for="a">Elevator</label></li>

                                <li><input name="safebox" value="1" id="b" type="checkbox"><label for="b">Safebox</label></li>

                                <li><input name="ac" value="1" id="c" type="checkbox"><label for="c">A/C</label></li>

                                <li><input name="coffee" value="1" id="d" type="checkbox"><label for="d">Coffee</label></li>

                                <li><input name="pets_allowed" value="1" id="e" type="checkbox"><label for="e">Pets Allowed</label></li>

                                <li><input name="reception" value="1" id="f" type="checkbox"><label for="f">Reception</label></li>

                                <li><input name="hairdryer" value="1" id="g" type="checkbox"><label for="g">Hairdryer</label></li>

                                <li><input name="bathrobe" value="1" id="h" type="checkbox"><label for="h">Bathrobe</label></li>

                                <li><input name="towels" value="1" id="i" type="checkbox"><label for="i">Towels</label></li>

                                <li><input name="kit_bathroom" value="1" id="j" type="checkbox"><label for="j">Kit bathroom</label></li>

                                <li><input name="shower" value="1" id="k" type="checkbox"><label for="k">Shower</label></li>

                                <li><input name="bathtub" value="1" id="l" type="checkbox"><label for="l">Bathtub</label></li>

                                <li><input name="dishwasher" value="1" id="m" type="checkbox"><label for="m">Dishwasher</label></li>

                                <li><input name="washing_machine" value="1" id="n" type="checkbox"><label for="n">Washing machine</label></li>

                                <li><input name="iron" value="1" id="o" type="checkbox"><label for="o">Iron</label></li>

                                <li><input name="ironboard" value="1" id="p" type="checkbox"><label for="p">Ironboard</label></li>

                                <li><input name="baby_cot" value="1" id="q" type="checkbox"><label for="q">Baby Cot</label></li>

                                <li><input name="stroller" value="1" id="r" type="checkbox"><label for="r">Stroller</label></li>

                                <li><input name="parking" value="1" id="s" type="checkbox"><label for="s">Parking</label></li>

                                <li><input name="garage" value="1" id="t" type="checkbox"><label for="t">Garage</label></li>

                                <li><input name="check_in_24h" value="1" id="u" type="checkbox"><label for="u">Check in 24h</label></li>

                                <li><input name="luggage_deposit" value="1" id="w" type="checkbox"><label for="w">Luggage deposit</label></li>

                            </ul>

                        </div>

                        <div class="clearfix"></div>

                        <div class="login-form" style="margin: 0px;">

                            <a href="javascript:void(0)" class="two2 submit2 pull-left">Back Step</a>

                            <a href="javascript:void(0)" class="three1 submit2 pull-right">Next Step</a>

                        </div>

                    </section>

                    <section class="form-cntr login-form" id="four">

                        <ul>

                            <li>

                                <textarea name="description" style="height: 400px;" class="form-control" placeholder="Description">{{old('description')}}</textarea>

                                @error('description')

                                <label  class="error" >{{ $message }}</label>

                                @enderror

                            </li>

                            <li>

                                <a href="javascript:void(0)" class="three2 submit2 pull-left">Back Step</a>

                                <a href="javascript:void(0)" class="four1 submit2 pull-right">Next Step</a>

                            </li>

                        </ul>

                    </section>

                    <section class="form-cntr login-form" id="five">

                        <ul>

                            <li>

                                <input name="price_per_night" value="{{old('price_per_night')}}" type="text" class="form-control" placeholder="Price Per Night">

                                @error('price_per_night')

                                <label  class="error" >{{ $message }}</label>

                                @enderror

                            </li>

                            <li>

                                <select name="currency" class="form-control">

                                    <option value="" style="display: none;">Select Currency</option>

                                    <option value="Euro - €">Euro - €</option>

                                    <option value="THB - ฿">THB - ฿</option>

                                    <option value="CRC - ₡">CRC - ₡</option>

                                    <option value="CRC - ₡">CRC - ₡</option>

                                    <option value="CZK - Kč">CZK - Kč</option>

                                    <option value="DKK - kr">DKK - kr</option>

                                    <option value="NOK - kr">NOK - kr</option>

                                    <option value="SEK - kr">SEK - kr</option>

                                    <option value="AED - د.إ">AED - د.إ</option>

                                    <option value="MAD">MAD</option>

                                    <option value="AUD - $">AUD - $</option>

                                    <option value="CAD - $">CAD - $</option>

                                    <option value="HKD - $">HKD - $</option>

                                    <option value="SGD - $">SGD - $</option>

                                    <option value="NZD - $">NZD - $</option>

                                    <option value="USD - $">USD - $</option>

                                    <option value="HUF - Ft">HUF - Ft</option>

                                    <option value="CHF">CHF</option>

                                    <option value="HRK - kn">HRK - kn</option>

                                    <option value="RON - lei">RON - lei</option>

                                    <option value="BGN - лв">BGN - лв</option>

                                    <option value="TRY - ₺">TRY - ₺</option>

                                    <option value="TWD - $">TWD - $</option>

                                    <option value="ILS - ₪">ILS - ₪</option>

                                    <option value="CLP - $">CLP - $</option>

                                    <option value="COP - $">COP - $</option>

                                    <option value="PHP - ₱">PHP - ₱</option>

                                    <option value="MXN - $">MXN - $</option>

                                    <option value="UYU - $U">UYU - $U</option>

                                    <option value="ZAR - R">ZAR - R</option>

                                    <option value="BRL - R$">BRL - R$</option>

                                    <option value="MYR - RM">MYR - RM</option>

                                    <option value="SAR - SR">SAR - SR</option>

                                    <option value="RUB - ₽">RUB - ₽</option>

                                    <option value="INR - ₹">INR - ₹</option>

                                    <option value="PEN - S/">PEN - S/</option>

                                    <option value="GBP - £">GBP - £</option>

                                    <option value="KRW - ₩">KRW - ₩</option>

                                    <option value="JYP - ¥">JYP - ¥</option>

                                    <option value="CNY - ¥">CNY - ¥</option>

                                    <option value="PLN - zł">PLN - zł</option>

                                </select>

                                @error('currency')

                                <label  class="error" >{{ $message }}</label>

                                @enderror

                            </li>

                            <li>

                                <input name="each_extra_guest"  value="{{old('each_extra_guest')}}" type="text" class="form-control" placeholder="Each Extra Guest">

                                @error('each_extra_guest')

                                <label  class="error" >{{ $message }}</label>

                                @enderror

                            </li>

                            <li>

                                <input name="final_cleaning"  value="{{old('final_cleaning')}}" type="text" class="form-control" placeholder="Final Cleaning">

                                @error('final_cleaning')

                                <label  class="error" >{{ $message }}</label>

                                @enderror

                            </li>

                            <li>

                                <input name="city_tax"  value="{{old('city_tax')}}" type="text" class="form-control" placeholder="City Tax">

                                @error('city_tax')

                                <label  class="error" >{{ $message }}</label>

                                @enderror

                            </li>

                            <li>

                                <a href="javascript:void(0)" class="four2 submit2 pull-left">Back Step</a>

                                <a href="javascript:void(0)" class="five1 submit2 pull-right">Next Step</a>

                            </li>

                        </ul>

                    </section>

                    <section class="form-cntr login-form file-upload-wrap" id="six">

                        <ul>

                            <li id="append_main_photo">

                                <div class="file-upload">

                                    <h2>Main Photo <small>Click for upload</small></h2>

                                    <input type="file" name="main_photo" id="main_photo" class="one form-control">

                                    @error('main_photo')

                                    <label  class="error" >{{ $message }}</label>

                                    @enderror

                                </div>

                            </li>

                            <li class="width3" id="show_main_photo" style="display: none;">

                                <img id="output">

                            </li>

                            <li id="append_photo">

                                <div class="file-upload">

                                    <h2>Other Photos <small>Click for upload</small></h2>

                                    <input type="file" name="other_photos[]" id="other_photos" multiple class="one form-control">

                                    @error('other_photos')

                                    <label  class="error" >{{ $message }}</label>

                                    @enderror

                                </div>

                            </li>

                            {{--                        <li class="width3">--}}

                            {{--                            <figure style="background-image: url('../images/city2.jpg');"></figure>--}}

                            {{--                        </li>--}}

                            <li>

                                <a href="javascript:void(0)" class="five2 submit2 pull-left">Back Step</a>

                                <a href="javascript:void(0)" class="six1 submit2 pull-right">Next Step</a>

                            </li>

                        </ul>

                    </section>

                    <section class="form-cntr login-form" id="seven">

                        <ul>

                            <li>

                                <input name="property_url" value="{{old('property_url')}}"type="text" class="form-control" placeholder="URL Of The Property">

                                <span class="qi">i</span>

                                <div class="pop">

                                    <p>In this space you must enter the URL of your property on your official website. <span>Example: <small>www.yoursite.com/room/loft-apt-in-ny</small></span></p>

                                </div>

                                @error('property_url')

                                <label  class="error" >{{ $message }}</label>

                                @enderror

                            </li>

                            <li>

                                <button type="submit" class="submit"><i class="fa fa-play"></i> Publish Your Property</button>

                            </li>

                            <li>

                                <a href="javascript:void(0)" class="six2 submit2 pull-left">Back Step</a>

                            </li>

                        </ul>

                    </section>

                    <div class="clearfix"></div>

                    <input type="hidden" name="draft" id="draft" value="0">

                    <button class="submit2" type="submit" id="save_draft" style="margin: 10px 0px 0px; display: none;">save as draft</button>

                </form>

    <!--        </div>-->

    <!--    </div>-->

    <!--</div>-->

{{--    <div class="footer-wrap">--}}

{{--        <h6>--}}
{{--            <br> {{ $homeContent[0]['footer_logo_text'] }}--}}
{{--        </h6>--}}

{{--    </div>--}}



@endsection

@section('page-scripts')

    <script>



        $("#other_photos").on("change", function(e) {

            var files = e.target.files,

                filesLength = files.length;

            for (var i = 0; i < filesLength; i++) {

                var f = files[i]

                var fileReader = new FileReader();

                fileReader.onload = (function(e) {

                    var file = e.target;

                    $("<li class=\"width3\">" +

                        "<img src=\"" + e.target.result + "\" />" +    // title=\"" + file.name + "\"

                        "<br/><span class=\"remove\">Remove image</span>" +

                        "</li>").insertAfter("#append_photo");



                    $(".remove").click(function(){

                        $(this).parent().remove();

                    });

                });

                fileReader.readAsDataURL(f);

            }

        });



        $("#main_photo").on("change", function(e) {

            $('#show_main_photo').show();

            var reader = new FileReader();

            reader.onload = function(){

                $('#output').attr('src', reader.result);

            };

            reader.readAsDataURL(event.target.files[0]);

        });



        $('#save_draft').on('click', function () {

            $('#draft').val(1);

        });



        $(document).on('change', '#country_id', function () {

            var country = ($('option:selected', this).val());

            if (country=='other_country'){

                $('#country_name_li').show();

            }

            else{

                $('#country_name_li').hide();

                $('#country_name').val('');

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