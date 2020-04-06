<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductLine;
use Faker\Generator as Faker;

$factory->define(ProductLine::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement(['Đồng hồ nam', 'Đồng hồ nữ', 'Đồng hồ thông minh', 'Đồng hồ trẻ em', 'Đồng hồ thời trang'])
    ];
});
