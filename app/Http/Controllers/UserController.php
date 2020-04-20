<?php

namespace App\Http\Controllers;

use App\Bank;
use Illuminate\Http\Request;

class UserController extends Controller {
	public function profile() {
		return view('user.profile');
	}

	public function accounts() {
		$banks = Bank::whereStatus(Bank::PUBLISHED)->orderBy('name', 'desc')->get();
		return view('user.accounts', compact('banks'));
	}

	public function profileUpdate(Request $request) {
		$user = auth()->user();
		if ($request->has('password')) {
			$request->merge(['password' => bcrypt($request->password)]);
		}
		$user->fill($request->input())->save();
		return back();
	}
}
