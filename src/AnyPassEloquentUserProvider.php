<?php

namespace Imanghafoori\AnyPass;

use Illuminate\Auth\EloquentUserProvider as LaravelUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

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
        return true;
    }
}
