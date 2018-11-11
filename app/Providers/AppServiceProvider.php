<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*Ovde povecava mogucu duzinu za pdatke u bazi tipa string.*/
        Schema::defaultStringLength(191);
        /*Umesto da se salje svakom view-u pojedinacno, 
        posalje se direktno archives fajlu, pa gde kod se pozove fajl, 
        ti podaci su dostupni.*/
        view()->composer("layouts.inc.archives", function($view){
            $view->with("archives", \App\Post::archives());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
