@extends('layouts.admin_layout')

@section('title', 'WETO | Update Property')

@section('content')
    <div class="app-main__inner">

        <div class="card-header-tab card-header">

            <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="pe-7s-map mr-3 text-muted opacity-6" style="font-size: 35px; color: #2d7b8a !important;"> </i>Update Property Details</div>

        </div>

        <div class="tabs-animation">

            <div class="row">

                <div class="col-md-12">

                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="weto-edit-info">

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

                                <form action="{{route('submitUpdatedProperty')}}" method="post" id="editPropertyForm" enctype="multipart/form-data">

                                    @csrf

                                    <input name="property_id" type="hidden" value="{{$property['id']}}">

                                    <ul>

                                        <li>

                                            <label>Property Name</label>

                                            <input name="name" value="{{$property['name']}}" type="text" class="form-control" placeholder="Property Name">

                                            @error('name')

                                            <label  class="error" >{{ $message }}</label>

                                            @enderror

                                        </li>
                                        <li>
                                            <label>Accommodation</label>
                                            <select name="Villa_category" id="Villa_category" class="form-control">

                                                <option value="" style="display: none;">Select Accommodation</option>
                                                @foreach( $villas as $villa )
                                                    <option @if( $villa->id == $property['villa_id']) selected @endif value="{{ $villa->id }}">{{ $villa->villa }}</option>
                                                @endforeach
                                            </select>

                                            @error('Villa_category')

                                            <label  class="error" >{{ $message }}</label>

                                            @enderror

                                        </li>
                                        <li>

                                            <label>Select Country</label>

                                            <select name="country_id" id="country_id" class="form-control">

                                                <option value="" style="display: none;">Select Country</option>

                                                @if(count($countries))

                                                    @foreach($countries as $country)

                                                        <option @if(!is_null($property['country_id'])) @if($property['country_id']==$country->id) selected @endif @endif value="{{$country->id}}">{{$country->country}}</option>

                                                    @endforeach

                                                @endif

                                            </select>

                                            @error('country_id')

                                            <label  class="error" >{{ $message }}</label>

                                            @enderror

                                        </li>
                                        <li>

                                            <label>City</label>

                                            <input name="city" id="city" value="{{$property['city']}}" type="text" class="form-control" placeholder="City" autocomplete="off">

                                            @error('city')

                                            <label  class="error" >{{ $message }}</label>

                                            @enderror

                                        </li>
                                        <li>

                                            <label>Province</label>

                                            <input name="province_name" value="{{$property['province']}}" type="text" class="form-control" placeholder="Province">

                                            @error('province_name')

                                            <label  class="error" >{{ $message }}</label>

                                            @enderror

                                        </li>
                                        <li>

                                            <label>Address</label>

                                            <input name="address" value="{{$property['address']}}" type="text" class="form-control" placeholder="Address">

                                            @error('address')

                                            <label  class="error" >{{ $message }}</label>

                                            @enderror

                                        </li>

                                        <li>

                                            <label>Number</label>

                                            <input name="number" value="{{$property['number']}}" type="text" class="form-control" placeholder="Number">

                                            @error('number')

                                            <label  class="error" >{{ $message }}</label>

                                            @enderror

                                        </li>

                                        <li>

                                            <label>CAP or Postal Code</label>

                                            <input name="capacity" value="{{$property['capacity']}}" type="text" class="form-control" placeholder="CAP or Postal Code">

                                            @error('capacity')

                                            <label  class="error" >{{ $message }}</label>

                                            @enderror

                                        </li>

                                        <li>

                                            <label>Maximum Number of People</label>

                                            <input name="number_of_people" value="{{$property['number_of_people']}}" style="padding-left: 10px;" type="text" class="form-control" placeholder="Maximum Number of People">

                                            @error('number_of_people')

                                            <label  class="error" >{{ $message }}</label>

                                            @enderror

                                        </li>

                                        <li>

                                            <label>Accommodation Type</label>

                                            <select name="type" class="form-control">

                                                <option value="" style="display: none;">Select Accommodation Type</option>

                                                @foreach( $property_types as $property_type )

                                                    <option @if($property_type->id ==$property['property_type_id'] ) selected @endif value="{{ $property_type->id }}">{{ $property_type->name }}</option>
                                                @endforeach

                                            </select>

                                            @error('type')

                                            <label  class="error" >{{ $message }}</label>

                                            @enderror

                                        </li>

                                        <li>

                                            <label>Bedroom</label>

                                            <select name="bedroom" id="" class="form-control">

                                                <option value="" style="display:none;">Bedroom</option>

                                                <option @if($property['bedroom']=='0') selected @endif value="0">0</option>

                                                <option @if($property['bedroom']=='1') selected @endif value="1">1</option>

                                                <option @if($property['bedroom']=='2') selected @endif value="2">2</option>

                                                <option @if($property['bedroom']=='3') selected @endif value="3">3</option>

                                                <option @if($property['bedroom']=='4') selected @endif value="4">4</option>

                                                <option @if($property['bedroom']=='5') selected @endif value="5">5</option>

                                                <option @if($property['bedroom']=='6') selected @endif value="6">6</option>
                                                <option @if($property['bedroom']=='7') selected @endif value="7">7</option>
                                                <option @if($property['bedroom']=='8') selected @endif value="8">8</option>
                                                <option @if($property['bedroom']=='9') selected @endif value="9">9</option>
                                                <option @if($property['bedroom']=='10') selected @endif value="10">10</option>

                                            </select>

                                            @error('bedroom')

                                            <label  class="error" >{{ $message }}</label>

                                            @enderror

                                        </li>

                                        <li>

                                            <label>Bathroom</label>

                                            <select name="bathroom" id="" class="form-control">

                                                <option value="" style="display:none;">Bathroom</option>

                                                <option @if($property['bathroom']=='0') selected @endif value="0">0</option>

                                                <option @if($property['bathroom']=='1') selected @endif value="1">1</option>

                                                <option @if($property['bathroom']=='2') selected @endif value="2">2</option>

                                                <option @if($property['bathroom']=='3') selected @endif value="3">3</option>

                                                <option @if($property['bathroom']=='4') selected @endif value="4">4</option>

                                                <option @if($property['bathroom']=='5') selected @endif value="5">5</option>

                                            </select>

                                            @error('bathroom')

                                            <label  class="error" >{{ $message }}</label>

                                            @enderror

                                        </li>

                                        <li>

                                            <label>Floor</label>

                                            <input name="floor" value="{{$property['floor']}}" type="text" class="form-control" placeholder="Floor">

                                            @error('floor')

                                            <label  class="error" >{{ $message }}</label>

                                            @enderror

                                        </li>

                                        <li>

                                            <label>Price Per Night</label>

                                            <input name="price_per_night" value="{{$property['price_per_night']}}" type="text" class="form-control" placeholder="Price Per Night">

                                            @error('price_per_night')

                                            <label  class="error" >{{ $message }}</label>

                                            @enderror

                                        </li>

                                        <li>

                                            <input type="hidden" id="set_currency" value="{{$property['currency']}}">

                                            <label>Select Currency</label>

                                            <select name="currency" id="currency" class="form-control">

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

                                            <label>Each Extra Guest</label>

                                            <input name="each_extra_guest" value="{{$property['each_extra_guest']}}" type="text" class="form-control" placeholder="Each Extra Guest">

                                            @error('each_extra_guest')

                                            <label  class="error" >{{ $message }}</label>

                                            @enderror

                                        </li>

                                        <li>

                                            <label>Final Cleaning</label>

                                            <input name="final_cleaning" value="{{$property['final_cleaning']}}" type="text" class="form-control" placeholder="Final Cleaning">

                                            @error('final_cleaning')

                                            <label  class="error" >{{ $message }}</label>

                                            @enderror

                                        </li>

                                        <li>

                                            <label>City Tax</label>

                                            <input name="city_tax" value="{{$property['city_tax']}}" type="text" class="form-control" placeholder="City Tax">

                                            @error('city_tax')

                                            <label  class="error" >{{ $message }}</label>

                                            @enderror

                                        </li>

                                        <li>

                                            <label>Property URL</label>

                                            <input name="property_url" value="{{$property['property_url']}}" type="text" class="form-control" placeholder="URL Of The Property">

                                            @error('property_url')

                                            <label  class="error" >{{ $message }}</label>

                                            @enderror

                                        </li>

                                        <li class="full">

                                            <label>Description</label>

                                            <textarea name="description" class="form-control" placeholder="Description">{{$property['description']}}</textarea>

                                            @error('description')

                                            <label  class="error" >{{ $message }}</label>

                                            @enderror

                                        </li>



                                        {{--                                <li class="full">--}}

                                        {{--                                    <label>Select Images</label>--}}

                                        {{--                                    <div enctype="multipart/form-data">--}}

                                        {{--                                        <input id="file-upload-demo" type="file" multiple>--}}

                                        {{--                                    </div>--}}

                                        {{--                                </li>--}}

                                        <li id="append_main_photo" class="full">

                                            <div class="file-upload customImage">

                                                <h2>Main Photo <small>Click for upload</small></h2>

                                                <input type="file" name="main_photo" @if(is_null($property['property_main_photo'])) required @endif id="main_photo" class="form-control">

                                                @error('main_photo')

                                                <label  class="error" >{{ $message }}</label>

                                                @enderror

                                            </div><br>

                                            <ul>

                                                <li id="old_main_photo">

                                                    <input type="hidden" name="old_main_photo_name" value="{{$property['property_main_photo']['main_photo']}}">

                                                    <input type="hidden" name="old_main_photo_id" value="{{$property['property_main_photo']['id']}}">

                                                    @if(!is_null($property['property_main_photo']))

                                                        <img src="{{asset('propertyUploads/'.$property['property_main_photo']['main_photo'])}}" style="width: 50%;">

                                                    @endif

                                                </li>

                                                <li class="width3" id="show_main_photo" style="display: none;">

                                                    <img id="output" style="width: 50%">

                                                </li>

                                            </ul>

                                            <label id="main_photo-error" class="error" for="main_photo" style="display: none;"></label>

                                        </li>





                                        <li class="full">

                                            <div class="file-upload customImage">

                                                <h2>Other Photos <small>Click for upload</small></h2>

                                                <input type="file" name="other_photos[]" id="other_photos" multiple class="form-control">

                                                @error('other_photos')

                                                <label  class="error" >{{ $message }}</label>

                                                @enderror

                                            </div><br>

                                            <ul id="append_photo">

                                                @foreach($property['property_photo_order'] as $photo)

                                                    <li class="width3" id="other_image_{{$photo['id']}}">

                                                        <img src="{{asset('propertyUploads/'.$photo['other_photos'])}}" style="width: 100%;">

                                                        <br/><span class="remove delete_other_image" data-id="{{$photo['id']}}" data-image_name="{{$photo['other_photos']}}">Remove image</span>

                                                    </li>

                                                @endforeach

                                            </ul>

                                            <label id="other_photos-error" class="error" for="other_photos" style="display: none;"></label>

                                        </li>

                                        <li class="full edit-features">

                                            <label><input name="terrace" @if($property['property_attribute']['terrace']=='1') checked @endif value="1" type="checkbox"> Terrace</label>

                                            <label><input name="pool" @if($property['property_attribute']['pool']=='1') checked @endif value="1" type="checkbox"> Pool</label>

                                            <label><input name="tennis" @if($property['property_attribute']['tennis']=='1') checked @endif value="1" type="checkbox"> Tennis</label>

                                            <label><input name="spa" @if($property['property_attribute']['spa']=='1') checked @endif value="1" type="checkbox"> Spa</label>

                                            <label><input name="gym" @if($property['property_attribute']['gym']=='1') checked @endif value="1" type="checkbox"> Gym</label>

                                            <label><input name="kitchen" @if($property['property_attribute']['kitchen']=='1') checked @endif value="1" type="checkbox"> Kitchen</label>

                                            <label><input name="breakfast" @if($property['property_attribute']['breakfast']=='1') checked @endif value="1" type="checkbox"> Breakfast</label>

                                            <label><input name="restaurant" @if($property['property_attribute']['restaurant']=='1') checked @endif value="1" type="checkbox"> Restaurant</label>

                                            <label><input name="wifi" @if($property['property_attribute']['wifi']=='1') checked @endif value="1" type="checkbox"> Wifi</label>

                                            <label><input name="tv" @if($property['property_attribute']['tv']=='1') checked @endif value="1" type="checkbox"> TV</label>

                                            <label><input name="elevator" @if($property['property_attribute']['elevator']=='1') checked @endif value="1" type="checkbox"> Elevator</label>

                                            <label><input name="safebox" @if($property['property_attribute']['safebox']=='1') checked @endif value="1" type="checkbox"> Safebox</label>

                                            <label><input name="ac" @if($property['property_attribute']['ac']=='1') checked @endif value="1" type="checkbox"> A/C</label>

                                            <label><input name="coffee" @if($property['property_attribute']['coffee']=='1') checked @endif value="1" type="checkbox"> Coffee</label>

                                            <label><input name="pets_allowed" @if($property['property_attribute']['pets_allowed']=='1') checked @endif value="1" type="checkbox"> Pets Allowed</label>

                                            <label><input name="reception" @if($property['property_attribute']['reception']=='1') checked @endif value="1" type="checkbox"> Reception</label>

                                            <label><input name="hairdryer" @if($property['property_attribute']['hairdryer']=='1') checked @endif value="1" type="checkbox"> Hairdryer</label>

                                            <label><input name="bathrobe" @if($property['property_attribute']['bathrobe']=='1') checked @endif value="1" type="checkbox"> Bathrobe</label>

                                            <label><input name="towels" @if($property['property_attribute']['towels']=='1') checked @endif value="1" type="checkbox"> Towels</label>

                                            <label><input name="kit_bathroom" @if($property['property_attribute']['kit_bathroom']=='1') checked @endif value="1" type="checkbox"> Kit Bathroom</label>

                                            <label><input name="shower" @if($property['property_attribute']['shower']=='1') checked @endif value="1" type="checkbox"> Shower</label>

                                            <label><input name="bathtub" @if($property['property_attribute']['bathtub']=='1') checked @endif value="1" type="checkbox"> Bathtub</label>

                                            <label><input name="dishwasher" @if($property['property_attribute']['dishwasher']=='1') checked @endif value="1" type="checkbox"> Dishwasher</label>

                                            <label><input name="washing_machine" @if($property['property_attribute']['washing_machine']=='1') checked @endif value="1" type="checkbox"> Washing Machine</label>

                                            <label><input name="iron" @if($property['property_attribute']['iron']=='1') checked @endif value="1" type="checkbox"> Iron</label>

                                            <label><input name="ironboard" @if($property['property_attribute']['ironboard']=='1') checked @endif value="1" type="checkbox"> Ironboard</label>

                                            <label><input name="baby_cot" @if($property['property_attribute']['baby_cot']=='1') checked @endif value="1" type="checkbox"> Baby Cot</label>

                                            <label><input name="stroller" @if($property['property_attribute']['stroller']=='1') checked @endif value="1" type="checkbox"> Stroller</label>

                                            <label><input name="parking" @if($property['property_attribute']['parking']=='1') checked @endif value="1" type="checkbox"> Parking</label>

                                            <label><input name="garage" @if($property['property_attribute']['garage']=='1') checked @endif value="1" type="checkbox"> Garage</label>

                                            <label><input name="check_in_24h" @if($property['property_attribute']['check_in_24h']=='1') checked @endif value="1" type="checkbox"> Check In 24h</label>

                                            <label><input name="luggage_deposit" @if($property['property_attribute']['luggage_deposit']=='1') checked @endif value="1" type="checkbox"> Luggage Deposit</label>

                                        </li>

                                        <input type="hidden" name="draft" value="0">

                                        <li><input type="submit" class="btn btn-primary" value="Update"></li>

                                    </ul>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection

@section('page-scripts')

    <script>

        $(document).ready(function () {



            var set_currency=$('#set_currency').val();

            $('#currency').trigger('change').val(set_currency);



            $("#main_photo").on("change", function(e) {

                $('#show_main_photo').show();

                $('#old_main_photo').hide();



                var reader = new FileReader();

                reader.onload = function(){

                    $('#output').attr('src', reader.result);

                };

                reader.readAsDataURL(event.target.files[0]);

            });



            $("#other_photos").on("change", function(e) {

                var files = e.target.files,

                    filesLength = files.length;

                for (var i = 0; i < filesLength; i++) {

                    var f = files[i]

                    var fileReader = new FileReader();

                    fileReader.onload = (function(e) {

                        var file = e.target;

                        $("<li class=\"width3\">" +

                            "<img src=\"" + e.target.result + "\" style=\"width: 100%;\"/>" +    // title=\"" + file.name + "\"

                            "<br/><span class=\"remove\">Remove image</span>" +

                            "</li>").insertAfter("#append_photo");



                        $(".remove").click(function(){

                            $(this).parent().remove();

                        });

                    });

                    fileReader.readAsDataURL(f);

                }

            });



            $('.delete_other_image').on('click', function () {

                var id=$(this).data('id');
                var image_name=$(this).data('image_name');



                $.ajax({

                    type: "post",

                    url: '{{route('deleteOtherPhoto')}}',

                    data: {

                        "_token": "{{ csrf_token() }}",

                        'id': id,
                        'image_name': image_name,

                    },

                    success: function (data) {

                        data=JSON.parse(data);

                        if(data=='success'){

                            $('#other_image_'+id).remove();

                        }

                        else{

                            console.log('error');

                        }

                    },

                    error: function (data) {

                        console.log('error');

                    }

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