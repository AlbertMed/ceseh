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

        if(Request::has('DentreI')){
            return [
                'nombre'      =>'required',
                'telefono'    =>'required|integer',
                'Fcalle'      => 'required',
                'Fcolonia'    => 'required',
                'grupoGiro'   => 'required',
                'Fciudad'     => 'required',
                'Fmunicipio'  => 'required',
                'Festado'     => 'required',
                'Fcp'         => 'required|size:5',
                'Fnumero'     => 'required|integer',

            ];
        }else{
            return [
                'nombre'      =>'required',
                'telefono'    =>'required|integer',
                'Fcalle'      => 'required',
                'Fcolonia'    => 'required',
                'grupoGiro'   => 'required',
                'Fciudad'     => 'required',
                'Fmunicipio'  => 'required',
                'Festado'     => 'required',
                'Fcp'         => 'required|size:5',
                'Fnumero'     => 'required|integer',
                'en_calle'       =>'required',
                'en_colonia'     =>'required',
                'en_ciudad'      =>'required',
                'en_municipio'   =>'required',
                'en_estado'      =>'required',
                'en_cp'          =>'required|size:5',
                'en_numero'      =>'required|integer',
            ];

        }
    }
}
