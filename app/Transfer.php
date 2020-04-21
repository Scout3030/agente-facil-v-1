<?php

namespace App;

use App\Account;
use App\Bank;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model {

	protected $fillable = [
		'operation_id', 'account_id', 'bank_id', 'name', 'account_number',
	];

	public function account() {
		return $this->belongsTo(Account::class);
	}

	public function bank() {
		return $this->belongsTo(Bank::class);
	}
}
