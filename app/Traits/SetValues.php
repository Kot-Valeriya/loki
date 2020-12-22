<?php

namespace App\Traits;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

trait SetValues {
	/*
		* Store created new question in database with attached answers
		* Return void
	*/

	public function createNewQuestion(Request $request, Quiz $quiz) {
		$question = Question::create([
			'question' => request('question'),
			//'quiz_id'=>$quiz->id
		]);
		$quiz->questions()->save($question);
		//dd($request);
		for ($i = 1; $i <= 8; $i++) {
			//dd($request->input('rightAnswer'));
			if (!$request->has('rightAnswer' . $i)) {continue;}
			$answer = Answer::create([
				'answer' => request('rightAnswer' . $i),
			]);
			$answer->is_correct = true;
			$question->answers()->save($answer);
		}

		for ($i = 1; $i <= 8; $i++) {
			if (!$request->has('wrongAnswer' . $i)) {continue;}
			$answer = Answer::create([
				'answer' => request('wrongAnswer' . $i),
			]);
			$answer->is_correct = false;
			$question->answers()->save($answer);
		}
	}

	public function editQuiz(Request $request, Quiz $quiz) {

		$i = 1;
		foreach ($quiz->questions as $question) {
			$k = 1;
			$question->update([
				'question' => request('question' . $i),
			]);

			foreach ($question->answers as $answer) {

				if ($request->has('rightAnswer' . $i . '_' . $k)) {

					$answer->update([
						'answer' =>
						request('rightAnswer' . $i . '_' . $k),

					]);
					$k++;
				} elseif ($request->has('wrongAnswer' . $i . '_' . $k)) {

					$answer->update([
						'answer' =>
						request('wrongAnswer' . $i . '_' . $k),

					]);
					$k++;
				}
			}

			$i++;
		}
	}
}