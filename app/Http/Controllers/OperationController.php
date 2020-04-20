<?php

namespace App\Http\Controllers;

use App\Account;
use App\Bank;
use App\Operation;
use App\Payment;
use App\Transfer;
use Illuminate\Http\Request;

class OperationController extends Controller {
	public function transfer() {
		$banks = Bank::orderBy('name', 'asc')->whereStatus(Bank::PUBLISHED)->get();
		return view('operation.transfer', compact('banks'));
	}

	public function payment() {
		$banks = Bank::orderBy('name', 'asc')->whereStatus(Bank::PUBLISHED)->get();
		return view('operation.payment', compact('banks'));
	}

	// public function depositIndex() {
	// 	return view('operation.deposit');
	// }

	public function depositCreate(Request $request) {
		session(['deposit' => true]);
		$account = Account::with(['bank'])
			->whereBankId($request->bankId)
			->whereUserId(1)
			->first();
		$type = $request->operationType;
		return view('operation.deposit', compact('account', 'type'));
	}

	public function history() {
		$operations = Operation::with(['operationType', 'payment', 'transfers'])->whereUserId(auth()->user()->id)->orderBy('created_at', 'desc')->paginate(10);
		return view('operation.history', compact('operations'));
	}

	public function store(Request $request) {
		$request->merge(['user_id' => auth()->user()->id]);
		$request->merge(['status' => \App\Operation::INPROCESS]);
		if ($request->operation_type_id == Operation::TRANSFER) {

			$operation = Operation::create($request->input());
			Transfer::create([
				'operation_id' => $operation->id,
				'account_id' => $request->from,
			]);
			Transfer::create([
				'operation_id' => $operation->id,
				'account_id' => $request->to,
			]);
		}
		// dd($request->all());
		if ($request->operation_type_id == Operation::PAYMENT) {
			$operation = Operation::create($request->input());
			Payment::create([
				'operation_id' => $operation->id,
				'account_id' => $request->from,
				'bank_operation_id' => $request->bank_operation_id,
				'code' => $request->code,
			]);
		}

		session(['deposit' => false]);
		return view('operation.confirm');
	}
}
