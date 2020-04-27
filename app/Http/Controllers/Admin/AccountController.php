<?php

namespace App\Http\Controllers\Admin;

use App\Account;
use App\Bank;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller {
	public function index() {
		$banks = Bank::whereStatus(Bank::PUBLISHED)->orderBy('name', 'asc')->get();
		$account = new Account;
		$btn = 'Crear';
		return view('admin.account.index', compact('account', 'btn', 'banks'));
	}

	public function edit(Account $account) {
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
		Account::create($request->input());

		return back()->with('message', __('Cuenta creada correctamente'));
	}

	public function update(Request $request, Account $account) {
		$request->validate([
			'bank_id' => 'required',
			'number' => 'required',
			'name' => 'required',
		]);

		$account->fill($request->input())->save();
		return redirect()->route('admin.account.index')->with('message', __('Cuenta actualizada correctamente'));
	}

	public function destroy(Account $account) {
		try {
			$account->delete();
			return response()->json('message', 200);
		} catch (\Exception $exception) {
			return response()->json('message', 204);
		}
	}

	public function accounts() {
		$accounts = Account::with(['bank'])->get();
		return response()->json($accounts);
	}
}
