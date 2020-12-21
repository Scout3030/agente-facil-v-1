<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OperationType;
use Faker\Generator as Faker;

$factory->define(OperationType::class, function (Faker $faker) {
	return [
		'type' => $faker->word,
	];
});
