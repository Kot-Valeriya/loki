<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', 'HomeController@index')->name('home');

Route::resource('quizzes', 'QuizController');

Route::get('/quizzes/{quiz}', 'QuizController@show');
Route::post('/quizzes/{quiz}/result', 'HandleResultController');
Route::middleware('auth')->group(function () {

	Route::get('quizzes/{quizId}/questions/create', function () {
		return redirect()->action('QuestionController@create')->with(['quiz' => $quiz,
			'remainingQuestions' => $remainingQuestions]);})
		->name('quizzes.questions.create');
	Route::post('quizzes/{quizId}/questions', 'QuizController@store')
		->name('quizzes.questions.store');

	Route::get('/quizzes/{quiz}/edit', 'QuizController@edit');
	Route::put('quizzes/{quiz}', 'QuizController@update');

	Route::get('quizzes/create', 'QuizController@create')
		->name('quizzes.create');

	Route::patch('/quizzes/{quiz}', 'QuizController@update')->name('quizzes.update');

});
Route::post('quizzes', 'QuizController@store')
	->name('quizzes.store');
Route::get('/quizzes', 'QuizController@index')->name('quizzes.index');

Route::get('/about', function () {
	return view('about');
});

Route::get('/users/{user}', 'UserController@show')->name('users.show');
Route::get('/users/{user}/quizzes', 'QuizController@list')->name('users.quizzes');

Route::get('/leaderboard', 'UserController@index')->name('leaderboard');

Route::get('/lang/{locale}', 'HomeController@lang')->name('language.set');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
