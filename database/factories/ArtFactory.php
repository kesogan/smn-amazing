<?php

/** @var Factory $factory */

use App\Models\Art;
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

$factory->define(Art::class, function (Faker $faker) {
    $type = ['default', 'tattoo'];
    return [
        'name' => $faker->name,
        'description' => $faker->realText(500),
        'price' => $faker->numberBetween(10, 100),
        'quantity' => $faker->numberBetween(2, 15),
        'start_at' => \Carbon\Carbon::parse(now())->subHours(random_int(1, 50))->format('Y-m-d H:m'),
        'end_at' => \Carbon\Carbon::parse(now())->addHours(random_int(2, 50))->format('Y-m-d H:m'),
        'type' => $type[array_rand($type)],
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
