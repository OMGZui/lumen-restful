<?php

use App\Http\Models\Posts;
use Webpatser\Uuid\Uuid;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

//$factory->define(App\User::class, function (Faker\Generator $faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->email,
//    ];
//});

$factory->define(Posts::class, function (Faker\Generator $faker) {
    return [
        'uuid' => Uuid::generate()->string,
        'name' => $faker->name,
        'age' => $faker->numberBetween(1,100),
        'sex' => $faker->numberBetween(0,1),
        'mobile' => $faker->phoneNumber,
    ];
});
