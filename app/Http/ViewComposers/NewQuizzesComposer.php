<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;

class NewQuizzesComposer {
	public function compose(View $view) {
		$view->with('newQuizzes', FQuizController::get_latest(4));
	}
}