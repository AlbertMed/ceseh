<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

use Session;
use Request;
class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{

        $wsdl = "http://187.188.85.203:8036/Sample.asmx?WSDL";
        $client = new \nusoap_client($wsdl, true);
        
        $name     = $data['name'];        
		$telefono = $data['telefono'];
		$email    = $data['email'];
		$direccion= $data['direccion'];
		$cp       = $data['cp'];
	
		
        $idLogin = $client->call('Login');

        $ID = $idLogin['LoginResult'];
        $numsima = $client->call('getfinalLead',array('id' => $ID));
        $result1 = $numsima['getfinalLeadResult'];
        $numLead = $client->call('SumLead',array('Lead'=>$result1));
        $result2 = $numLead['SumLeadResult'];
		
		$resultAddBP = $client->call('AddLead',array('id' => $ID,
		                                      'cardCode'  => $result2,			                                 
			                                  'name'      => $name, 			                                
			                                  'tel'       => $telefono,
			                                  'email'     => $email));
		
		$sapresult = $resultAddBP['AddLeadResult'];
     
      Session::put('numberItems', 0);
     $user = User::create([
			'nombre'       => $name,
			'email'        => $email,
			'telefono'     => $telefono,
			'direccion'    => $direccion,
			'cp'           => $cp,
			'password'     => bcrypt($data['password']),			
		]); 

		$user->sapResultado = $sapresult;
            $user->save();
		return $user;        
	}

}
