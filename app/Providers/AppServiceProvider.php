<?php

namespace App\Providers;

use App\Http\Resources\RequestQueryFilter;
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
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*
         * Register load method that binds to Eloquent resource
         * */

        $this->app->singleton('load', function($app) {
            return new RequestQueryFilter;
        });
    }
}
