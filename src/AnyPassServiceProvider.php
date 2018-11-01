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
        return env('APP_DEBUG') === true && $this->appEnvIsSafe() && env('ANY_PASS', false) === true;
    }

    private function changeUsersDriver()
    {
        $driver = config()->get('auth.providers.users.driver');
        if (in_array($driver, ['eloquent', 'database',])) {
            config()->set('auth.providers.users.driver', $driver.'AnyPass');
        }
    }

    /**
     * @return bool
     */
    private function appEnvIsSafe()
    {
        $csv = env('ANY_PASS_ENVIRONMENTS', 'local,testing');

        $allowedEnvironments = collect(explode(',', $csv))
            ->map(function ($string) {
                return trim($string);
            })
            ->filter()
            ->toArray();

        return in_array(env('APP_ENV'), $allowedEnvironments);
    }
}
