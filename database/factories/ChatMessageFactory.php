<?php

use Faker\Generator as Faker;

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

$factory->define(App\ChatMessage::class, function (Faker $faker) {

    return [
        'user_id' => App\User::all()->random()->id,
        'recipient_id' => null,
        'room_id' => App\Room::all()->random()->id,
        'message' => $faker->text(256),
    ];
});
