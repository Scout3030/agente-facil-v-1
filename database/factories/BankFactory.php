<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bank;
use Faker\Generator as Faker;

$factory->define(Bank::class, function (Faker $faker) {
	$name = $faker->word;
	return [
		'name' => $name,
		'description' => $faker->sentence,
		'logo' => $name . '_logo.png',
		'icon' => $faker->word,
		'status' => $faker->randomElement(array(Bank::PUBLISHED, Bank::UNPUBLISHED)),
		'enable_deposit' => $faker->randomElement(array(Bank::YES, Bank::NO)),
		'enable_transfer' => $faker->randomElement(array(Bank::YES, Bank::NO)),
	];
});
