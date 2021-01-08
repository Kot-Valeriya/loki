<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuizRequest;
use App\Http\Requests\QuizUpdateRequest;
use App\Models\Quiz;
use App\Models\Tag;
use App\models\User;
use App\Traits\SetValues;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller {

	use SetValues;
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		return view('quizzes.index',
			['quizzes' => Quiz::latest()->with('tags')->simplePaginate(9)]);
	}
	/**
	 * Display a listing of the quizzes filtered by specified user id.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function list($user) {

		return view('quizzes.index',
			['quizzes' => Quiz::latest()->where('user_id', $user->id)->simplePaginate(9)]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('quizzes.form',
			['partial' => 'quizzes.partials.create-quiz-form']);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store(QuizRequest $request) {

		if (!$request->session()->exists('remainingQuestions')) {
			//\DB::beginTransaction();

			$quiz = Quiz::create([
				'title' => request('title'),
				'description' => request('description'),
				'number_of_questions' => request('number_of_questions'),
				'user_id' => Auth::id(),
			]);

			$user = Auth::user();
			$user->quizzes()->save($quiz);

			$tags = Tag::firstOrCreate(['name' => request('tags')]);
			$quiz->tags()->attach($tags);

			$this->createNewQuestion($request, $quiz);

			session(['remainingQuestions' => (request('number_of_questions') - 1)]);
			session(['quiz' => $quiz]);

		}

		if (request()->session()->get('remainingQuestions') > 0) {
			return redirect()
				->route('quizzes.questions.create',
					['quiz' => request()->session()->get('quiz')->id]);
		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Quiz  $quiz
	 * @return \Illuminate\Http\Response
	 */
	public function show(Quiz $quiz) {

		$quiz->load('questions.answers');

		return view('quizzes.form',
			[
				'quiz' => $quiz,
				'partial' => 'quizzes.partials.show-quiz-form',
			]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Quiz  $quiz
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Quiz $quiz) {
		$quiz->load('questions.answers');

		return view('quizzes.form', [
			'quiz' => $quiz,
			'remainingQuestions' => $quiz->number_of_questions,
			'partial' => 'quizzes.partials.edit-quiz-form']);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Quiz  $quiz
	 * @return \Illuminate\Http\Response
	 */
	public function update(QuizUpdateRequest $request, Quiz $quiz) {
		dd($request);
		$this->authorize('update', $quiz);

		if ($request->input('sbmt-btn') === "create") {
			\DB::beginTransaction();

			$quiz->update($request->all());
			$this->editQuiz($request, $quiz);

			return view('quizzes.form', [
				'quiz' => $quiz,
				'remainingQuestions' => 0,
				'partial' => 'quizzes.partials.create-question-form']);

		} elseif ($request->input('sbmt-btn') === "add") {
			$this->createNewQuestion($request, $quiz);

			return redirect()
				->route('quizzes.edit', ['quiz' => $quiz]);

		} elseif ($request->input('sbmt-btn') === "save") {
			if (\DB::transactionLevel() == 0) {
				\DB::beginTransaction();
			}

			$quiz->update($request->all());
			$this->editQuiz($request, $quiz);
			\DB::commit();
		}
	}
	/**
	 * Restore the specified resource from storage.
	 *
	 * @param  \App\Models\Quiz  $quiz
	 * @return \Illuminate\Http\Response
	 */
	public function restore($quizId) {

		$quiz = Quiz::onlyTrashed()->find($quizId);
		$this->authorize('restore', $quiz);

		$quiz->restore();

		return redirect()->
			back()->
			with('message', 'Your quiz is successfully restored!');
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Quiz  $quiz
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Quiz $quiz) {

		$this->authorize('delete', $quiz);

		$userId = $quiz->user_id;
		$quiz->delete();

		return redirect()->
			route('users.show', $userId)->
			with('message', 'Your quiz is successfully deleted.');
	}
	/**
	 * Permanently remove the specified resource from storage.
	 *
	 * @param  \App\Models\Quiz  $quiz
	 * @return \Illuminate\Http\Response
	 */
	public function delete($quizId) {

		$quiz = Quiz::onlyTrashed()->find($quizId);
		$this->authorize('forceDelete', $quiz);

		$userId = $quiz->user_id;
		$quiz->forceDelete();

		return redirect()->
			back()->
			with('message', 'Your quiz is successfully  permanently deleted.');
	}
}
