<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SendConfirmation;
use App\Operation;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OperationController extends Controller {
	public function index() {
		return view('admin.operation.index');
	}

	public function datatable() {
		$operations = Operation::with(['payment.account.bank', 'transfers.account.bank', 'payment.bankOperation.bank', 'payment.account.user', 'transfers.account.user', 'transfers.bank'])
			->whereStatus(Operation::INPROCESS)
			->orderBy('created_at', 'asc')
			->get();

		return DataTables::of($operations)
			->addColumn('operation', 'admin.operation.datatable.operation')
			->addColumn('from', 'admin.operation.datatable.from')
			->addColumn('deposit', 'admin.operation.datatable.deposit')
			->addColumn('to', 'admin.operation.datatable.to')
			->addColumn('actions', 'admin.operation.datatable.actions')
			->addColumn('date', 'admin.operation.datatable.date')
			->rawColumns(['operation', 'from', 'deposit', 'to', 'actions', 'date'])
			->toJson();
	}

	public function datatableAll() {
		$operations = Operation::with(['operator', 'payment.account.bank', 'transfers.account.bank', 'payment.bankOperation.bank', 'payment.account.user', 'transfers.account.user', 'transfers.bank'])
			->orderBy('created_at', 'desc')
			->get();

		return DataTables::of($operations)
			->editColumn('operator', '{{$operator != null ? $operator["name"] : ""}}')
			->addColumn('operation', 'admin.operation.datatable.operation')
			->addColumn('from', 'admin.operation.datatable.from')
			->addColumn('deposit', 'admin.operation.datatable.deposit-all')
			->addColumn('to', 'admin.operation.datatable.to')
			->addColumn('status', 'admin.operation.datatable.status')
			->addColumn('date', 'admin.operation.datatable.date')
			->rawColumns(['operation', 'from', 'deposit', 'to', 'status', 'date'])
			->toJson();
	}

	public function acreditDeposit(Request $request) {
		$request->merge(['deposit_code_status' => Operation::DEPOSITDONE]);
		$request->merge(['operator_id' => auth()->user()->id]);
		$operation = Operation::whereId($request->id)->first();
		$operation->fill($request->input())->save();
		return back();
	}

	public function cancelOperation(Request $request) {
		$request->merge(['status' => Operation::CANCELLED]);
		$operation = Operation::whereId($request->id)->first();
		$operation->fill($request->input())->save();
		return back();
	}

	public function completeOperation(Operation $operation) {
		$operation->load([
			'operationType',
			'transfers',
			'payment.bankOperation.bank',
		]);
		return view('admin.operation.update', compact('operation'));
	}

	public function completeOperationStatus(Request $request, Operation $operation) {

		$request->merge(['status' => Operation::COMPLETED]);
		$operation->fill($request->input())->save();
		return redirect()->route('admin.operation.index');
	}

	public function all() {
		return view('admin.operation.all');
	}

	public function sendConfirmationMessage() {
		if (\request()->ajax()) {
			$operation = Operation::findOrFail(\request()->id);
			$operation->load(['user']);
			// return $operation;
			try {
				Mail::to($operation->user->email)->send(new SendConfirmation($operation));
				$success = true;
			} catch (\Exception $exception) {
				$success = false;
			}
			return response()->json(['res' => $success]);
		}

	}
}
