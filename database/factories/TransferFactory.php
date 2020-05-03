<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BankAccount;
use App\Operation;
use App\Transfer;
use Faker\Generator as Faker;

$factory->define(Transfer::class, function (Faker $faker) {
	return [
		'operation_id' => \App\Operation::all()->random()->id,
		'from_bank_account_id' => \App\BankAccount::all()->random()->id,
		'to_bank_account_id' => \App\BankAccount::all()->random()->id,
	];
});
