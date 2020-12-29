<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizUpdateRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {

		$rules = [
			'title' => 'required|min:4|max:50',
			'description' => 'required|min:15|max:600',
		];

		$counter = 1;

		for ($i = 1; $i <= 8; $i++) {

			if ($this->request->has('question' . $i)) {

				$rules['question' . $i] = 'required|min:15|max:250';

				for ($k = 1; $k <= 8; $k++) {

					if ($this->request->has('rightAnswer' . $i . '_' . $k)) {

						$rules['rightAnswer' . $i . '_' . $k] = 'required|max:100';
					} elseif ($this->request->has('wrongAnswer' . $i . '_' . $k)) {
						$rules['wrongAnswer' . $i . '_' . $k] = 'required|max:100';
					}
				}
			}
		}
		return $rules;
	}

	public function attributes() {
		$attributes = [];
		$locale = session()->get('locale', 'en');
		switch ($locale) {
		case 'en':

			for ($i = 1; $i <= 8; $i++) {
				$attributes['question' . $i] = 'Question';
				for ($k = 1; $k <= 8; $k++) {
					$attributes['rightAnswer' . $i . '_' . $k] = 'Correct answer';
					$attributes['wrongAnswer' . $i . '_' . $k] = 'Wrong answer';
				}

			}
			return $attributes;
			break;

		case 'ua':
			$attributes['description'] = 'опис';
			$attributes['title'] = 'назва вікторини';
			for ($i = 1; $i <= 8; $i++) {
				$attributes['question' . $i] = 'запитання';
				for ($k = 1; $k <= 8; $k++) {
					$attributes['rightAnswer' . $i . '_' . $k] = 'варіант правильної відповіді';
					$attributes['wrongAnswer' . $i . '_' . $k] = 'варіант неправильної відповіді';
				}

			}
			return $attributes;
			break;

		case 'ru':
			$attributes['description'] = 'описание';
			$attributes['title'] = 'назва викторины';
			for ($i = 1; $i <= 8; $i++) {
				$attributes['question' . $i] = 'вопрос';
				for ($k = 1; $k <= 8; $k++) {
					$attributes['rightAnswer' . $i . '_' . $k] = 'вариант правильного ответа';
					$attributes['wrongAnswer' . $i . '_' . $k] = 'вариант неправильного ответа';
				}

			}
			return $attributes;
			break;
		}
	}

	/*$locale = session()->get('locale', 'en');
		    switch ($locale) {
		    case 'ua':
		    return [
		    'title.required' => 'Назва вікторини має бути введена',
		    'title.min' => 'Назва вікторини має містити більше 4 знаків',
		    'title.max' => 'Назва вікторини не має бути більше ніж 50 символів',
		    'description.required' => 'Напишіть короткий опис для Вашої вікторини',

		    ];
		    break;
		    case 'en':
		    return [

		    ];
		    break;
		    }

	*/
}
