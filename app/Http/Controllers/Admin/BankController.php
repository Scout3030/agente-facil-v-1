<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BankController extends Controller {
	public function index() {
		$bank = new Bank;
		return view('admin.bank.index', compact('bank'));
	}

	public function edit(Bank $bank) {
		return view('admin.bank.index', compact('bank'));
	}

	public function store(Request $request) {
		$validatedData = $request->validate([
			'name' => 'required|unique:posts|max:255',
			'description' => 'required',
			'icon' => 'required',
		]);

		$logo = Helper::uploadFile('logo', 'banks');
		$request->merge(['logo' => $logo]);
		Bank::create($request->input());
		return back();
	}

	public function update(Request $request, Bank $bank) {
		$validatedData = $request->validate([
			'name' => 'required|unique:posts|max:255',
			'description' => 'required',
			'icon' => 'required',
		]);
		if ($request->hasFile('logo')) {
			\Storage::delete('banks/' . $bank->logo);
			$logo = Helper::uploadFile("logo", 'courses');
			$request->merge(['logo' => $logo]);
		}
		$bank->fill($request->input())->save();
		return redirect()->route('admin.bank.index')->with('message', ['success', __('Banco actualizado')]);
	}

	public function destroy(Bank $bank) {
		try {
			$bank->delete();
			return back()->with('message', ['success', __("Banco eliminado correctamente")]);
		} catch (\Exception $exception) {
			return back()->with('message', ['danger', __("Error eliminando el curso")]);
		}
	}

	public function banks() {
		$banks = Bank::orderBy('name', 'asc')->get();
		return response()->json($banks);
	}

	public function status(Request $request) {
		$bank = Bank::whereId($request->bankId)->first();
		$bank->status == Bank::PUBLISHED ? $request->merge(['status' => Bank::UNPUBLISHED]) : $request->merge(['status' => Bank::PUBLISHED]);
		$bank->fill($request->input())->save();
		return response()->json('ok', 200);
	}

}