<?php

namespace App\Http\Controllers;

use App\Models\Answer;

class AnswerController extends Controller {
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Answer  $question
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Answer $answer) {
		$answer->delete();
		echo 'here';
		return redirect()->back();
	}
}
