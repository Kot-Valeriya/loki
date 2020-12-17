<?php
namespace App\Http\ViewComposers;

use App\Http\Controllers\QuizController;
use Illuminate\View\View;

class NewQuizzesComposer {
	public function compose(View $view) {
		$view->with('newQuizzes', QuizController::get_latest(4));
	}
}