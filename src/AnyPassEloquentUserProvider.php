<?php

namespace Imanghafoori\AnyPass;

use Illuminate\Auth\EloquentUserProvider as LaravelUserProvider;

class AnyPassEloquentUserProvider extends LaravelUserProvider
{

    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(UserContract $user, array $credentials)
    {
        if (env('APP_DEBUG') === true && env('APP_ENV') === 'local')
        {
            return true;
        }
        return parent::validateCredentials($user, $credentials);
    }
}