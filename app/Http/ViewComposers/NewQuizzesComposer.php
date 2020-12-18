<?php
namespace App\Http\ViewComposers;

use App\Models\Quiz;
use Illuminate\View\View;

class NewQuizzesComposer {
	public function compose(View $view) {
		$view->with('newQuizzes', Quiz::get_latest(4));
	}
}