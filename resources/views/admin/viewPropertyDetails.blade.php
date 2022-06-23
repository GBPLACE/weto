@extends('layouts.admin_layout')

@section('title', 'WETO | Property Details')

@section('content')

    <div class="app-main__inner">

        <div class="card-header-tab card-header">

            <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="pe-7s-map mr-3 text-muted opacity-6" style="font-size: 35px; color: #2d7b8a !important;"> </i>Property Details</div>

        </div>

        <div class="tabs-animation">

            <div class="row">

                <div class="col-md-12">

                    <div class="card mb-3">

                        <div class="card-body">

                            {{--                            <a href="{{route('propertyList')}}" class="tag" style="float: right;">Back</a>--}}

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

                                <div class="col-md-6 fixed-width">

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

{{--                                        <strong>Accommodation Type: <span>{{$property_type_name}}</span></strong>--}}

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

                                        <a href="{{route('updateProperty', [$property['id']])}}" class="round-btn">Update Details</a>
                                        <a href="https://maps.google.com/?q={{$property['address'].' street number '.$property['number'].' '.$property['city']}}" target="_blank" class="round-btn">Google Map</a>


                                        @php

                                            if (!is_null($property['property_url'])){

                                                $url=$property['property_url'];

                                                $check=substr($url, 0, 4);

                                                if ($check != 'http'){

                                                    $url='http://'.$url;

                                                }

                                            }

                                        @endphp

                                        <a href="{{$url}}" target="_blank" class="round-btn">Property URL</a>

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

                                <div class="col-md-6" id="remove_graph">

                                    <canvas id="graph" width="700" height="300" align="center"></canvas>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-12">

                    <div class="card mb-3">

                        <div class="card-header-tab card-header">

                            <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="pe-7s-map mr-3 text-muted opacity-6" style="font-size: 35px; color: #2d7b8a !important;"> </i>Set Availability</div>

                        </div>

                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-12">

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

                                        <form action="{{route('submitAdminUnavailabilityDates')}}" method="post" id="setUnavailabilityForm">

                                            @csrf

                                            <input type="hidden" name="property_id" value="{{$property['id']}}">

                                            <ul>

                                                <li>

                                                    <label>From</label>

                                                    <input type="text" name="start_date" id="start_date" value="{{old('start_date')}}" placeholder="dd/mm/yyyy" class="form-control dp1" autocomplete="off">

                                                    @error('start_date')

                                                    <label  class="error" >{{ $message }}</label>

                                                    @enderror

                                                </li>

                                                <li>

                                                    <label>To</label>

                                                    <input type="text" name="end_date" id="end_date" value="{{old('end_date')}}" placeholder="dd/mm/yyyy" class="form-control dp1" autocomplete="off">

                                                    @error('end_date')

                                                    <label  class="error" >{{ $message }}</label>

                                                    @enderror

                                                </li>

                                                <li>

                                                    <input type="submit" value="Add Unavailable Date Range" style="margin: 29px 0px 0px;" class="submit">

                                                </li>

                                            </ul>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="card mb-3">

                        <div class="card-header-tab card-header">

                            <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="pe-7s-map mr-3 text-muted opacity-6" style="font-size: 35px; color: #2d7b8a !important;"> </i>Calendar</div>

                        </div>

                        <div class="card-body">

                            <div class="calendar-wrap">

                                <div id="calendar1"></div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="card mb-3">

                        <div class="card-header-tab card-header">

                            <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="pe-7s-map mr-3 text-muted opacity-6" style="font-size: 35px; color: #2d7b8a !important;"> </i>Blocked Dates</div>

                        </div>

                        <div class="card-body">

                            <div class="availability-table table-responsive">

                                <table>

                                    <tr>

                                        <th>No</th>

                                        <th>Start Date</th>

                                        <th>End Date</th>

                                        <th>Action</th>

                                    </tr>

                                    <tbody id="append_list">



                                    </tbody>

                                </table>

                                <ul class="weto-pagination" id="example-2" style="display: none; margin-top: 10px;">



                                </ul>

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

                    'property_id': '{{$property['id']}}',

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

    <script>

        $(function () {



            /* initialize the external events

             -----------------------------------------------------------------*/

            function init_events(ele) {

                ele.each(function () {



                    // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)

                    // it doesn't need to have a start or end

                    var eventObject = {

                        title: $.trim($(this).text()) // use the element's text as the event title

                    }



                    // store the Event Object in the DOM element so we can get to it later

                    $(this).data('eventObject', eventObject)



                    // make the event draggable using jQuery UI

                    $(this).draggable({

                        zIndex        : 1070,

                        revert        : true, // will cause the event to go back to its

                        revertDuration: 0  //  original position after the drag

                    })



                })

            }



            init_events($('#external-events div.external-event'))



            /* initialize the calendar

             -----------------------------------------------------------------*/

            //Date for the calendar events (dummy data)

            var date = new Date()

            var d    = date.getDate(),

                m    = date.getMonth(),

                y    = date.getFullYear()

            $('#calendar1').fullCalendar({

                header    : {

                    left  : 'prev,next today',

                    center: 'title',

                    right : 'month,agendaWeek,agendaDay'

                },

                buttonText: {

                    today: 'today',

                    month: 'month',

                    week : 'week',

                    day  : 'day'

                },

                //Random default events

                events: function(start, end, timezone, callback) {

                    $.ajax({

                        url: "{{route('getAdminCalenderUnavailableDates')}}",

                        type: 'post',

                        data: {

                            "_token": "{{ csrf_token() }}",

                            id:'{{$property['id']}}'

                        },

                        success: function(doc) {

                            var json = JSON.parse(doc) ;

                            var events = [];

                            // console.log(json);

                            for(let i =0 ;i<json.length;i++)

                            {

                                // days[i]= {title: json[i]['action']['name'] ,

                                // start : json[i]['date']}

                                events.push({

                                    id: json[i]['id'],

                                    start: json[i]['start_date'], // will be parsed

                                    end: json[i]['end_date'], // will be parsed

                                    backgroundColor: '#f39c12',

                                    borderColor    : '#f39c12',

                                });

                            }

                            callback(events);

                        }

                    });

                },





                // events    : [

                //     {

                //         title          : 'Block',

                //         start          : new Date(y, m, d - 4),

                //         end            : new Date(y, m, d - 1),

                //         backgroundColor: '#f39c12', //yellow

                //         borderColor    : '#f39c12' //yellow

                //     },

                // ],

                editable  : true,

                droppable : true, // this allows things to be dropped onto the calendar !!!

                drop      : function (date, allDay) { // this function is called when something is dropped



                    // retrieve the dropped element's stored Event Object

                    var originalEventObject = $(this).data('eventObject')



                    // we need to copy it, so that multiple events don't have a reference to the same object

                    var copiedEventObject = $.extend({}, originalEventObject)



                    // assign it the date that was reported

                    copiedEventObject.start           = date

                    copiedEventObject.allDay          = allDay

                    copiedEventObject.backgroundColor = $(this).css('background-color')

                    copiedEventObject.borderColor     = $(this).css('border-color')



                    // render the event on the calendar

                    // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)

                    $('#calendar1').fullCalendar('renderEvent', copiedEventObject, true)



                    // is the "remove after drop" checkbox checked?

                    if ($('#drop-remove').is(':checked')) {

                        // if so, remove the element from the "Draggable Events" list

                        $(this).remove()

                    }



                }

            })



            /* ADDING EVENTS */

            var currColor = '#3c8dbc' //Red by default

            //Color chooser button

            var colorChooser = $('#color-chooser-btn')

            $('#color-chooser > li > a').click(function (e) {

                e.preventDefault()

                //Save color

                currColor = $(this).css('color')

                //Add color effect to button

                $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })

            })

            $('#add-new-event').click(function (e) {

                e.preventDefault()

                //Get value and make sure it is not null

                var val = $('#new-event').val()

                if (val.length == 0) {

                    return

                }



                //Create events

                var event = $('<div />')

                event.css({

                    'background-color': currColor,

                    'border-color'    : currColor,

                    'color'           : '#fff'

                }).addClass('external-event')

                event.html(val)

                $('#external-events').prepend(event)



                //Add draggable funtionality

                init_events(event)



                //Remove event from text input

                $('#new-event').val('')

            })

        });



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

                            url: '{{route('getAdminUnavailableDates')}}',

                            data: {

                                "_token": "{{ csrf_token() }}",

                                'page_num': options.current,

                                'property_id' : '{{$property['id']}}',

                            },



                            success: function (data) {

                                data=JSON.parse(data);

                                //alert(data[0]['child'][0]['id']);



                                var html = '';

                                var count = 1;

                                $.each(data['unavailableDate'], function (i, item) {



                                    html += '<tr>' +

                                        '<td>' + count + '</td>' +

                                        '<td>' + getFormattedDate(item.start_date) +'</td>' +

                                        '<td>' + getFormattedDate(item.end_date) + '</td>' +

                                        '<td>' +

                                        '<button type="button" data-toggle="modal" data-target="#deleteModal" class="btn btn-primary delete_unavailable_date" data-id="'+item.id+'">Delete</button>'+

                                        '</td>' +

                                        '</tr>';

                                    ++count;

                                });

                                $('#example-2').show();



                                if (html == "") {

                                    html += '<tr class="text-center">' +

                                        '<td colspan="4">No Data</td>' +

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

                            error: function (data) {

                                var html = '';

                                html += '<tr class="text-center">' +

                                    '<td colspan="4">No Data</td>' +

                                    '</tr>';

                                $('#append_list').html('');

                                $('#append_list').append(html);

                                $('#example-2').hide();

                            }

                        });

                    }

                });

            }

        });



        function getFormattedDate(date) {

            var d = new Date(date),

                month = '' + (d.getMonth() + 1),

                day = '' + d.getDate(),

                year = d.getFullYear();



            if (month.length < 2) month = '0' + month;

            if (day.length < 2) day = '0' + day;



            return [day, month, year].join('-');

        }



        $(document).on('click', '.delete_unavailable_date', function () {

            var id=$(this).data('id');



            $.confirm({

                title: 'Confirm!',

                content: 'Are you sure you want to delete this?',

                buttons: {

                    confirm: function () {

                        $.ajax({

                            type: "post",

                            url: '{{route('deleteAdminUnavailabilityDate')}}',

                            data: {

                                "_token": "{{ csrf_token() }}",

                                'id': id,

                            },

                            success: function (data) {

                                data = JSON.parse(data);

                                if (data=='success'){

                                    //pageloading(0);

                                    $.alert('Block dates deleted successfully.');

                                    location.reload();

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



    </script>

@endsection

