<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request {

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
			'nombre'      =>'required',
			'num_telefono'    =>'required|numeric',
			'email_cli'   =>'required|email',
			'Fcalle'      => 'required',
			'Fcolonia'    => 'required',
			'grupoGiro'   => 'required',
			'Fciudad'     => 'required',
			'Fmunicipio'  => 'required',
			'Festado'     => 'required',
			'Fcp'         => 'required|min:5|integer',
			'Fnumero'     => 'required|integer',
			'Fpais'       => 'required',
		];
	}

}
