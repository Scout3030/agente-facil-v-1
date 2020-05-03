<?php

namespace App;

use App\Bank;
use App\BankAccount;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model {

	protected $fillable = [
		'operation_id', 'from_bank_account_id', 'to_bank_account_id', 'bank_id', 'name', 'account_number',
	];

	public function fromAccount() {
		return $this->belongsTo(BankAccount::class, 'from_bank_account_id');
	}

	public function toAccount() {
		return $this->belongsTo(BankAccount::class, 'to_bank_account_id');
	}

	public function bank() {
		return $this->belongsTo(Bank::class);
	}
}
