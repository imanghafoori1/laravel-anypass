<?php

namespace Imanghafoori\AnyPass;

use Illuminate\Support\ServiceProvider;

class AnyPassServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        \Auth::provider('AnyPass', function ($app, array $config) {
            return new AnyPassUserProvider($app['hash'] ,$config["model"]);
        });
    }
}
