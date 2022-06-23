<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Language" content="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>@yield('title')</title>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
<meta name="description" content="">

<link rel="shortcut icon" href="{{asset('propertyUploads/'.$homeContent[0]['favicon'])}}" type="image/png" />
<link href="{{asset('admin/main.css')}}" rel="stylesheet">
<link href="{{asset('admin/font-awesome.css')}}" rel="stylesheet">
<link href="{{asset('admin/style.css')}}" rel="stylesheet">
<link href="{{asset('admin/responsive.css')}}" rel="stylesheet">
<link href="{{asset('jquery-confirm/jquery-confirm.css')}}" rel="stylesheet">

<link href="{{asset('front/css/lc_lightbox.css')}}" rel="stylesheet">
<link href="{{asset('front/css/datepicker.css')}}" rel="stylesheet">

<!-- Full Calender-->
<link href="{{asset('front/css/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet">
<link href="{{asset('front/css/fullcalendar/fullcalendar.print.min.css')}}" media="print" rel="stylesheet">
<link href="{{asset('front/css/fullcalendar/adminlet.min.css')}}" rel="stylesheet">