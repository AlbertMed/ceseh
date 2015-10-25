<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use Bwords\Main as Sap;
use Auth;
use Session;
use App\Entrega;
use App\User;

class UserController extends Controller {

	public function getData($token,$email){

    	$datos = DB::table('users')->where('email', '=', $email)->get();
    	$entrega = DB::table('datosentrega')->where('en_email_cli','=',$email)->get();

    	return view('datos.actualizar')->with(compact('datos','entrega'));
    }

    public function store(CreateUserRequest $request){
    	//datos de usuario
    	$nombre      = $request->get('nombre');
    	$apellido     = $request->get('apellido');
    	$telefono    = $request->get('telefono');
    	$email_cli   = $request->get('email_cli');
    	$nombreRazon = $request->get('nombreRazon');
    	$RFC         = $request->get('RFC');
    	$calle       = $request->get('calle');
    	$colonia     = $request->get('colonia');
    	$ciudad      = $request->get('ciudad');
    	$municipio   = $request->get('municipio');
    	$estado      = $request->get('estado');
    	$cp          = $request->get('cp');
    	$numero      = $request->get('numero');
    	//datos de entrega
    	$en_calle     = $request->get('en_calle');
    	$en_colonia   = $request->get('en_colonia');
    	$en_ciudad    = $request->get('en_ciudad');
    	$en_municipio = $request->get('en_municipio');
    	$en_estado    = $request->get('en_estado');
    	$en_cp        = $request->get('en_cp');
    	$en_numero    = $request->get('en_numero');

        $ID = Sap::getId();             
        $client = Sap::getClientSoap();
     
        $numsima = $client->call('getfinalCustomer',array('id' => $ID));
        $result1 = $numsima['getfinalCustomerResult'];
    	$email   = Auth::user()->email;
        $resultAddBP = $client->call('addBP',array(
        	                                  'SessionID'  => $ID,
		                                      'cardCode'   => $result1,
			                                  'nombre'     => $nombre,
			                                  'telefono'   => $telefono,
			                                  'email_cli'  => $email_cli,
			                                  'nombreRazon'=> $nombreRazon,
										      'RFC'        => $RFC,
											  'calle'      =>$calle,
											  'colonia'    =>$colonia,
											  'ciudad'     =>$ciudad,
											  'municipio'  =>$municipio,
											  'estado'     =>$estado,
											  'cp'         =>$cp,
                                              'numero'     =>$numero,
											  'en_calle'   =>$en_calle,
											  'en_colonia' =>$en_colonia,
											  'en_ciudad'  =>$en_ciudad,
											  'en_municipio'=>$en_municipio,
											  'en_estado'  =>$en_estado,
											  'en_cp'      =>$en_cp,
											  'en_numero'  =>$en_numero
			                                  )
                                    );

		$result = $resultAddBP['addBPResult'];

		DB::update('update users set nombre ='.'"'.$nombre.'"'.' where email = ?', [$email]);

        $datas=\DB::table('datosentrega')->select('datosentrega.*')->where('en_email_cli',$email)->first();
        if(is_null($datas)){
          $Dentrega=null;
        }else{
        $Dentrega = Entrega::find($datas->id);
         } 
       // dd($Dentrega);;
		if((count($Dentrega)==0) or (is_null($Dentrega))){
			$entrega = Entrega::create([
				'en_email_cli' => $email,
				'en_calle'     => $en_calle,
				'en_colonia'   => $en_colonia,
				'en_ciudad'    => $en_ciudad,
				'en_cp'        => $en_cp,
				'en_municipio' => $en_municipio,
				'en_estado'    => $en_estado,
				'en_numero'    => $en_numero
			]);
		}else{
			$data=array(
				'en_calle'     => $en_calle,
				'en_colonia'   => $en_colonia,
				'en_ciudad'    => $en_ciudad,
				'en_cp'        => $en_cp,
				'en_municipio' => $en_municipio,
				'en_estado'    => $en_estado,
				'en_numero'    => $en_numero
			);
			$Dentrega->fill($data);
			$Dentrega->save();
		}




    	return $result;
    }

}
