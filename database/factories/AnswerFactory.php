<?php

namespace Database\Factories;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory {
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Answer::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition() {
		return [
			'answer' => $this->faker->sentence,
			//'id'=>$this->faker->id,
			'question_id' => Question::factory(),
			'is_correct' => $this->faker->boolean,
		];
	}
}
