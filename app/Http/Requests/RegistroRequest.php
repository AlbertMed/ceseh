<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegistroRequest extends Request {

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
			'name' 			=> 'required|max:255',
			'apellido' 		=> 'required',
			'telefono' 		=> 'required|numeric',
			'email' 		=> 'required|email|max:255|unique:users',
			'password' 		=> 'required|confirmed|min:6',
		];
	}

}
