<?php

namespace Imanghafoori\AnyPassTests;

use Imanghafoori\AnyPass\AnyPassServiceProvider;
use Imanghafoori\AnyPassTests\Dependencies\UserModel;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * @var \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->loadMigrationsFrom(__DIR__.'/Dependencies/database/migrations');
        $this->withFactories(__DIR__.'/Dependencies/database/factories');
        $this->user = factory(UserModel::class)->create();
    }

    protected function getPackageProviders($app)
    {
        return [
            AnyPassServiceProvider::class,
        ];
    }
}
