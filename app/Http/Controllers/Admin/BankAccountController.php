<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use App\BankAccount;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BankAccountController extends Controller {
	public function index() {

		$banks = Bank::whereStatus(Bank::PUBLISHED)->orderBy('name', 'asc')->get();
		$account = new BankAccount;
		$btn = 'Crear';
		return view('admin.account.index', compact('account', 'btn', 'banks'));
	}

	public function edit(BankAccount $bankAccount) {
		$banks = Bank::whereStatus(Bank::PUBLISHED)->orderBy('name', 'asc')->get();
		$btn = 'Editar';
		return view('admin.account.index', compact('account', 'btn', 'banks'));
	}

	public function store(Request $request) {
		$request->validate([
			'bank_id' => 'required',
			'number' => 'required',
			'name' => 'required',
		]);
		$request->merge(['user_id' => auth()->user()->id]);
		BankAccount::create($request->input());

		return back()->with('message', __('Cuenta creada correctamente'));
	}

	public function update(Request $request, BankAccount $bankAccount) {
		$request->validate([
			'bank_id' => 'required',
			'number' => 'required',
			'name' => 'required',
		]);

		$account->fill($request->input())->save();
		return redirect()->route('admin.account.index')->with('message', __('Cuenta actualizada correctamente'));
	}

	public function destroy(BankAccount $bankAccount) {
		try {
			$account->delete();
			return response()->json('message', 200);
		} catch (\Exception $exception) {
			return response()->json('message', 204);
		}
	}

	public function accounts() {
		$accounts = BankAccount::with(['bank'])->get();
		return response()->json($accounts);
	}
}
