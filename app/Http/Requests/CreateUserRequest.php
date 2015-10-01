<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateUserRequest extends Request
{
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
            'telefono'    =>'required',
            'cp'          =>'required',
            'RFC'         =>'required',
            'nombreRazon' =>'required',
            'email_cli'   =>'required|unique:users,email_cli',
            'calle'       =>'required',
            'colonia'     =>'required',
            'ciudad'      =>'required',
            'municipio'   =>'required',
            'estado'      =>'required',
            'numero'      =>'required',
            'en_calle'       =>'required',
            'en_colonia'     =>'required',
            'en_ciudad'      =>'required',
            'en_municipio'   =>'required',
            'en_estado'      =>'required',
            'en_cp'          =>'required',
            'en_numero'      =>'required'
        ];
    }
}
