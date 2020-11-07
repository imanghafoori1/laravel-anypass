<?php

namespace Imanghafoori\AnyPassTests;

use Illuminate\Support\Str;

class BasicTest extends TestCase
{

    /** @test * */
    public function login_with_anypass(){
        $this->assertTrue(Str::contains(config()->get('auth.providers.users.driver'), 'AnyPass'));

        $this->assertTrue(auth()->attempt([
            'email' => $this->user->email,
            'password' => ''
        ]));

        $this->assertTrue(auth()->attempt([
            'email' => $this->user->email,
            'password' => Str::random(8)
        ]));
    }

    /** @test * */
    public function when_driver_is_not_anypass(){
        config()->set('auth.providers.users.driver', 'eloquent');

        $this->assertFalse(auth()->attempt([
            'email' => $this->user->email,
            'password' => Str::random(8)
        ]));

        $this->assertTrue(auth()->attempt([
            'email' => $this->user->email,
            'password' => 'password'
        ]));
    }

}