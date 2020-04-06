<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'phone' => $faker->unique()->phoneNumber,
        'address' => $faker->address,
        'user_id' => null
    ];
});
