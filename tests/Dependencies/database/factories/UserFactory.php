<?php


/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Imanghafoori\AnyPassTests\Dependencies\UserModel;

$factory->define(UserModel::class, function (Faker $faker, $parameters) {
    return [
        'name' => $faker->unique()->name(),
        'email' => $faker->email,
        'password' => $parameters['password'] ?? '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password,
    ];
});