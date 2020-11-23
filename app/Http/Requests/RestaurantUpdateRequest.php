<?php

namespace App\Http\Requests;

class RestaurantUpdateRequest extends Request
{

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$rules = [
			'name' => 'required|max:255',
			'start.*' => 'date',
			'end.*' => 'date'
		];

		return $rules;
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

}