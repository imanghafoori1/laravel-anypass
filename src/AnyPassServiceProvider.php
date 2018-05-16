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

        if ($this->properConfig()) {
            $this->changeUsersDriver();
        }
    }

    /**
     * @return bool
     */
    private function properConfig()
    {
        return env('APP_DEBUG') === true && in_array(env('APP_ENV'), ['local', 'testing']) && env('ANY_PASS', false) === true;
    }

    private function changeUsersDriver()
    {
        $driver = config()->get('auth.providers.users.driver');
        config()->set('auth.providers.users.driver', $driver.'AnyPass');
    }
}
