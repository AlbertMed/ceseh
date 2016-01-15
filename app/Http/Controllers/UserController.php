<?php namespace App\Http\Controllers;

use App\Http\Requests;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\RegistroRequest;
use Auth;
use Session;
use App\DirEntrega;
use App\DirFactura;
use App\User;
use App\groupCodes;
use App\estados;
use redirect;
use Mail;
use Bwords\Main as Sap;
class UserController extends Controller {

	public function active($email){

		$affectedRows = User::where('email', $email)->update(['active' => 'A']);

		if($affectedRows){
			return view('auth.activada');
		}
	}
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
   public function  showPerfil(){
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

	   return view('datos.actualizar')->with(compact('dirEntrega', 'dirFactura','group', 'estados','estado','groupGiro'));
   }

	public function store(CreateUserRequest $request){

		$result = $this->addToSap($request,true);

		if ((int)$result == 1){
			$mensaje = 'Datos actualizados con exito!';
			Session::flash('mensaje',$mensaje);
			return redirect('/home/perfil');
		}else{
			return back()->withErrors(array('msg' => 'Ha ocurrido un error al procesar su solicitud'));
		}
	}
	public function storecompra(CreateUserRequest $request){
		if(Auth::user()->sapResultado != '') {
		$result = $this->addToSap($request,true);

		if ((int)$result == 1){
			$mensaje = 'Datos actualizados con exito!';
			Session::flash('mensaje',$mensaje);
			return redirect('/compra/check_info');
		}else{
			return back()->withErrors(array('msg' => 'Ha ocurrido un error al procesar su solicitud'));
		}
		}else{
			return redirect('/edit_perfil');
		}
	}
  public function store_compra(Request $request){
      if(Auth::user()->sapResultado != '') {
		  $result = $this->addToSap($request, false);
		  $referencia = User::firstOrNew(['email' => Auth::user()->email]);

		  if ((int)$result == 1) {
			  return view('compra.formasPago')->with(compact('referencia'));
		  } else {
			  //return view('compra.formasPago')->with(compact('referencia'));
			  return back()->withErrors(array('msg' => 'Ha ocurrido un error al procesar su solicitud'));
		  }
	  }else{
		  return redirect('/edit_perfil');
	  }
  }
	public function addToSap($request, $datos){
   try {
	   if ((boolean)$datos == true) {
		   //datos de Compania
		   $nombreEmpresa = $request->get('nombreEmpresa');
		   $grupoGiro = $request->get('grupoGiro');
		   $rfc = $request->get('rfc');

		   //datos de usuario Contacto
		   $nombre = $request->get('nombre');
		   $telefonoc = $request->get('num_telefono');

		   $apellido = $request->get('apellido');
		   $email = Auth::user()->email;

		   //datos de facturacion
		   $fcalle = $request->get('Fcalle');
		   $fcolonia = $request->get('Fcolonia');
		   $fciudad = $request->get('Fciudad');
		   $fmunicipio = $request->get('Fmunicipio');
		   $festado = $request->get('Festado');
		   $fcp = $request->get('Fcp');
		   $fnumero = $request->get('Fnumero');
		   $fpais = "MX";

		   if (isset($_POST['DentreI'])) { // si esta marcada la casilla tomar los mismos datos
			   $en_calle = $request->get('Fcalle');
			   $en_colonia = $request->get('Fcolonia');
			   $en_ciudad = $request->get('Fciudad');
			   $en_municipio = $request->get('Fmunicipio');
			   $en_estado = $request->get('Festado');
			   $en_cp = $request->get('Fcp');
			   $en_numero = $request->get('Fnumero');
			   $en_pais = "MX";
		   } else { // si NO esta marcada
			   $en_calle = $request->get('en_calle');
			   $en_colonia = $request->get('en_colonia');
			   $en_ciudad = $request->get('en_ciudad');
			   $en_municipio = $request->get('en_municipio');
			   $en_estado = $request->get('en_estado');
			   $en_cp = $request->get('en_cp');
			   $en_numero = $request->get('en_numero');
			   $en_pais = "MX";
		   }


		   $businessP = (string)"<CardName>" . $nombreEmpresa . "</CardName>
            		<GroupCode>" . $grupoGiro . "</GroupCode>
            		<FederalTaxID>" . $rfc . "</FederalTaxID>
            		<ContactPerson>" . $nombre . "</ContactPerson>";

		   $dirEnvio = (string)"<Street>" . $en_calle . "</Street>
            		<Block>" . $en_colonia . "</Block>
            		<ZipCode>" . $en_cp . "</ZipCode>
            		<City>" . $en_ciudad . "</City>
            		<County>" . $en_municipio . "</County>
            		<Country>" . $en_pais . "</Country>
            		<State>" . $en_estado . "</State>
            		<StreetNo>" . $en_numero . "</StreetNo>";

		   $dirFactura = (string)"<Street>" . $fcalle . "</Street>
            		<Block>" . $fcolonia . "</Block>
            		<ZipCode>" . $fcp . "</ZipCode>
            		<City>" . $fciudad . "</City>
		            <County>" . $fmunicipio . "</County>
        		    <Country>" . $fpais . "</Country>
            		<State>" . $festado . "</State>
            		<StreetNo>" . $fnumero . "</StreetNo>";

		   $personaContacto = (string)"<Name>" . $nombre . "</Name>
            				<Phone1>" . $telefonoc . "</Phone1>
            				<E_Mail>" . $email . "</E_Mail>
            				<FirstName>" . $nombre . "</FirstName>
            				<LastName>" . $apellido . "</LastName>";

		   $ID = Session::get('UserId');
		   $client = Session::get('Client');
		   //$ID = Sap::getId();
		   //$client = Sap::getClientSoap();
		   $carcode = Auth::user()->sapResultado;

		   $result = $client->call('updateLeadtoCustomer',
			   array('id' => $ID,
				   'cardCodeLead' => $carcode,
				   'businessP' => $businessP,
				   'dirEnvio' => $dirEnvio,
				   'dirFactura' => $dirFactura,
				   'personaContacto' => $personaContacto));


		   $respuesta = (string)$result['updateLeadtoCustomerResult'];
		   //dd($respuesta);

		   if (preg_match("/C\d+/", $respuesta)) {

			   $user = User::firstOrNew(['id' => Auth::user()->id]);
			   $user->nombre = $nombre;
			   $user->telefono = $telefonoc;
			   $user->apellido = $apellido;
			   $user->sapResultado = $respuesta;
			   $user->RFC = $rfc;
			   $user->grupoGiro = $grupoGiro;
			   $user->nombreEmpresa = $nombreEmpresa;
			   $user->save();

			   $dirEntrega = DirEntrega::firstOrNew(['user_id' => Auth::user()->id]);
			   $dirEntrega->calle = $en_calle;
			   $dirEntrega->colonia = $en_colonia;
			   $dirEntrega->ciudad = $en_ciudad;
			   $dirEntrega->cp = $en_cp;
			   $dirEntrega->municipio = $en_municipio;
			   $dirEntrega->estado = $en_estado;
			   $dirEntrega->pais = $en_pais;
			   $dirEntrega->num_calle = $en_numero;
			   $dirEntrega->save();

			   $dirFactura = DirFactura::firstOrNew(['user_id' => Auth::user()->id]);
			   $dirFactura->calle = $fcalle;
			   $dirFactura->colonia = $fcolonia;
			   $dirFactura->ciudad = $fciudad;
			   $dirFactura->cp = $fcp;
			   $dirFactura->municipio = $fmunicipio;
			   $dirFactura->estado = $festado;
			   $dirFactura->pais = $fpais;
			   $dirFactura->num_calle = $fnumero;
			   $dirFactura->save();
		   }
	   } else {

		   //si los datos no son editados en la vista check_info

	   }


	   return 1;

   }catch (Exception $e)
   {
	   return 0;
   }

	}

	public function info(){
		if(Auth::user()->sapResultado != '') {
			return redirect('/compra/check_info');
		}else{
			return redirect('/edit_perfil');
		}

}

}


