<?php

namespace App;

use App\Account;
use App\BankOperation;
use App\OperationType;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Operation extends Model {

	use SoftDeletes;

	const TRANSFER = 1;
	const PAYMENT = 2;

	const COMPLETED = 1;
	const INPROCESS = 2;
	const CANCELLED = 3;

	public function course() {
		return $this->belongsTo(User::class);
	}

	public function operationType() {
		return $this->belongsTo(OperationType::class);
	}

	public function accounts() {
		return $this->hasMany(Account::class);
	}

	public function bankOperation() {
		return $this->belongsTo(BankOperation::class);
	}
}
