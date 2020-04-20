<?php

namespace App;

use App\Bank;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model {

	use SoftDeletes;

	protected $fillable = [
		'user_id', 'bank_id', 'number', 'name',
	];

	public function bank() {
		return $this->belongsTo(Bank::class);
	}

	public function user() {
		return $this->belongsTo(User::class);
	}
}
