<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		view()->composer(
			['partials.left-sidebar', 'partials.right-sidebar',
				'partials.no-sidebar'],
			\App\Http\ViewComposers\NewQuizzesComposer::class);

		\Blade::if ('ifFromEdit', function () {
			return app('router')->getRoutes()->match(app('request')->create(\URL::previous()))->getName() == 'quizzes.edit';
		});

		\Blade::if ('ifIsCorrect', function ($answer) {
			return $answer->is_correct;
		});

	}
}
