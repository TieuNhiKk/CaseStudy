<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'price' => $faker->numberBetween(300000, 10000000),
        'user_id' => null,
        'brand_id' => random_int(1, App\Brand::count()),
        'discount_id' => random_int(1, App\Discount::count())
    ];
});
