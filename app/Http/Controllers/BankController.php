<?php

namespace App\Http\Controllers;

use App\Bank;

class BankController extends Controller {
	public function banks() {
		$banks = Bank::orderBy('name', 'asc')->whereStatus(Bank::PUBLISHED)->get();
		return response()->json($banks);
	}
}
