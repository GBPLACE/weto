<?php

namespace App\Providers;

use App\SiteContent;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191); // add this line in boot method

        view()->composer('layouts.admin_layout', function($view) {


            $homeContent = SiteContent::with('headerBannerContents')->where( 'id' , 1 )->get() ;
                $view->with('homeContent', $homeContent);
        });

        view()->composer('layouts.front_layout', function($view) {


            $homeContent = SiteContent::with('headerBannerContents')->where( 'id' , 1 )->get() ;
            $view->with('homeContent', $homeContent);
        });

        view()->composer('layouts.register_layout', function($view) {


            $homeContent = SiteContent::with('headerBannerContents')->where( 'id' , 1 )->get() ;
            $view->with('homeContent', $homeContent);
        });


        view()->composer('includes.header', function($view) {


            $homeContent = SiteContent::with('headerBannerContents')->where( 'id' , 1 )->get() ;
            $view->with('homeContent', $homeContent);
        });

        view()->composer('includes.footer', function($view) {


            $homeContent = SiteContent::with('headerBannerContents')->where( 'id' , 1 )->get() ;
            $view->with('homeContent', $homeContent);
        });

        view()->composer('adminIncludes.head', function($view) {


            $homeContent = SiteContent::with('headerBannerContents')->where( 'id' , 1 )->get() ;
            $view->with('homeContent', $homeContent);
        });

        view()->composer('includes.head', function($view) {


            $homeContent = SiteContent::with('headerBannerContents')->where( 'id' , 1 )->get() ;
            $view->with('homeContent', $homeContent);
        });

        view()->composer('layouts.admin_login_layout', function($view) {

            $homeContent = SiteContent::with('headerBannerContents')->where( 'id' , 1 )->get() ;
            $view->with('homeContent', $homeContent);
        });

    }
}
