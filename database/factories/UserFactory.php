<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Users;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Users::class, function (Faker $faker) {
    return [
        'name' => $faker->userName,
        'parent_id' => $faker->numberBetween(0, 30),
        'integral_amount' => $numberBetween = $faker->numberBetween(1000, 9999),

    ];
});
