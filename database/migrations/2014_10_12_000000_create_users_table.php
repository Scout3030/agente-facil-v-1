<?php

use App\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('roles', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->text('description');
			$table->timestamps();
		});

		Schema::create('users', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('role_id')->default(\App\Role::USER);
			$table->foreign('role_id')->references('id')->on('roles');
			$table->string('name');
			$table->string('last_name')->nullable();
			$table->string('email')->unique();
			$table->timestamp('email_verified_at')->nullable();

			$table->string('password')->nullable();
			$table->string('picture')->nullable()->default('default_user.png');
			$table->string('phone')->nullable();
			$table->string('address')->nullable();
			$table->rememberToken();
			$table->timestamps();
		});

		Schema::create('user_social_accounts', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('user_id');
			$table->foreign('user_id')->references('id')->on('users');
			$table->string('provider');
			$table->string('provider_uid');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('user_social_accounts');
		Schema::dropIfExists('users');
		Schema::dropIfExists('roles');
	}
}
