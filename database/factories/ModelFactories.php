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

$factory->define(App\Scorer::class, function (Faker $faker) {
    static $password;

    return [
        'scorer_name' => $faker->name,
        'scorer_username' => $faker->unique()->userName,
        'scorer_email' => $faker->unique()->safeEmail,
        'scorer_password' => $password ?: $password = bcrypt('secret'),
        'scorer_remember_token' => str_random(10),
        'scorer_confirmed' => true
    ];
});

$factory->define(App\School::class, function (Faker $faker) {
    return [
        'school_name' => $faker->name,
        'school_city' => $faker->city,
        'school_state' => $faker->stateAbbr,
        'school_district' => $faker->word,
    ];
});

$factory->define(App\Team::class, function (Faker $faker) {
    return [
        'school_id' => function () {
            return factory(\App\School::class)->create()->id;
        },
     ];
});