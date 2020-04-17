<?php

namespace App;

use App\Bank;
use Illuminate\Database\Eloquent\Model;

class BankOperation extends Model {
	const PUBLISHED = 1;
	const UNPUBLISHED = 2;

	public function bank() {
		return $this->belongsTo(Bank::class);
	}
}
