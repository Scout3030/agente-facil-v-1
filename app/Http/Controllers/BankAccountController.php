<?php

namespace App\Http\Controllers;

use App\BankAccount;
use Illuminate\Http\Request;

class BankAccountController extends Controller {
	public function getAccounts(Request $request) {
		$accounts = BankAccount::whereBankId($request->bankId)->whereUserId(auth()->user()->id)->get();
		return response()->json($accounts);
	}

	public function store(Request $request) {
		// dd($request->all());
		$request->merge(['user_id' => auth()->user()->id]);
		BankAccount::create($request->input());
		return back()->with(['message' => 'Cuenta creada correctamente', 'route' => $request->route]);
	}

	public function destroy(BankAccount $bankAccount) {
		$bankAccount->delete();
		return back()->with('message', 'Cuenta eliminada correctamente');
	}
}
