<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Operation;

class OperationController extends Controller {
	public function transfer() {
		$banks = Bank::orderBy('name', 'asc')->whereStatus(Bank::PUBLISHED)->get();
		return view('operation.transfer', compact('banks'));
	}

	public function payment() {
		$banks = Bank::orderBy('name', 'asc')->whereStatus(Bank::PUBLISHED)->get();
		return view('operation.payment', compact('banks'));
	}

	public function history() {
		$operations = Operation::with(['operationType', 'payment', 'transfers'])->whereUserId(auth()->user()->id)->paginate(10);
		// dd($operations);
		return view('operation.history', compact('operations'));
	}
}
