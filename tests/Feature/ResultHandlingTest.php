<?php

namespace Tests\Feature;

use App\Models\Answer;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ResultHandlingTest extends TestCase {
	use InteractsWithViews;
	use RefreshDatabase;

	public function setUp(): void{
		parent::setUp();

		// seed the database
		$this->artisan('db:seed');
	}

	/**
	 * A basic feature test example.
	 *
	 * @return void
	 */
	public function test_it_displays_proper_result_view() {
		$quiz = Quiz::factory()->make();
		$view = $this->view('quizzes.form',
			['partial' => 'quizzes.partials.result',
				'score' => 1,
				'quiz' => $quiz,
			]);
		$view->assertSee('score');
		$view->assertSeeText($quiz->name);

	}

	public function test_it_calculates_score() {
		//Assign
		$quiz = new Quiz;
		$answers = array(0, 0, 1, 1);
		//Act
		$score = $quiz->solve($answers);
		//Assert
		$this->assertEquals(2, $score);
	}

	public function test_it_handles_input() {
		//Assign
		$user = User::factory()->create();
		$quiz = Quiz::factory()->has(Answer::factory()->count(4))->create();
		//Act
		$response = $this->json('POST', '/quizzes/' . $quiz . '/result', ['answers' => array(1, 1)]); //Assert
		$response->assertSessionMissing(0);

	}
}
