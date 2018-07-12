<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\ServiceProvider;

class BuilderServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /*
         * Return paginated / all result based on request condition
         * Usage : Model::whereStatus('active')->result();
         * */

        Builder::macro('result', function () {

            if (request()->has('all')) {
                $result = $this->get();
            }
            else {
                if (request()->filled('limit')) {
                    $result = $this->paginate(request()->limit)->appends(request()->except('page'));
                }
                else {
                    $result = $this->paginate(50)->appends(request()->except('page'));
                }
            }

            return $result;
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
