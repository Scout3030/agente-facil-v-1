<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller {
	public function index() {
		$question = new Question;
		$btn = 'Crear';
		return view('admin.faq.index', compact('question', 'btn'));
	}

	public function edit(Question $question) {
		$btn = 'Editar';
		return view('admin.faq.index', compact('question', 'btn'));
	}

	public function store(Request $request) {
		$request->validate([
			'title' => 'required|max:255',
			'description' => 'required',
		]);

		Question::create($request->input());

		return back()->with('message', __('Pregunta creada correctamente'));
	}

	public function update(Request $request, Question $question) {
		$validatedData = $request->validate([
			'title' => 'required|max:255',
			'description' => 'required',
		]);
		$question->fill($request->input())->save();
		return redirect()->route('admin.faq.index')->with('message', __('Pregunta actualizada correctamente'));
	}

	public function destroy(Question $question) {
		try {
			$question->delete();
			return back()->with('message', __("Pregunta eliminada correctamente"));
		} catch (\Exception $exception) {
			return back()->with('message', __("Error eliminando la pregunta"));
		}
	}
}
