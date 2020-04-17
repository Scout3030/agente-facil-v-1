<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Operation;
use Faker\Generator as Faker;

$factory->define(Operation::class, function (Faker $faker) {
	$operation = $faker->randomElement(array(1, 2));
	if ($operation == 1) {
		$to_account_id = \App\Account::all()->random()->id;
		$bank_operation_id = null;
	} else {
		$to_account_id = null;
		$bank_operation_id = \App\BankOperation::all()->random()->id;
	}
	return [
		'user_id' => \App\User::all()->random()->id,
		'operation_type_id' => $operation,
		'from_bank_id' => \App\Bank::all()->random()->id,
		'from_account_id' => \App\Account::all()->random()->id,
		'to_bank_id' => \App\Bank::all()->random()->id,
		'to_account_id' => $to_account_id,
		'bank_operation_id' => $bank_operation_id,
		'amount' => $faker->randomFloat(2, 10, 1500),
		'code' => $faker->bothify('#?#?#?#?'),
		'deposit_code' => $faker->randomNumber(6, true),
		'transfer_code' => $faker->randomNumber(6, true),
		'status' => $faker->randomElement(
			array(Operation::COMPLETED, Operation::INPROCESS, Operation::CANCELLED)
		),
	];
});
