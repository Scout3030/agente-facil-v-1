<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Account;
use App\Operation;
use App\Transfer;
use Faker\Generator as Faker;

$factory->define(Transfer::class, function (Faker $faker) {
	return [
		'operation_id' => \App\Operation::all()->random()->id,
		'account_id' => \App\Account::all()->random()->id,
	];
});
