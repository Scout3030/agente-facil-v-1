<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankOperationsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('bank_operations', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('bank_id');
			$table->foreign('bank_id')->references('id')->on('banks');
			$table->string('name');
			$table->string('requirement');
			$table->enum('status', [
				\App\BankOperation::PUBLISHED, \App\BankOperation::UNPUBLISHED,
			])->default(\App\BankOperation::UNPUBLISHED);
			$table->string('icon')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('bank_operations');
	}
}
