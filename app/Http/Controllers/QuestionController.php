<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use App\Traits\SetValues;
use Illuminate\Http\Request;

class QuestionController extends Controller {

	use SetValues;

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
	}

	/**u
		 * Show the form for creating a new resource.
		 *
		 * @return \Illuminate\Http\Response
	*/
	public function create() {

		$quiz = request()->session()->get('quiz'); //, Quiz::find(\DB::getPdo()->lastInsertId()));

		return view('quizzes.form', [
			'quiz' => $quiz,
			'partial' => 'quizzes.partials.create-question-form']);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		$remainingQuestions = request()->session()->get('remainingQuestions');
		$quiz = request()->session()->get('quiz');

		$this->createNewQuestion($request, $quiz);
		$remainingQuestions--;

		session(['remainingQuestions' => $remainingQuestions]);
		session(['quiz' => $quiz]);

		if ($remainingQuestions > 0) {
			return redirect()->back()->with('remainingQuestions', $remainingQuestions);
		} else {
			$request->session()->forget('remainingQuestions');
			//\DB::commit();
			return redirect()
				->route('users.show', ['user' => $quiz->user_id])
				->with('message', 'Your quiz is successfully created!');
		}

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
		$question->update($request->all());
		$this->updateQuestion($request, $question);
		return redirect()
			->route('quizzes.edit',
				['quiz' => $question->quiz_id])
			->with('message', 'Your question is updated');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Question  $question
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Question $question) {

		$quizId = $question->quiz_id;

		$question->delete();
		return redirect()->route('quizzes.edit', ['quiz' => $quizId])->with('message', 'Your question is deleted');
	}

}
