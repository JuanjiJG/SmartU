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

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'username' => $faker->unique()->username,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 2, $variableNbWords = false),
        'description' => $faker->paragraph,
        'url' => $faker->url,
        // 'user_id' => function () {
        //     return factory(App\User::class)->create()->id;
        // }
    ];
});

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'content' => $faker->paragraph,
        // 'user_id' => function () {
        //     return factory(App\User::class)->create()->id;
        // }
    ];
});
