<?php

namespace App\Http\Controllers;
use App\Models\Quiz;
use Illuminate\Support\Facades\App;

class HomeController extends Controller {

	/*
		    *Set locale.
		    *
		    *@return to previous page
	*/
	public function lang($locale) {
		\App::setLocale($locale);
		session()->put('locale', $locale);
		return redirect()->back();
	}

	/*
		    *Show application index page.
		    *
		    *@return view with latest added quiz objects
	*/
	public function index() {
		return view('welcome', [
			'quizzes' => Quiz::take(2)->latest()->get(),
			'quizzes1' => Quiz::skip(2)->take(2)->latest()->get(),
		]);
	}

	/*
		    *Show application index page.
		    *
		    *@return view with latest added quiz objects
	*/
	public function about() {
		return view('about');
	}

	/*
		    *Create a new controller instance.
		    *@return void
	*/
	public function __construct() {
		//$this->middleware('auth');
	}

}
