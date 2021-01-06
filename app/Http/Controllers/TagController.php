<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller {

	/**
	 * Show all related data to one tag
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show(Tag $tag) {

		$quizzes = Tag::findOrFail($tag->id)
			->quizzes()
			->simplePaginate(9);

		return view('quizzes.index',
			['quizzes' => $quizzes]);

	}

	/*
		*
		*AJAX request
		*
	*/
	public function getTags(Request $request) {

		$query = $request->get('query');

		$data = Tag::orderby('name', 'asc')
			->select('id', 'name')
			->where('name', 'like', "%{$query}%")
			->limit(5)
			->get();

		$output = '<ul class="dropdown-menu" style="display:block; position:relative">';
		foreach ($data as $tag) {
			$output .= '
       <li><a class="tag">' . $tag->name . '</a></li>
       ';
		}
		$output .= '</ul>';
		echo $output;
	}
}
