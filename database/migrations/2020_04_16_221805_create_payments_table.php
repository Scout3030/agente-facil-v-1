<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('payments', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('operation_id');
			$table->foreign('operation_id')->references('id')->on('operations');
			$table->unsignedBigInteger('bank_account_id');
			$table->foreign('bank_account_id')->references('id')->on('bank_accounts');
			$table->unsignedBigInteger('bank_operation_id');
			$table->foreign('bank_operation_id')->references('id')->on('bank_operations');
			$table->string('code');
			$table->string('name');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('payments');
	}
}
