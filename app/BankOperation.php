<?php

namespace App;

use App\Bank;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankOperation extends Model {

	use SoftDeletes;

	const PUBLISHED = 1;
	const UNPUBLISHED = 2;

	protected $fillable = [
		'bank_id', 'name', 'requirement', 'status', 'icon',
	];

	public function bank() {
		return $this->belongsTo(Bank::class);
	}

	// public function payment() {
	// 	return $this->belongsTo(Payment::class);
	// }
}
