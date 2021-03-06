<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory {
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Question::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition() {
		return [
			'question' => $this->faker->sentence,
			//'id'=>$this->faker->id,
			'quiz_id' => Quiz::factory(),
			//'answer_id' => Answer::factory(),
		];
	}
}
