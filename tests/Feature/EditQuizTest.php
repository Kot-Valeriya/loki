<?php

namespace Tests\Feature;

use App\Models\Quiz;
use App\Models\User;
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

	public function test_not_author_cannot_edit() {
		$user = User::factory()->make();
		$quiz = Quiz::factory()->make();

		$response = $this->actingAs($user)->patch('/quizzes/' . $quiz->id);

		$response->assertStatus(405); //Not Allowed
	}
}
