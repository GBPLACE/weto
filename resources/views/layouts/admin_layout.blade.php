<!DOCTYPE html>
<html lang="en">
    <head>
        @include('adminIncludes.head')
		
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
        <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
            @include('adminIncludes.header')

            <div class="app-main">
                @include('adminIncludes.sidebar')

                <div class="app-main__outer">
                    @yield('content')

                    @include('adminIncludes.footer')
                </div>
            </div>
        </div>

        @include('adminIncludes.scripts')
        @yield('page-scripts')
    </body>
</html>