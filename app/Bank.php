<?php

namespace App;

use App\BankAccount;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model {
	const PUBLISHED = 1;
	const UNPUBLISHED = 2;

	protected $fillable = [
		'name', 'description', 'logo', 'status', 'icon',
	];

	public function pathAttachment() {
		return "/images/banks/" . $this->logo;
	}

	public function accounts() {
		return $this->hasMany(BankAccount::class);
	}
}
