<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class contactoRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize(){
		return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'nombre_empresa'     =>'required',
            'nombre_solicitante' => 'required',
            'email'              => 'required',
            'telefono'           => 'required',
            'asunto'             => 'required',
            'mensaje'            => 'required'
        ];
    }

}
