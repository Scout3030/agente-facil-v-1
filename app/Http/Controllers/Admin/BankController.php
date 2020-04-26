<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BankController extends Controller {
	public function index() {
		$bank = new Bank;
		$btn = 'Crear';
		return view('admin.bank.index', compact('bank', 'btn'));
	}

	public function edit(Bank $bank) {
		$btn = 'Editar';
		return view('admin.bank.index', compact('bank', 'btn'));
	}

	public function store(Request $request) {
		$request->validate([
			'name' => 'required|max:255',
			'description' => 'required',
			'icon' => 'required',
		]);

		$logo = Helper::uploadFile('logo', 'banks');
		$request->merge(['logo' => $logo]);
		Bank::create($request->input());

		return back()->with('message', __('Banco creado correctamente'));
	}

	public function update(Request $request, Bank $bank) {
		$validatedData = $request->validate([
			'name' => 'required|max:255',
			'description' => 'required',
			'icon' => 'required',
		]);
		if ($request->hasFile('logo')) {
			\Storage::delete('banks/' . $bank->logo);
			$logo = Helper::uploadFile("logo", 'banks');
			$request->merge(['logo' => $logo]);
		}
		$bank->fill($request->input())->save();
		return redirect()->route('admin.bank.index')->with('message', __('Banco actualizado correctamente'));
	}

	public function destroy(Bank $bank) {
		try {
			$bank->delete();
			return back()->with('message', __("Banco eliminado correctamente"));
		} catch (\Exception $exception) {
			return back()->with('message', __("Error eliminando el curso"));
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
