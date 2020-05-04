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
		$operations = Operation::with([
			'payment.bankAccount' => function ($q) {
				$q->with(['bank', 'user']);
			},
			'payment.bankOperation.bank',
			'transfer.fromAccount' => function ($q) {
				$q->with(['bank', 'user']);
			},
			'transfer.toAccount' => function ($q) {
				$q->with(['bank', 'user']);
			},
			'transfer.bank',
		])
			->whereStatus(Operation::INPROCESS)
			->orderBy('created_at', 'asc')
			->get();

		// return DataTables::of($operations)
		// 	->toJson();

		return DataTables::of($operations)
			->addColumn('operation', 'admin.operation.datatable.operation')
			->addColumn('from', 'admin.operation.datatable.from')
			->addColumn('to', 'admin.operation.datatable.to')
			->addColumn('actions', 'admin.operation.datatable.actions')
			->addColumn('date', 'admin.operation.datatable.date')
			->rawColumns(['operation', 'from', 'to', 'actions', 'date'])
			->toJson();
	}

	public function datatableAll() {
		$operations = Operation::with([
			'operator',
			'payment.bankAccount' => function ($q) {
				$q->with(['bank', 'user']);
			},
			'payment.bankOperation.bank',
			'transfer.fromAccount' => function ($q) {
				$q->with(['bank', 'user']);
			},
			'transfer.toAccount' => function ($q) {
				$q->with(['bank', 'user']);
			},
			'transfer.bank',
		])
			->orderBy('created_at', 'desc')
			->get();

		return DataTables::of($operations)
			->editColumn('operator', '{{$operator != null ? $operator["name"] : ""}}')
			->addColumn('operation', 'admin.operation.datatable.operation')
			->addColumn('from', 'admin.operation.datatable.from')
			->addColumn('to', 'admin.operation.datatable.to')
			->addColumn('status', 'admin.operation.datatable.status')
			->addColumn('actions', 'admin.operation.datatable.actions')
			->addColumn('date', 'admin.operation.datatable.date')
			->rawColumns(['operation', 'from', 'to', 'status', 'actions', 'date'])
			->toJson();
	}

	public function updateDepositCode(Operation $operation, Request $request) {
		$request->merge(['deposit_code_status' => Operation::DEPOSITDONE]);
		$request->merge(['status' => Operation::INPROCESS]);
		$request->merge(['operator_id' => auth()->user()->id]);
		$operation->fill($request->input())->save();
		return back();
	}

	public function updateTransferCode(Operation $operation, Request $request) {
		$request->merge(['deposit_code_status' => Operation::DEPOSITDONE]);
		$request->merge(['status' => Operation::COMPLETED]);
		$request->merge(['operator_id' => auth()->user()->id]);
		$operation->fill($request->input())->save();
		return back();
	}

	public function cancelOperation(Request $request) {
		$request->merge(['status' => Operation::CANCELLED]);
		$operation = Operation::whereId($request->id)->first();
		$operation->fill($request->input())->save();
		return back();
	}

	public function all() {
		return view('admin.operation.all');
	}

	public function sendConfirmationMessage() {
		if (\request()->ajax()) {
			$operation = Operation::findOrFail(\request()->id);
			$operation->load(['user']);
			try {
				Mail::to($operation->user->email)->send(new SendConfirmation($operation));
				$success = true;
				$operation->mail = Operation::SENT;
				$operation->save();
			} catch (\Exception $exception) {
				$success = false;
			}
			return response()->json(['res' => $success]);
		}

	}

	public function show(Operation $operation) {
		return view('admin.operation.show', compact('operation'));
	}
}
