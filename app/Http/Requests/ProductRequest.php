<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [

		];
	}

	public function messages()
	{
		return [
		/*
			Alert !!!
		 */
			'required' => 'You have to enter some data to :attribute' ,
			'pro_name.required' => 'Please enter the title of this article'
		];
	}

}
