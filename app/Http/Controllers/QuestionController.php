<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('quizzes.form', [
			'quiz' => $quiz,
			'remainingQuestions' => $remainingQuestions,
			'partial' => 'quizzes.partials.create-question-form']);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Question  $question
	 * @return \Illuminate\Http\Response
	 */
	public function show(Question $question) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Question  $question
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Question $question, Quiz $quiz) {
		return view('quizzes.form', [
			'quiz' => $quiz,
			'question' => $question,
			'partial' => 'quizzes.partials.edit-question-form']);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Question  $question
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Question $question) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Question  $question
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Question $question) {
		//
	}

}
