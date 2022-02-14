<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use App\Models\settings;
use App\Models\ad_banner;
use App\Models\post_ad;
use App\Models\google_ads;
use App\Models\User;
use App\Models\blog;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Auth;
use App\Models\language;
use DB;
use Session;

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
        Schema::defaultstringLength(191);
        view()->composer('admin.layouts', function($view) {
            $language = language::all();
            // session(['lang'=>'english']);
            $view->with(compact('language'));
        });
        view()->composer('website.layouts', function($view) {
            $settings = settings::find('1');
            $language = language::all();
            $footer_blog = blog::latest()->take(2)->get();
            $google_ads = google_ads::find(1);
            // session(['lang'=>'english']);
            $view->with(compact('settings','language','footer_blog','google_ads'));
        });

        view()->composer('customers.layouts', function($view) {
            $settings = settings::find('1');
            $language = language::all();
            $footer_blog = blog::latest()->take(2)->get();
            // session(['lang'=>'english']);
            $google_ads = google_ads::find(1);
            $view->with(compact('settings','language','footer_blog','google_ads'));
        });

        view()->composer('customers.menu', function($view) {
            $language = language::all();
            // session(['lang'=>'english']);
            $google_ads = google_ads::find(1);
            $view->with(compact('language','google_ads'));
        });
        view()->composer('website.menu', function($view) {
            $language = language::all();
            // session(['lang'=>'english']);
            $google_ads = google_ads::find(1);
            $view->with(compact('language','google_ads'));
        });
    }
}
