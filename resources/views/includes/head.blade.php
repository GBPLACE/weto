<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="{{ isset( $siteSeo['description'] ) ? $siteSeo['description'] : 'Weto' }}">
<meta name="keywords" content="{{ isset( $siteSeo['keywords'] ) ? $siteSeo['keywords'] : "keywords" }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>@yield('title')</title>
<!-- Css Files -->
<link rel="shortcut icon" href="{{asset('propertyUploads/'.$homeContent[0]['favicon'])}}" type="image/png" />
<link href="{{asset('front/css/bootstrap.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
<link href="{{asset('front/css/slick-slider.css')}}" rel="stylesheet">
<link href="{{asset('front/css/font-awesome.css')}}" rel="stylesheet">
<link href="{{asset('front/css/datepicker.css')}}" rel="stylesheet">
<link href="{{asset('front/css/lc_lightbox.css')}}" rel="stylesheet">
<link href="{{asset('jquery-confirm/jquery-confirm.css')}}" rel="stylesheet">
<!-- Full Calender-->
<link href="{{asset('front/css/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet">
<link href="{{asset('front/css/fullcalendar/fullcalendar.print.min.css')}}" media="print" rel="stylesheet">
<link href="{{asset('front/css/fullcalendar/adminlet.min.css')}}" rel="stylesheet">
<!-- File Input Plugin-->
<link href="{{asset('front/css/file-input/fileinput.css')}}" media="all" rel="stylesheet" type="text/css"/>
<link href="{{asset('front/css/file-input/theme.css')}}" media="all" rel="stylesheet" type="text/css"/>
<!-- custom files-->
<link href="{{asset('front/style.css')}}" rel="stylesheet">
<link href="{{asset('front/css/responsive.css')}}" rel="stylesheet">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id={{env('MEASUREMENT_ID')}}">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '{{env('MEASUREMENT_ID')}}');
  
</script>