<?php

namespace App\Http\Controllers\Admin;

use App\BankOperation;
use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Http\Request;

class PaymentController extends Controller {
	public function index() {
		$bankOperation = new BankOperation;
		return view('admin.payment.index', compact('bankOperation'));
	}

	public function store(Request $request) {
		$request->validate([
			'name' => 'required|max:255',
			'requirement' => 'required',
			'bank_id' => 'required',
			'icon' => 'required',
		]);
		BankOperation::create($request->input());
		return back();
	}

	public function edit(BankOperation $bankOperation) {
		return view('admin.payment.index', compact('bankOperation'));
	}

	public function update(Request $request, BankOperation $bankOperation) {
		$request->validate([
			'name' => 'required|max:255',
			'requirement' => 'required',
			'bank_id' => 'required',
			'icon' => 'required',
		]);
		$bankOperation->fill($request->input())->save();
		return back()->with('message', __('Convenio actualizado correctamente'));
	}

	public function destroy(BankOperation $bankOperation) {
		try {
			$bankOperation->delete();
			return back()->with('message', __("Convenio eliminado correctamente"));
		} catch (\Exception $exception) {
			return back()->with('message', __("Error eliminando el curso"));
		}
	}

	public function status(BankOperation $bankOperation) {
		$bankOperation->status == BankOperation::PUBLISHED ? $bankOperation->status = BankOperation::UNPUBLISHED : $bankOperation->status = BankOperation::PUBLISHED;
		$bankOperation->save();
		return back();
	}

	public function datatable() {
		$payments = BankOperation::with('bank')->get();

		return DataTables::of($payments)
			->addColumn('status', 'admin.payment.datatable.status')
			->addColumn('actions', 'admin.payment.datatable.actions')
			->rawColumns(['status', 'actions'])
			->toJson();
	}
}
