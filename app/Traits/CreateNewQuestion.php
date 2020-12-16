<?php

namespace App\Traits;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

trait CreateNewQuestion {
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

		for ($i = 0; $i <= 8; $i++) {
			//dd($request);
			if ($i !== 0 && null !== $request->input('rightAnswer' . $i)) {break;}
			$answer = Answer::create([
				'answer' => $i !== 0 ? request('rightAnswer' . $i) : request('rightAnswer'),
			]);
			$answer->is_correct = true;
			$question->answers()->save($answer);
		}

		for ($i = 0; $i <= 8; $i++) {
			if ($i !== 0 && null !== $request->input('wrongAnswer' . $i)) {break;}
			$answer = Answer::create([
				'answer' => $i !== 0 ? request('wrongAnswer' . $i) : request('wrongAnswer'),
			]);
			$answer->is_correct = false;
			$question->answers()->save($answer);
		}
	}
}