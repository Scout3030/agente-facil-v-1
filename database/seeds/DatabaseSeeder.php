<?php

use App\OperationType;
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

		factory(\App\User::class, 10)->create();

		factory(\App\Bank::class, 1)->create([
			'name' => 'MIBANCO',
			'logo' => 'mi-banco.png',
			'icon' => 'mi-banco',
		]);
		factory(\App\Bank::class, 1)->create([
			'name' => 'BANCO DE CRÉDITO',
			'logo' => 'banco-de-credito.png',
			'icon' => 'banco-de-credito',
		]);
		factory(\App\Bank::class, 1)->create([
			'name' => 'SCOTIABANK PERU',
			'logo' => 'scotiabank.png',
			'icon' => 'scotiabank',
		]);
		factory(\App\Bank::class, 1)->create([
			'name' => 'BBVA',
			'logo' => 'bbva.png',
			'icon' => 'bbva',
		]);
		factory(\App\Bank::class, 1)->create([
			'name' => 'BANCO DE COMERCIO',
			'logo' => 'banco-de-comercio.png',
			'icon' => 'banco-de-comercio',
		]);
		factory(\App\Bank::class, 1)->create([
			'name' => 'CITIBANK DEL PERU',
			'logo' => 'citibank.png',
			'icon' => 'citibank',
		]);
		factory(\App\Bank::class, 1)->create([
			'name' => 'BANBIF',
			'logo' => 'banbif.png',
			'icon' => 'banbif',
		]);
		factory(\App\Bank::class, 1)->create([
			'name' => 'BANCO DE LA NACIÓN',
			'logo' => 'banco-de-la-nacion.png',
			'icon' => 'banco-de-la-nacion',
		]);
		factory(\App\Bank::class, 1)->create([
			'name' => 'BANCO PICHINCHA',
			'logo' => 'banco-pichincha.png',
			'icon' => 'banco-pichincha',
		]);
		factory(\App\Bank::class, 1)->create([
			'name' => 'COFIDE',
			'logo' => 'cofide.png',
			'icon' => 'cofide',
		]);
		factory(\App\Bank::class, 1)->create([
			'name' => 'INTERBANK',
			'logo' => 'interbank.png',
			'icon' => 'interbank',
		]);
		factory(\App\Bank::class, 1)->create([
			'name' => 'BANCO RIPLEY',
			'logo' => 'banco-ripley.png',
			'icon' => 'banco-ripley',
		]);
		factory(\App\Bank::class, 1)->create([
			'name' => 'BANCO CENTRAL PERU',
			'logo' => 'banco-central-peru.png',
			'icon' => 'banco-central-peru',
		]);
		factory(\App\Bank::class, 1)->create([
			'name' => 'BANCO FALABELLA',
			'logo' => 'banco-falabella.png',
			'icon' => 'banco-falabella',
		]);
		factory(\App\Bank::class, 1)->create([
			'name' => 'AGROBANCO',
			'logo' => 'agrobanco.png',
			'icon' => 'agrobanco',
		]);
		factory(\App\Bank::class, 1)->create([
			'name' => 'BANCO GNB',
			'logo' => 'banco-gnb.png',
			'icon' => 'banco-gnb',
		]);
		factory(\App\Bank::class, 1)->create([
			'name' => 'SANTANDER PERU',
			'logo' => 'santander.png',
			'icon' => 'santander',
		]);
		factory(\App\Bank::class, 1)->create([
			'name' => 'BANCO AZTECA',
			'logo' => 'banco-azteca.png',
			'icon' => 'banco-azteca',
		]);
		factory(\App\Bank::class, 1)->create([
			'name' => 'ICBC BANK',
			'logo' => 'icbc-bank.png',
			'icon' => 'icbc-bank',
		]);

		factory(\App\BankOperation::class, 100)->create();

		factory(\App\OperationType::class, 1)->create(['type' => 'transfer']);
		factory(\App\OperationType::class, 1)->create(['type' => 'payment']);

		factory(\App\Account::class, 50)->create();

		factory(\App\Operation::class, 25)->create(['operation_type_id' => \App\OperationType::PAYMENT])
			->each(function (\App\Operation $u) {
				factory(\App\Payment::class, 1)->create(['operation_id' => $u->id]);
			});

		factory(\App\Operation::class, 25)->create(['operation_type_id' => \App\OperationType::TRANSFER])
			->each(function (\App\Operation $u) {
				factory(\App\Transfer::class, 2)->create(['operation_id' => $u->id]);
			});
	}
}
