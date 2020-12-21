<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BankAccount;
use Faker\Generator as Faker;

$factory->define(BankAccount::class, function (Faker $faker) {
	return [
		'user_id' => \App\User::all()->random()->id,
		'bank_id' => \App\Bank::all()->random()->id,
		'number' => $faker->randomNumber(7, true),
		'name' => $faker->name,
	];
});
