<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\IntegralAmountRecoed;
use Faker\Generator as Faker;

$factory->define(IntegralAmountRecoed::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 100),
        'integral_amount' => $faker->randomElement([5, 10]),
        'date' => $faker->dateTimeBetween("2021-08-20", 'now', 'PRC')
    ];
});
