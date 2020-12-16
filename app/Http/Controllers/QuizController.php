<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQuizRequest;
use App\Models\Quiz;
use App\Traits\CreateNewQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller {

	use CreateNewQuestion;
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
		return view('quizzes.create', ['quizzes' => $this->get_latest(4), 'partial' => View::'partials.create-quiz-form')]);
	}

	/**
	 * Get latest entered quizzes.
	 *
	 * @return App\Models\Quiz
	 */
	public function get_latest(int $number) {
		return Quiz::take($number)->latest()->get();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(CreateQuizRequest $request) {

		$remainingQuestions = 0;

		if ($remainingQuestions === 0) {
			//\DB::beginTransaction();
			$quiz = Quiz::create([
				'title' => request('title'),
				'description' => request('description'),
				'number_of_questions' => request('number_of_questions'),
				'user_id' => Auth::id(),
			]);

			$user = Auth::user();
			$user->quizzes()->save($quiz);

			$remainingQuestions = request('number_of_questions');
		}

		while ($remainingQuestions > 0) {
			$this->createNewQuestion($request, $quiz, $remainingQuestions);
			$remainingQuestions--;
			return view('quizzes.newQuestion-form', ['quizzes' => $this->get_latest(4), 'quiz' => $quiz, 'remainingQuestions' => $remainingQuestions, 'partial' => view('partials.create-form')]);
		}
		return redirect('/');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Quiz  $quiz
	 * @return \Illuminate\Http\Response
	 */
	public function show(Quiz $quiz) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Quiz  $quiz
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Quiz $quiz) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Quiz  $quiz
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Quiz $quiz) {
		return redirect();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Quiz  $quiz
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Quiz $quiz) {
		//
	}
}
