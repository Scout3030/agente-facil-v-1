<?php

namespace App\Http\Controllers;

use App\BankOperation;

class BankOperationController extends Controller {
	// public function bankOperations() {
	// 	$bankOperations = BankOperation::orderBy('name', 'asc')->whereStatus(BankOperation::PUBLISHED)->get();
	// 	return response()->json($bankOperations);
	// }

	public function bankOperations($bankId) {
		$bankOperations = BankOperation::orderBy('name', 'asc')->whereBankId($bankId)->whereStatus(BankOperation::PUBLISHED)->get();
		return response()->json($bankOperations);
	}
}
