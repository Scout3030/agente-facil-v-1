<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('operations', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('user_id');
			$table->foreign('user_id')->references('id')->on('users');
			$table->unsignedBigInteger('operation_type_id');
			$table->foreign('operation_type_id')->references('id')->on('operation_types');
			$table->float('amount', 8, 2);
			$table->float('comission', 8, 2);
			$table->string('deposit_code');
			$table->enum('deposit_code_status', [
				\App\Operation::DEPOSITDONE, \App\Operation::DEPOSITINPROCESS,
			])->default(\App\Operation::DEPOSITINPROCESS);
			$table->string('transfer_code')->nullable();
			$table->enum('status', [
				\App\Operation::COMPLETED, \App\Operation::INPROCESS, \App\Operation::CANCELLED,
			])->default(\App\Operation::INPROCESS);
			$table->unsignedBigInteger('operator_id')->nullable();
			$table->foreign('operator_id')->references('id')->on('users');
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
		Schema::dropIfExists('operations');
	}
}
