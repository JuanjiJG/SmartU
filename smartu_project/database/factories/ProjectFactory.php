<?php

/*
|--------------------------------------------------------------------------
| Project Factory
|--------------------------------------------------------------------------
|
| Here you may define a project factory. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(SmartU\Project::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->word,
    'description' => $faker->paragraph,
  ];
});
