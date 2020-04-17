<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;

class AccountController extends Controller {
	public function getAccounts(Request $request) {
		$accounts = Account::whereBankId($request->bankId)->whereUserId(auth()->user()->id)->get();
		return response()->json($accounts);
	}
}
