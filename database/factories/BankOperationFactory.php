<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bank;
use App\BankOperation;
use Faker\Generator as Faker;

$factory->define(BankOperation::class, function (Faker $faker) {
	return [
		'bank_id' => \App\Bank::all()->random()->id,
		'name' => $faker->name,
		'requirement' => $faker->word,
		'status' => $faker->randomElement(array(BankOperation::PUBLISHED, BankOperation::UNPUBLISHED)),
	];
});
