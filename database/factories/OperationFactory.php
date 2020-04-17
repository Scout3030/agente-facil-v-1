<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Operation;
use Faker\Generator as Faker;

$factory->define(Operation::class, function (Faker $faker) {
	return [
		'user_id' => \App\User::all()->random()->id,
		'operation_type_id' => \App\OperationType::all()->random()->id,
		'amount' => $faker->randomFloat(2, 10, 1500),

		'deposit_code' => $faker->randomNumber(6, true),
		'transfer_code' => $faker->randomNumber(6, true),
		'status' => $faker->randomElement(
			array(Operation::COMPLETED, Operation::INPROCESS, Operation::CANCELLED)
		),
	];
});
