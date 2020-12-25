<?php

namespace Tests\Feature;

use App\Models\Quiz;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EditQuizTest extends TestCase {
	use RefreshDatabase;
	/**
	 * A basic feature test example.
	 *
	 * @return void
	 */
	public function test_it_redirects_unauthorized() {

		$quiz = Quiz::factory()->make();

		$response = $this->get('/quizzes/' . $quiz . '/edit');

		$response->assertRedirect(route('login'));
	}
}
