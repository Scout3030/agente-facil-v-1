<?php

namespace App;

use App\Account;
use App\BankOperation;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model {
	public function account() {
		return $this->belongsTo(Account::class);
	}

	public function bankOperation() {
		return $this->belongsTo(BankOperation::class);
	}
}
