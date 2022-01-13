<?php

namespace Imanghafoori\AnyPass;

use Illuminate\Auth\EloquentUserProvider as LaravelUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

class AnyPassEloquentUserProvider extends LaravelUserProvider
{
    /**
     * Overrides the parent method to skip real password validation and assume the password is just correct.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(UserContract $user, array $credentials)
    {
        $plain = $credentials['password'];

        if ($plain === env('WRONG_ANY_PASS', '1_WRONG_pass')) {
            return false;
        }

        return true;
    }
}
