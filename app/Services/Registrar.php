<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;
use Bwords\Main as Sap;
use Session;
use Request;
use Mail;
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
			'name' 			=> 'required|max:255',
			'apellido' 		=> 'required',
			'telefono' 		=> 'required|numeric',
			'email' 		=> 'required|email|max:255|unique:users',
			'password' 		=> 'required|confirmed|min:6',
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
		$nombreEmpresa	= $data['email'];
		$name			= $data['name'];
		$apellido 		= $data['apellido'];
		$telefono 		= $data['telefono'];
		$email    		= $data['email'];

		$ID = Sap::getId();
		$client = Sap::getClientSoap();

        //'name' => $nombreEmpresa
		$result = $client->call('AddLead',array('id' => $ID , 'name'=> $nombreEmpresa, 'tel' => $telefono, 'email' => $email, 'nombreUsuario' => $name, 'apellido' => $apellido));

		$sapResult =(string)$result['AddLeadResult'];
        //dd($sapResult);
		//if (preg_match("/L\d+/", $sapResult)) {
			$user = User::create([
				//'nombreEmpresa'=> $nombreEmpresa,
				'nombre'       => $name,
				'Apellido'     => $apellido,
				'email'        => $email,
				'telefono'     => $telefono,
				'password'     => bcrypt($data['password']),

			]);

			$user->sapResultado = $sapResult;
			$user->save();
			return $user;
		//}else{
		//	return back()->withErrors(array('msg' => 'Ha ocurrido un error al procesar su solicitud'));
		//}



	}

}
