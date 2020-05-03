<?php

namespace App\Http\Controllers;

use App\Bank;
use App\BankAccount;
use App\BankOperation;
use App\Operation;
use App\OperationType;
use App\Payment;
use App\Transfer;
use Illuminate\Http\Request;

class OperationController extends Controller {
	public function transfer() {
		$banks = Bank::with(['accounts'])->whereHas('accounts', function ($q) {
			$q->where('user_id', 1);
		})->orderBy('name', 'asc')->whereStatus(Bank::PUBLISHED)->get();
		return view('operation.transfer', compact('banks'));
	}

	public function payment() {
		$banks = Bank::with(['accounts'])->whereHas('accounts', function ($q) {
			$q->where('user_id', 1);
		})->orderBy('name', 'asc')->whereStatus(Bank::PUBLISHED)->get();
		return view('operation.payment', compact('banks'));
	}

	public function depositCreate(Request $request) {
		session(['deposit' => true]);
		$account = BankAccount::with(['bank'])
			->whereBankId($request->bankId)
			->whereUserId(1)
			->first();
		$type = $request->operationType;
		return view('operation.deposit', compact('account', 'type'));
	}

	public function history() {

		$operations = Operation::with([
			'operationType',
			'payment.bankAccount' => function ($q) {
				$q->with(['bank'])->withTrashed();
			},
			'transfer.fromAccount' => function ($q) {
				$q->with(['bank'])->withTrashed();
			},
			'transfer.toAccount' => function ($q) {
				$q->with(['bank'])->withTrashed();
			},
		])
			->whereUserId(auth()->user()->id)
			->orderBy('created_at', 'desc')
			->paginate(10);
		return view('operation.history', compact('operations'));
	}

	public function show() {
		if (\request()->ajax()) {
			$operation = Operation::with([
				'payment',
				'transfer',
			])->whereId(\request('id'))->first();
			if ($operation->operation_type_id == OperationType::TRANSFER) {
				$description = 'Transferencia desde ' . $operation->transfer->fromAccount->bank->name . ' hasta ' . $operation->transfer->toAccount->bank->name;
			}
			if ($operation->operation_type_id == OperationType::PAYMENT) {
				$description = 'Pago al la institución ' . $operation->payment->bankOperation->name . ' por medio del banco ' . $operation->payment->bankAccount->bank->name;
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
		$request->merge(['comission' => $request->amount <= 200 ? 1 : 2]);

		if ($request->operation_type_id == Operation::TRANSFER) {

			$operation = Operation::create($request->input());

			if ($request->has('to')) {
				// dd($request->all());
				Transfer::create([
					'operation_id' => $operation->id,
					'from_bank_account_id' => $request->from,
					'to_bank_account_id' => $request->to,
				]);

				$fromAccount = BankAccount::with(['bank'])->findOrFail($request->from);
				$toAccount = BankAccount::with(['bank', 'user'])->findOrFail($request->to);

				$text = 'Hola,%20quiero%20hacer%20una%20transferencia%20de%20S/' . $request->amount . '%20a%20mi%20cuenta%20' . $toAccount->bank->name . '%20' . $toAccount->number . '%20a%20nombre%20de%20' . $toAccount->user->name . '%20desde%20mi%20otra%20cuenta%20' . $fromAccount->bank->name . '%20' . $fromAccount->number . '.%20';

			}

			if ($request->has('account_number')) {

				Transfer::create([
					'operation_id' => $operation->id,
					'from_bank_account_id' => $request->from,
					'to_bank_account_id' => null,
					'account_number' => $request->account_number,
					'bank_id' => $request->bank_id,
					'name' => $request->name,
				]);

				$bank = Bank::findOrFail($request->bank_id);

				$text = 'Hola,%20quiero%20hacer%20una%20transferencia%20a%20la%20cuenta%20' . $bank->name . '%20' . $request->account_number . '%20a%20nombre%20de%20' . $request->name . '.%20';
			}

		}

		if ($request->operation_type_id == Operation::PAYMENT) {
			$operation = Operation::create($request->input());
			Payment::create([
				'operation_id' => $operation->id,
				'bank_account_id' => $request->from,
				'bank_operation_id' => $request->bank_operation_id,
				'code' => $request->code,
				'name' => $request->name,
			]);

			$bankOperation = BankOperation::with(['bank'])->findOrFail($request->bank_operation_id);

			$text = 'Hola,%20quiero%20hacer%20un%20pago%20de%20S/' . $request->amount . '%20a%20la%20empresa%20' . $bankOperation->name . '%20,%20mi%20codigo%20de%20pago%20es%20el%20' . $request->code . '.%20';
		}

		$fromAccount = BankAccount::with(['bank'])->findOrFail($request->from);

		$depositAccount = BankAccount::with(['bank', 'user'])->whereUserId(1)->whereBankId($fromAccount->bank->id)->get()->first();

		// Mail::to('roberth@gmail.com')->send(new NewOperation($operation));
		$finalText = 'La%20transferencia%20de%20los%20fondos%20la%20realizo%20al%20banco%20' . $depositAccount->bank->name . ',%20cuenta%20' . $depositAccount->number . '%20(' . $depositAccount->user->name . '),%20el%20numero%20de%20operacion%20es%20el%20' . $request->deposit_code . '.';

		$whatAppUrl = 'https://api.whatsapp.com/send?phone=51944001458&text=' . $text . $finalText;

		// session(['deposit' => false]);
		// return redirect($whatAppUrl);
		return view('operation.confirm');
	}

}
