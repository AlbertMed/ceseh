<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()	{
		Schema::table('users', function(Blueprint $table){
            $table->string('RFC');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down(){
		Schema::table('users', function(Blueprint $table){
            $table->dropColumn('RFC');
        });
	
	}

	public function store(CreateUserRequest $request){
    	//datos de usuario
    	$nombre      = $request->get('nombre');
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

        $wsdl    = "http://187.188.85.203:8036/Sample.asmx?WSDL";
        $client  = new \nusoap_client($wsdl, true);
        $idLogin = $client->call('Login');
        $ID      = $idLogin['LoginResult']."";
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

        $Dentrega = Entrega::find($datas->id);
       // dd($Dentrega);;
		if(count($Dentrega)==0){
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
