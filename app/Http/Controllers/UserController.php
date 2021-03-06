<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\SetProfilePicture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller {
	use SetProfilePicture;
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('leaderboard', ['users' => User::orderBy('score', 'desc')->simplePaginate(12)]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function show(User $user) {
		$user->load('quizzes');

		$deletedQuizzes = $user->quizzes()->onlyTrashed()->get();
		return view('profile', compact('user', 'deletedQuizzes'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function edit(User $user) {
		return view('auth.edit-profile', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, User $user) {
		$user->update($request->only('name', 'email'));
		return redirect()->
			route('users.show', ['user' => $user->id])->
			with('message', 'Your profile is successfully updated');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function uploadProfilePicture(Request $request) {

		if ($request->hasFile('profile_picture')) {

			$profile_picture = $request->file('profile_picture');
			$user = Auth::user();

			$this->uploadProfilePicture($profile_picture, $user);
		}

		return redirect()->back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(User $user) {
		//
	}
}
