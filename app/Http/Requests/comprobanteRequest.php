<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class comprobanteRequest extends Request {

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
     *  'nombre_solicitante' => 'required',
    'email'              => 'required|email',
    'telefono'           => 'require|integer',
    'asunto'             => 'required',
    'mensaje'            => 'required'
     */
    public function rules(){
        return [
            'file'     =>'required|mimes:jpeg,bmp,png,pdf',
        ];
    }

}
