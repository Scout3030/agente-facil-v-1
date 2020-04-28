<?php

namespace App;

use App\BankAccount;
use App\BankOperation;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model {

	protected $fillable = [
		'operation_id', 'account_id', 'bank_operation_id', 'code', 'name',
	];

	public function account() {
		return $this->belongsTo(BankAccount::class);
	}

	public function bankOperation() {
		return $this->belongsTo(BankOperation::class);
	}
}
