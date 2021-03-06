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

Route::resource('quizzes', 'QuizController');
Route::resource('questions', 'QuestionController', [
	'only' => [
		'create',
		'edit',
		'update',
		'destroy',
	],
]);

Route::middleware('auth')->group(function () {
	Route::prefix('/quizzes')->group(function () {

		Route::get('/create', 'QuizController@create')
			->name('quizzes.create');
		Route::post('/', 'QuizController@store')
			->name('quizzes.store');

		Route::get('/{quiz}/edit', 'QuizController@edit')
			->name('quizzes.edit');
		Route::patch('/{quiz}', 'QuizController@update')
			->name('quizzes.update');

		Route::patch('/trashed/{quizTrashed}', 'QuizController@restore')
			->name('quizzes.restore');
		Route::delete('/{quiz}', 'QuizController@destroy')
			->name('quizzes.destroy');
		Route::delete('/trashed/{quizTrashed}', 'QuizController@delete')
			->name('quizzes.delete');

		Route::get('/{quiz}/questions/create', 'QuestionController@create')
			->name('quizzes.questions.create');
		Route::post('/{quiz}/questions', 'QuestionController@store')
			->name('quizzes.questions.store');
	});

	//Route::post('/quizzes/{quiz}/questions', 'QuizController@store')
	//->name('quizzes.questions.store');

	Route::get('/questions/{question}/edit', 'QuestionController@edit')->name('questions.edit');
	Route::patch('/questions/{question}', 'QuestionController@update')->name('questions.update');

	Route::delete('/questions/{question}', 'QuestionController@destroy')->name('questions.destroy');

	Route::delete('/answers/{answer}', 'AnswerController@destroy')->name('answers.destroy');

	Route::get('/users/{user}/edit', 'UserController@edit')
		->name('users.edit');
	Route::patch('/users/{user}/profile_picture', 'UserController@uploadProfilePicture')
		->name('users.profile_picture.update');
	Route::patch('/users/{user}', 'UserController@update')
		->name('users.update');
});

Route::get('/quizzes', 'QuizController@index')->name('quizzes.index');
Route::post('/quizzes/{quiz}/result', 'HandleResultController')
	->name('quizzes.result');

Route::get('/leaderboard', 'UserController@index')
	->name('leaderboard');
Route::get('/users/{user}', 'UserController@show')
	->name('users.show');
Route::get('/users/{user}/quizzes', 'QuizController@list')
	->name('users.quizzes');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/lang/{locale}', 'HomeController@lang')->name('language.set');
Route::get('/about', 'HomeController@about')->name('about');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
