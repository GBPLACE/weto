<!DOCTYPE html>
<html lang="en">
<head>
@include('includes.head')
	<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');

 fbq('init', '1097241074020387'); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=1097241074020387&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->

</head>

<body>
    <!--// Main Wrapper \\-->
    <div class="weto-main-wrapper">

        @include('includes.header')

        @yield('subheader')
        <!--// Main Content \\-->
        <div class="weto-main-content">

            @yield('content')

            @if(Request::segment(2)!='setUnavailability' && Request::segment(2)!='wishList')
            @include('includes.foot')
            @endif

        </div>
        <!--// Main Content \\-->

        @include('includes.footer')
    </div>
    <!--// Main Wrapper \\-->

    @include('includes.scripts')
    @yield('page-scripts')
</body>
</html>