<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
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

$factory->define(User::class, function (Faker $faker) {
    $gender = $faker->randomElement(['male', 'female']);
    return [
        'fullname' => $faker->name($gender),
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->numberBetween($min = 3101000000, $max = 3202000000),
        'birthdate' => $faker->dateTimeBetween($startDate = '-60 years', $endDate = '-21 years', $timezone = null),
        'gender' => $gender,
        'photo'  => '/storage/images/'.$faker->image('public/storage/images', 140, 140, 'people', false),
        'address' => $faker->streetAddress,
        'email_verified_at' => now(),
        'password' => bcrypt('prueba'), // password
        'remember_token' => Str::random(10),
    ];
});