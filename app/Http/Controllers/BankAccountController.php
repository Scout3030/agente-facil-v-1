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
		$request->merge(['user_id' => auth()->user()->id]);
		BankAccount::create($request->input());
		return back();
	}

	public function destroy(Account $account) {
		$account->delete();
		return back();
	}
}
