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

/* @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name'            => $faker->name,
        'email'           => $faker->unique()->safeEmail,
        'token'           => str_random(10),
        'github_username' => $faker->userName,
        'api_token'       => str_random(60),
        'remember_token'  => str_random(10),
    ];
});

$factory->define(App\Org::class, function (Faker $faker) {
    return [
        'id'              => $faker->unique()->randomNumber,
        'name'            => $faker->userName,
        'url'             => $faker->url,
        'description'     => $faker->text,
        'avatar'          => url('https://orgmanager.miguelpiedrafita.com/img/orgmanagerIcon'),
        'userid'          => $faker->unique()->randomDigitNotNull,
        'role'            => 'admin',
    ];
});
