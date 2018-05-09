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
        \Auth::provider('eloquentAnyPass', function ($app, array $config) {
            return new AnyPassEloquentUserProvider($app['hash'], $config["model"]);
        });

        \Auth::provider('databaseAnyPass', function ($app, array $config) {
            $connection = $app['db']->connection();
            return new AnyPassDatabaseUserProvider($connection, $app['hash'], $config['table']);
        });
    }
}
