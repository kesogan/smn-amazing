<?php

/** @var Factory $factory */
use App\User;
use App\Models\Equipment;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

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

$factory->define(Equipment::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->realText(500),
    ];
});
