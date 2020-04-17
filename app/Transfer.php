<?php

namespace App;

use App\Account;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model {
	public function account() {
		return $this->belongsTo(Account::class);
	}
}
