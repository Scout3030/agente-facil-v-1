<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Account;
use App\Bank;
use App\User;
use Faker\Generator as Faker;

$factory->define(Account::class, function (Faker $faker) {
	return [
		'user_id' => \App\User::all()->random()->id,
		'bank_id' => \App\Bank::all()->random()->id,
		'number' => $faker->randomNumber(7, true),
	];
});
