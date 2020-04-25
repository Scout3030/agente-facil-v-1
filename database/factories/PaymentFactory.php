<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Account;
use App\BankOperation;
use App\Operation;
use App\Payment;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {
	return [
		'operation_id' => \App\Operation::all()->random()->id,
		'account_id' => \App\Account::all()->random()->id,
		'bank_operation_id' => \App\BankOperation::all()->random()->id,
		'code' => $faker->bothify('#?#?#?#?'),
		'name' => $faker->name,
	];
});
