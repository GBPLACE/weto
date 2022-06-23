@extends('layouts.front_layout')
@section('title', 'WTEO | Set Availability')
@section('subheader')
    <!--// Weto Subheader \\-->
    <div class="weto-subheader">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Set Unavailable Dates</h1>
                </div>
            </div>
        </div>
    </div>
    <!--// Weto Subheader \\-->
@endsection
@section('content')
    <!--// Main Section \\-->
    <div class="weto-main-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="fancy-title" style="font-size: 33px; margin: 0 0 20px; ">Property Name</h2>
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
                        <form action="{{route('submitUnavailabilityDates')}}" method="post" id="setUnavailabilityForm">
                            @csrf
                            <input type="hidden" name="property_id" value="{{$id}}">
                            <ul>
                                <li>
                                    <label>From</label>
                                    <input type="text" name="start_date" id="start_date" value="{{old('start_date')}}" placeholder="dd/mm/yyyy" autocomplete="off" class="form-control dp1">
                                    @error('start_date')
                                    <label  class="error" >{{ $message }}</label>
                                    @enderror
                                </li>
                                <li>
                                    <label>To</label>
                                    <input type="text" name="end_date" id="end_date" value="{{old('end_date')}}" placeholder="dd/mm/yyyy" autocomplete="off" class="form-control dp1">
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
                    <div class="calendar-wrap">
                        <div id="calendar"></div>
                    </div>
                    <h2 class="fancy-title">Property Unavailable Dates</h2>
                    <div class="availability-table">
                        <table>
                            <tr>
                                <th>No</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Action</th>
                            </tr>
                            <tbody id="append_list" >

                            </tbody>
                        </table>
                        <ul class="weto-pagination" id="example-2" style="display: none;">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--// Main Section \\-->

@endsection
@section('page-scripts')
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
            $('#calendar').fullCalendar({
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
                        url: "{{route('getCalenderUnavailableDates')}}",
                        type: 'post',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            id:'{{$id}}'
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
                    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

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
                            url: '{{route('getUnavailableDates')}}',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                'page_num': options.current,
                                'property_id' : '{{$id}}',
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
                                        '<button type="button" class="btn btn-primary btn-sm delete_unavailable_date" data-id="'+item.id+'">Delete</button>'+
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
                            url: '{{route('deleteUnavailabilityDate')}}',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                'id': id,
                            },
                            success: function (data) {
                                data = JSON.parse(data);
                                if (data=='success'){
                                    //pageloading(0);
                                    $.alert('Blocked dates deleted successfully.');
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