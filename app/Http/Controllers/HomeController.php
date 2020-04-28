<?php

namespace App\Http\Controllers;

use App\Bank;
use App\OperationType;
use Illuminate\Http\Request;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		// $this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index() {

		if (auth()->check()) {
			return redirect()->action('OperationController@transfer');
		}

		$banks = Bank::with(['accounts'])->whereHas('accounts', function ($q) {
			$q->where('user_id', 1);
		})->orderBy('name', 'asc')->whereStatus(Bank::PUBLISHED)->get();

		return view('home', compact('banks'));
	}

	public function operation(Request $request) {

		if ($request->operation == OperationType::TRANSFER) {
			return redirect()->action('OperationController@transfer');
		}

		if ($request->operation == OperationType::PAYMENT) {
			return redirect()->action('OperationController@payment');
		}

		return back();
	}
}
