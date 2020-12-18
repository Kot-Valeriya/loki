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
		return view('quizzes.index', ['quizzes' => \DB::table('quizzes')->simplePaginate(9)]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('quizzes.create', ['partial' => 'quizzes.partials.create-quiz-form']);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store(CreateQuizRequest $request) {

		if (!isset($remainingQuestions)) {
			\DB::beginTransaction();
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

			return view('quizzes.create', [
				'quiz' => $quiz,
				'remainingQuestions' => $remainingQuestions,
				'partial' => 'quizzes.partials.create-question-form']);
		}
		\DB::commit();
		return 'success';

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Quiz  $quiz
	 * @return \Illuminate\Http\Response
	 */
	public function show(Quiz $quiz) {

		$quiz->load('questions.answers');

		return view('quizzes.show', compact('quiz'));
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
