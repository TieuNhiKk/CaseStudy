<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductDetail;
use Faker\Generator as Faker;

$factory->define(ProductDetail::class, function (Faker $faker) {
    return [
        'water_resistant' => $faker->randomElement(['Không', '1 atm', '2 atm', '3 atm', '4 atm', ' 5 atm', '6 atm']),
        'thickness' => random_int(5, 20) . ' mm',
        'casesize' => random_int(22, 50) . 'mm',
        'strap' => $faker->randomElement(['Cao su', 'Thép', 'Da']),
        'color' => $faker->colorName,
        'description' => $faker->realText(1000),
        'product_id' => null
    ];
});
