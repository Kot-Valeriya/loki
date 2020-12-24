<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HandleResultController extends Controller {
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request) {
		$quiz = Quiz::find($request->route('quiz'))->load('questions.answers');

		$score = $quiz->solve($request->get('answers'));
		if (Auth::check()) {
			$user = Auth::user();
			$user->score += $score;

		}

		return view('quizzes.form',
			['partial' => 'quizzes.partials.result',
				'score' => $score,
				'quiz' => $quiz,
			]);
	}
}
