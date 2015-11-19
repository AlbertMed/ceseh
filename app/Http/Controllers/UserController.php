<?php namespace App\Http\Controllers;

use App\Http\Requests;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use Auth;
use Session;
use App\DirEntrega;
use App\DirFactura;
use App\User;
use App\groupCodes;
use App\estados;
use redirect;

class UserController extends Controller {

	public function getData(){
		$dirEntrega = DirEntrega::firstOrNew(['user_id' => Auth::user()->id]);
		$dirFactura = DirFactura::firstOrNew(['user_id' => Auth::user()->id]);
		$group      = groupCodes::all();
		$estados	= estados::all();
		$estado= DB::table('codesestados')
			->leftJoin('dirfacturacion',  'codesestados.code', '=','dirfacturacion.estado')
			->select('codesestados.value','codesestados.code')
			->where('dirfacturacion.user_id',Auth::user()->id)
			->get();
		$groupGiro = DB::table('groupcodes')
			->leftJoin('users',  'groupcodes.code', '=','users.grupoGiro')
			->select('groupcodes.value','groupcodes.code')
			->where('users.id',Auth::user()->id)
			->get();

		return view('datos.personalInfo')->with(compact('dirEntrega', 'dirFactura','group', 'estados','estado','groupGiro'));
	}


	public function store(CreateUserRequest $request){

		$result = $this->addToSap($request);

		if ((int)$result == 1){
			$mensaje = 'Datos actualizados con exito!';
			Session::flash('mensaje',$mensaje);
			return redirect()->back();
		}else{
			return back()->withErrors(array('msg' => 'Ha ocurrido un error al procesar su solicitud'));
		}
	}
  public function store_compra(CreateUserRequest $request){

	  $result = $this->addToSap($request);

	  if ((int)$result == 1){
		  return view('compra.formasPago');
	  }else{
		  //return view('compra.formasPago');
		  return back()->withErrors(array('msg' => 'Ha ocurrido un error al procesar su solicitud'));
	  }
  }
	public function addToSap($request){
		//datos de Compania
		$nombreEmpresa = $request->get('nombreEmpresa');
		$grupoGiro = $request->get('grupoGiro');
		$rfc = $request->get('rfc');

		//datos de usuario Contacto
		$nombre     = $request->get('nombre');
		$telefono   = $request->get('telefono');
		$apellido	= $request->get('apellido');
		$email   = Auth::user()->email;

		//datos de facturacion
		$fcalle     = $request->get('Fcalle');
		$fcolonia   = $request->get('Fcolonia');
		$fciudad    = $request->get('Fciudad');
		$fmunicipio = $request->get('Fmunicipio');
		$festado    = $request->get('Festado');
		$fcp        = $request->get('Fcp');
		$fnumero    = $request->get('Fnumero');
		$fpais      = "MX";

		if(isset($_POST['DentreI'])){
			$en_calle = $request->get('Fcalle');
			$en_colonia = $request->get('Fcolonia');
			$en_ciudad = $request->get('Fciudad');
			$en_municipio = $request->get('Fmunicipio');
			$en_estado = $request->get('Festado');
			$en_cp = $request->get('Fcp');
			$en_numero = $request->get('Fnumero');
			$en_pais = "MX";
		}else {
			$en_calle = $request->get('en_calle');
			$en_colonia = $request->get('en_colonia');
			$en_ciudad = $request->get('en_ciudad');
			$en_municipio = $request->get('en_municipio');
			$en_estado = $request->get('en_estado');
			$en_cp = $request->get('en_cp');
			$en_numero = $request->get('en_numero');
			$en_pais = "MX";
		}
		$businessP = (string) "<CardName>".$nombreEmpresa."</CardName>
            		<GroupCode>".$grupoGiro."</GroupCode>
            		<FederalTaxID>".$rfc."</FederalTaxID>
            		<ContactPerson>".$nombre."</ContactPerson>";

		$dirEnvio =	(string)"<Street>".$en_calle."</Street>
            		<Block>" . $en_colonia . "</Block>
            		<ZipCode>" . $en_cp. "</ZipCode>
            		<City>" . $en_ciudad . "</City>
            		<County>" . $en_municipio . "</County>
            		<Country>" . $en_pais . "</Country>
            		<State>" . $en_estado . "</State>
            		<StreetNo>" . $en_numero . "</StreetNo>";

		$dirFactura = (string)"<Street>". $fcalle ."</Street>
            		<Block>" . $fcolonia . "</Block>
            		<ZipCode>" . $fcp . "</ZipCode>
            		<City>" . $fciudad . "</City>
		            <County>" . $fmunicipio . "</County>
        		    <Country>" . $fpais . "</Country>
            		<State>" . $festado . "</State>
            		<StreetNo>". $fnumero ."</StreetNo>";

		$personaContacto = (string)"<Name>" . $nombre . "</Name>
            				<Phone1>" . $telefono . "</Phone1>
            				<E_Mail>" . $email . "</E_Mail>
            				<FirstName>" . $nombre . "</FirstName>
            				<LastName>". $apellido ."</LastName>";

		$ID = Session::get('UserId');
		$client = Session::get('Client');
		$carcode = Auth::user()->sapResultado;

		$result = $client->call('updateLeadtoCustomer',
			array('id' => $ID,
				'cardCodeLead' => $carcode,
				'businessP' => $businessP,
				'dirEnvio' => $dirEnvio,
				'dirFactura' => $dirFactura,
				'personaContacto' => $personaContacto));
//dd($result);

		$respuesta = (string)$result['updateLeadtoCustomerResult'];

	if (preg_match("/C\d+/", $respuesta)) {

		$user = User::find(Auth::user()->id);
		$user->nombre	= $nombre;
		$user->telefono	= $telefono;
		$user->apellido	= $apellido;
		$user->sapResultado = $respuesta;
		$user->RFC = $rfc;
		$user->grupoGiro = $grupoGiro;
		$user->nombreEmpresa = $nombreEmpresa;
		$user->save();

		$dirEntrega = DirEntrega::firstOrNew(['user_id' => Auth::user()->id]);
		$dirEntrega->calle		= $en_calle;
		$dirEntrega->colonia	= $en_colonia;
		$dirEntrega->ciudad   	= $en_ciudad;
		$dirEntrega->cp       	= $en_cp;
		$dirEntrega->municipio 	= $en_municipio;
		$dirEntrega->estado   	= $en_estado;
		$dirEntrega->pais    	= $en_pais;
		$dirEntrega->num_calle 	= $en_numero;
		$dirEntrega->save();

		$dirFactura = DirFactura::firstOrNew(['user_id' => Auth::user()->id]);
		$dirFactura->calle     = $fcalle;
		$dirFactura->colonia   = $fcolonia;
		$dirFactura->ciudad    = $fciudad;
		$dirFactura->cp        = $fcp;
		$dirFactura->municipio = $fmunicipio;
		$dirFactura->estado    = $festado;
		$dirFactura->pais      = $fpais;
		$dirFactura->num_calle = $fnumero;
		$dirFactura->save();
		return 1;
	}else {
       return 0;
	}

	}

}


