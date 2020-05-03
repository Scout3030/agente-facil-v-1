<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run() {
		// Storage::deleteDirectory('users');
		// Storage::deleteDirectory('banks');

		// Storage::makeDirectory('users');
		// Storage::makeDirectory('banks');

		factory(\App\Role::class, 1)->create(['name' => 'admin']);
		factory(\App\Role::class, 1)->create(['name' => 'user']);

		factory(\App\User::class, 1)->create([
			'name' => 'admin',
			'email' => 'admin@mail.com',
			'password' => bcrypt('secret'),
			'role_id' => \App\Role::ADMIN,
		]);

		factory(\App\User::class, 1)->create([
			'name' => 'user',
			'email' => 'user@mail.com',
			'password' => bcrypt('secret'),
			'role_id' => \App\Role::USER,
		]);

		factory(\App\OperationType::class, 1)->create([
			'type' => 'transfer',
		]);
		factory(\App\OperationType::class, 1)->create([
			'type' => 'payment',
		]);

		// factory(\App\User::class, 10)->create();

		// factory(\App\Bank::class, 1)->create([
		// 	'name' => 'MIBANCO',
		// 	'logo' => 'mi-banco.png',
		// 	'icon' => 'mi-banco',
		// ])->each(function (\App\Bank $u) {
		// 	factory(\App\BankAccount::class, 1)->create([
		// 		'user_id' => 1,
		// 		'bank_id' => $u->id,
		// 	]);
		// });
		// factory(\App\Bank::class, 1)->create([
		// 	'name' => 'BANCO DE CRÉDITO',
		// 	'logo' => 'banco-de-credito.png',
		// 	'icon' => 'banco-de-credito',
		// ])->each(function (\App\Bank $u) {
		// 	factory(\App\BankAccount::class, 1)->create([
		// 		'user_id' => 1,
		// 		'bank_id' => $u->id,
		// 	]);
		// });
		// factory(\App\Bank::class, 1)->create([
		// 	'name' => 'SCOTIABANK PERU',
		// 	'logo' => 'scotiabank.png',
		// 	'icon' => 'scotiabank',
		// ])->each(function (\App\Bank $u) {
		// 	factory(\App\BankAccount::class, 1)->create([
		// 		'user_id' => 1,
		// 		'bank_id' => $u->id,
		// 	]);
		// });
		// factory(\App\Bank::class, 1)->create([
		// 	'name' => 'BBVA',
		// 	'logo' => 'bbva.png',
		// 	'icon' => 'bbva',
		// ])->each(function (\App\Bank $u) {
		// 	factory(\App\BankAccount::class, 1)->create([
		// 		'user_id' => 1,
		// 		'bank_id' => $u->id,
		// 	]);
		// });
		// factory(\App\Bank::class, 1)->create([
		// 	'name' => 'BANCO DE COMERCIO',
		// 	'logo' => 'banco-de-comercio.png',
		// 	'icon' => 'banco-de-comercio',
		// ])->each(function (\App\Bank $u) {
		// 	factory(\App\BankAccount::class, 1)->create([
		// 		'user_id' => 1,
		// 		'bank_id' => $u->id,
		// 	]);
		// });
		// factory(\App\Bank::class, 1)->create([
		// 	'name' => 'CITIBANK DEL PERU',
		// 	'logo' => 'citibank.png',
		// 	'icon' => 'citibank',
		// ])->each(function (\App\Bank $u) {
		// 	factory(\App\BankAccount::class, 1)->create([
		// 		'user_id' => 1,
		// 		'bank_id' => $u->id,
		// 	]);
		// });
		// factory(\App\Bank::class, 1)->create([
		// 	'name' => 'BANBIF',
		// 	'logo' => 'banbif.png',
		// 	'icon' => 'banbif',
		// ])->each(function (\App\Bank $u) {
		// 	factory(\App\BankAccount::class, 1)->create([
		// 		'user_id' => 1,
		// 		'bank_id' => $u->id,
		// 	]);
		// });
		// factory(\App\Bank::class, 1)->create([
		// 	'name' => 'BANCO DE LA NACIÓN',
		// 	'logo' => 'banco-de-la-nacion.png',
		// 	'icon' => 'banco-de-la-nacion',
		// ])->each(function (\App\Bank $u) {
		// 	factory(\App\BankAccount::class, 1)->create([
		// 		'user_id' => 1,
		// 		'bank_id' => $u->id,
		// 	]);
		// });
		// factory(\App\Bank::class, 1)->create([
		// 	'name' => 'BANCO PICHINCHA',
		// 	'logo' => 'banco-pichincha.png',
		// 	'icon' => 'banco-pichincha',
		// ])->each(function (\App\Bank $u) {
		// 	factory(\App\BankAccount::class, 1)->create([
		// 		'user_id' => 1,
		// 		'bank_id' => $u->id,
		// 	]);
		// });
		// factory(\App\Bank::class, 1)->create([
		// 	'name' => 'COFIDE',
		// 	'logo' => 'cofide.png',
		// 	'icon' => 'cofide',
		// ])->each(function (\App\Bank $u) {
		// 	factory(\App\BankAccount::class, 1)->create([
		// 		'user_id' => 1,
		// 		'bank_id' => $u->id,
		// 	]);
		// });
		// factory(\App\Bank::class, 1)->create([
		// 	'name' => 'INTERBANK',
		// 	'logo' => 'interbank.png',
		// 	'icon' => 'interbank',
		// ])->each(function (\App\Bank $u) {
		// 	factory(\App\BankAccount::class, 1)->create([
		// 		'user_id' => 1,
		// 		'bank_id' => $u->id,
		// 	]);
		// });
		// factory(\App\Bank::class, 1)->create([
		// 	'name' => 'BANCO RIPLEY',
		// 	'logo' => 'banco-ripley.png',
		// 	'icon' => 'banco-ripley',
		// ])->each(function (\App\Bank $u) {
		// 	factory(\App\BankAccount::class, 1)->create([
		// 		'user_id' => 1,
		// 		'bank_id' => $u->id,
		// 	]);
		// });
		// factory(\App\Bank::class, 1)->create([
		// 	'name' => 'BANCO CENTRAL PERU',
		// 	'logo' => 'banco-central-peru.png',
		// 	'icon' => 'banco-central-peru',
		// ])->each(function (\App\Bank $u) {
		// 	factory(\App\BankAccount::class, 1)->create([
		// 		'user_id' => 1,
		// 		'bank_id' => $u->id,
		// 	]);
		// });
		// factory(\App\Bank::class, 1)->create([
		// 	'name' => 'BANCO FALABELLA',
		// 	'logo' => 'banco-falabella.png',
		// 	'icon' => 'banco-falabella',
		// ])->each(function (\App\Bank $u) {
		// 	factory(\App\BankAccount::class, 1)->create([
		// 		'user_id' => 1,
		// 		'bank_id' => $u->id,
		// 	]);
		// });
		// factory(\App\Bank::class, 1)->create([
		// 	'name' => 'AGROBANCO',
		// 	'logo' => 'agrobanco.png',
		// 	'icon' => 'agrobanco',
		// ])->each(function (\App\Bank $u) {
		// 	factory(\App\BankAccount::class, 1)->create([
		// 		'user_id' => 1,
		// 		'bank_id' => $u->id,
		// 	]);
		// });
		// factory(\App\Bank::class, 1)->create([
		// 	'name' => 'BANCO GNB',
		// 	'logo' => 'banco-gnb.png',
		// 	'icon' => 'banco-gnb',
		// ])->each(function (\App\Bank $u) {
		// 	factory(\App\BankAccount::class, 1)->create([
		// 		'user_id' => 1,
		// 		'bank_id' => $u->id,
		// 	]);
		// });
		// factory(\App\Bank::class, 1)->create([
		// 	'name' => 'SANTANDER PERU',
		// 	'logo' => 'santander.png',
		// 	'icon' => 'santander',
		// ])->each(function (\App\Bank $u) {
		// 	factory(\App\BankAccount::class, 1)->create([
		// 		'user_id' => 1,
		// 		'bank_id' => $u->id,
		// 	]);
		// });
		// factory(\App\Bank::class, 1)->create([
		// 	'name' => 'BANCO AZTECA',
		// 	'logo' => 'banco-azteca.png',
		// 	'icon' => 'banco-azteca',
		// ])->each(function (\App\Bank $u) {
		// 	factory(\App\BankAccount::class, 1)->create([
		// 		'user_id' => 1,
		// 		'bank_id' => $u->id,
		// 	]);
		// });
		// factory(\App\Bank::class, 1)->create([
		// 	'name' => 'ICBC BANK',
		// 	'logo' => 'icbc-bank.png',
		// 	'icon' => 'icbc-bank',
		// ])->each(function (\App\Bank $u) {
		// 	factory(\App\BankAccount::class, 1)->create([
		// 		'user_id' => 1,
		// 		'bank_id' => $u->id,
		// 	]);
		// });

		// factory(\App\BankOperation::class, 100)->create();

		// factory(\App\BankAccount::class, 1)->create([
		// 	'user_id' => 1,
		// 	'bank_id' => 1,
		// ]);
		// factory(\App\BankAccount::class, 50)->create();

		// factory(\App\Operation::class, 25)->create(['operation_type_id' => \App\OperationType::PAYMENT])
		// 	->each(function (\App\Operation $u) {
		// 		factory(\App\Payment::class, 1)->create(['operation_id' => $u->id]);
		// 	});

		// factory(\App\Operation::class, 25)->create(['operation_type_id' => \App\OperationType::TRANSFER])
		// 	->each(function (\App\Operation $u) {
		// 		factory(\App\Transfer::class, 1)->create(['operation_id' => $u->id]);
		// 	});
	}
}
