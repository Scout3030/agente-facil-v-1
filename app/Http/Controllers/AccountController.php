<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;

class AccountController extends Controller {
	public function getAccounts(Request $request) {
		$accounts = Account::whereBankId($request->bankId)->whereUserId(auth()->user()->id)->get();
		return response()->json($accounts);
	}

	public function store(Request $request) {
		$request->merge(['user_id' => auth()->user()->id]);
		Account::create($request->input());
		return back();
	}

	public function destroy(Account $account) {
		$account->delete();
		return back();
	}
}
