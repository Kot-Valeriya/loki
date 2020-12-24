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
		]);
		$quiz->questions()->save($question);

		$this->setAnswers($request, $question);
	}

	public function editQuiz(Request $request, Quiz $quiz) {

		$counter = 1;
		foreach ($quiz->questions as $question) {

			$question->update([
				'question' => request('question' . $counter),
			]);

			$this->updateAnswers($request, $question, $counter . '_', 'rightAnswer', 'wrongAnswer');

			$counter++;
		}
	}

	public function updateQuestion(Request $request, Question $question) {
		$this->updateAnswers($request, $question, 'existRightAnswer', 'existWrongAnswer');
		$this->setAnswers($request, $question);
	}

	private function setAnswers(Request $request, Question $question) {

		$answerRght = Answer::create([
			'answer' => request('rightAnswer'),
		]);
		$answerRght->is_correct = true;
		$question->answers()->save($answerRght);

		$answerWr = Answer::create([
			'answer' => request('wrongAnswer'),
		]);
		$answerWr->is_correct = false;
		$question->answers()->save($answerWr);

		for ($i = 1; $i <= 8; $i++) {

			if ($request->has('rightAnswer' . $i)) {
				$answer = Answer::create([
					'answer' => request('rightAnswer' . $i),
				]);
				$answer->is_correct = true;
				$question->answers()->save($answer);
			}
			if ($request->has('wrongAnswer' . $i)) {

				$answer = Answer::create([
					'answer' => request('wrongAnswer' . $i),
				]);
				$answer->is_correct = false;
				$question->answers()->save($answer);
			}
		}
	}

	private function updateAnswers(Request $request, Question $question, string $fieldName1, string $fieldName2, $counter = '_') {
		$k = 1;

		foreach ($question->answers as $answer) {

			if ($request->has($fieldName1 . $counter . $k)) {
				$answer->update([
					'answer' =>
					request($fieldName1 . $counter . $k),
					'is_correct' => true,
				]);
				$k++;
			} elseif ($request->has($fieldName2 . $counter . $k)) {
				$answer->update([
					'answer' =>
					request($fieldName2 . $counter . $k),
					'is_correct' => false,

				]);
				$k++;
			}
		}
	}

}