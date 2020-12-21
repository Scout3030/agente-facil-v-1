<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperationType extends Model {
	const TRANSFER = 1;
	const PAYMENT = 2;
}
