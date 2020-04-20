<?php

namespace App;

use App\Account;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model {

	protected $fillable = [
		'operation_id', 'account_id',
	];

	public function account() {
		return $this->belongsTo(Account::class);
	}
}
