<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuizRequest extends FormRequest {
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
		return [
			'title' => 'required|min:4|max:50',
			'description' => 'required|min:15|max:600',
			'number_of_questions' => 'required|integer',
			'question' => 'required|min:15|max:250',
			'rightAnswer' => 'required|max:100',
			'wrongAnswer' => 'required|max:100',
		];
	}

	public function messages() {
		$locale = session()->get('locale', 'en');
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

	}
}
