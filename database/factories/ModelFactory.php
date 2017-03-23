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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {

    return [
        'name'            => $faker->name,
        'email'           => $faker->unique()->safeEmail,
        'token'           => str_random(10),
        'github_username' => $faker->userName,
        'api_token'       => str_random(60),
        'remember_token'  => str_random(10),
    ];
});

$factory->define(App\Org::class, function (Faker\Generator $faker) {

    return [
        'id'              => $faker->unique()->integer,
        'name'            => $faker->name,
        'url'             => $faker->url,
        'description'     => $faker->text,
        'avatar'          => url('https://orgmanager.miguelpiedrafita.com/img/orgmanagerIcon'),
        'userid'          => $faker->unique()->integer,
        'role'            => 'admin',
    ];
});
