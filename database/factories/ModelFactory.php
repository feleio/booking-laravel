<?php

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

$factory->define(App\Professional::class, function (Faker\Generator $faker) {
    return [
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'username' => $faker->name,
        'facebook_id' => str_random(10),
        'profession' => str_random(10),
        'tel' =>  $faker->phoneNumber,
        'remember_token' => str_random(10)
    ];
});

$factory->define(App\Customer::class, function (Faker\Generator $faker) {
    return [
        'customer_key' => str_random(10),
        'name' => $faker->name,
        'tel' => $faker->phoneNumber
    ];
});
