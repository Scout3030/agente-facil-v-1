<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
	return [
		'user_id' => \App\User::all()->random()->id,
		'title' => $faker->sentence,
		'description' => $faker->paragraph,
	];
});
