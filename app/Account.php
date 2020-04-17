<?php

namespace App;

use App\Bank;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Account extends Model {

	public function bank() {
		return $this->belongsTo(Bank::class);
	}

	public function user() {
		return $this->belongsTo(User::class);
	}
}
