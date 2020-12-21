<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanksTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('banks', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->string('description')->nullable();
			$table->string('logo');
			$table->enum('status', [
				\App\Bank::PUBLISHED, \App\Bank::UNPUBLISHED,
			])->default(\App\Bank::UNPUBLISHED);
			$table->string('icon');
			$table->enum('enable_deposit', [
				\App\Bank::YES, \App\Bank::NO,
			]);
			$table->enum('enable_transfer', [
				\App\Bank::YES, \App\Bank::NO,
			]);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('banks');
	}
}
