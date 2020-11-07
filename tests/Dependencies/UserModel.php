<?php

namespace Imanghafoori\AnyPassTests\Dependencies;

use Illuminate\Foundation\Auth\User;

class UserModel extends User
{
    public $table = 'users';
    protected $guarded = [];
    public $timestamps = false;
}