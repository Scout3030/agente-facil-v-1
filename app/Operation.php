<?php

namespace App;

use App\OperationType;
use App\Payment;
use App\Transfer;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Operation extends Model {

	use SoftDeletes;

	const TRANSFER = 1;
	const PAYMENT = 2;

	const COMPLETED = 1;
	const INPROCESS = 2;
	const CANCELLED = 3;

	const DEPOSITDONE = 1;
	const DEPOSITINPROCESS = 2;

	protected $fillable = [
		'user_id', 'operation_type_id', 'amount', 'comission', 'deposit_code', 'deposit_code_status', 'transfer_code', 'status',
	];

	public function user() {
		return $this->belongsTo(User::class);
	}

	public function operationType() {
		return $this->belongsTo(OperationType::class);
	}

	public function payment() {
		return $this->hasOne(Payment::class);
	}

	public function transfers() {
		return $this->hasMany(Transfer::class);
	}

}
