<?php

namespace App\Http\Controllers;

use App\Account;
use App\Bank;
use App\Mail\NewOperation;
use App\Operation;
use App\OperationType;
use App\Payment;
use App\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OperationController extends Controller {
	public function transfer() {
		$banks = Bank::orderBy('name', 'asc')->whereStatus(Bank::PUBLISHED)->get();
		return view('operation.transfer', compact('banks'));
	}

	public function payment() {
		$banks = Bank::orderBy('name', 'asc')->whereStatus(Bank::PUBLISHED)->get();
		return view('operation.payment', compact('banks'));
	}

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

		$operations = Operation::with([
			'operationType',
			'payment.account' => function ($q) {
				$q->withTrashed();
			},
			'transfers.account' => function ($q) {
				$q->withTrashed();
			},
		])
			->whereUserId(auth()->user()->id)
			->orderBy('created_at', 'desc')
			->paginate(10);

		return view('operation.history', compact('operations'));
	}

	public function show() {
		if (\request()->ajax()) {
			$operation = Operation::with(['payment', 'transfers'])->whereId(\request('id'))->first();
			if ($operation->operation_type_id == OperationType::TRANSFER) {
				$description = 'Transferencia desde ' . $operation->transfers[0]->account->bank->name . ' hasta ' . $operation->transfers[1]->account->bank->name;
			}
			if ($operation->operation_type_id == OperationType::PAYMENT) {
				$description = 'Pago al la institución ' . $operation->payment->bankOperation->name . ' por medio del banco ' . $operation->payment->account->bank->name;
			}

			return response()->json([
				'type' => $operation->operation_type_id,
				'amount' => 'S/' . $operation->amount,
				'comission' => 'S/' . $operation->comission,
				'totalAmount' => 'S/' . ($operation->amount + $operation->comission),
				'depositCode' => $operation->deposit_code,
				'transferCode' => $operation->transfer_code,
				'description' => $description,
				'status' => $operation->status == Operation::INPROCESS ? 'En proceso' : ($operation->status == Operation::COMPLETED ? 'Completada' : 'Cancelada'),
				'date' => $operation->created_at->format('d-m-Y'),
			]);
		}
		return abort(401);
	}

	public function store(Request $request) {

		$request->merge(['user_id' => auth()->user()->id]);
		$request->merge(['status' => \App\Operation::INPROCESS]);
		$request->merge(['comission' => $request->amount > 500 ? 2 : 1]);

		if ($request->operation_type_id == Operation::TRANSFER) {

			$operation = Operation::create($request->input());
			Transfer::create([
				'operation_id' => $operation->id,
				'account_id' => $request->from,
			]);

			if ($request->has('to')) {

				Transfer::create([
					'operation_id' => $operation->id,
					'account_id' => $request->to,
				]);
			}
			if ($request->has('account_number')) {

				Transfer::create([
					'operation_id' => $operation->id,
					'account_id' => null,
					'account_number' => $request->account_number,
					'bank_id' => $request->bank_id,
					'name' => $request->name,
				]);
			}

		}

		if ($request->operation_type_id == Operation::PAYMENT) {
			$operation = Operation::create($request->input());
			Payment::create([
				'operation_id' => $operation->id,
				'account_id' => $request->from,
				'bank_operation_id' => $request->bank_operation_id,
				'code' => $request->code,
			]);
		}

		Mail::to('roberth@gmail.com')->send(new NewOperation($operation));

		session(['deposit' => false]);
		return view('operation.confirm');
	}

}
