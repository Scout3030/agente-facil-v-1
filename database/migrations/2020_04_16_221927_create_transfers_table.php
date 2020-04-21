<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransfersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('transfers', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('operation_id');
			$table->foreign('operation_id')->references('id')->on('operations');
			$table->unsignedBigInteger('account_id')->nullable();
			$table->foreign('account_id')->references('id')->on('accounts');
			$table->unsignedBigInteger('bank_id')->nullable();
			$table->foreign('bank_id')->references('id')->on('banks');
			$table->string('account_number')->nullable();
			$table->string('name')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('transfers');
	}
}
