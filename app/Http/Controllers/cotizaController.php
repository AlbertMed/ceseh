<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Carrito;
use Auth;
use Session;

class cotizaController extends Controller {
	public function __construct()
	{
		$this->middleware('auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function cotizador()
	{
		/** Primero:
		 *   Obtenemos los productos del carrito y se arma un array con todos los items
		**/
		$productos = [];
		$prods = Carrito::where('cliente', '=', (Auth::user()->email))->get();

		// El id debe ser el primer elemento del array
		$primer = true;
		foreach ($prods as $producto) {
			if ($primer == true) {
				$primer = false;
				$productos = [
					['producto' => ['id' => $producto->ItemCode, 'cantidad' => $producto->cantidad]]
				];
			}else{
				$productos[] = ['producto' => ['id' => $producto->ItemCode, 'cantidad' => $producto->cantidad]];
			}

		}
		//return var_dump($productos);
		/**
		 *   Se arma un Xml con todos lo items por que los arrays entre C# y php son incompatibles
		 */
		$xml = new \SimpleXMLElement('<root/>');
		// Leer datos del array e introducirlos al documento xml
		array_walk_recursive($productos, function($value, $key)use($xml){
			if ($key == 'id') {
				$Item = $xml->addChild('producto');
				$Item->addChild($key, $value);
			}else{
				$xml->producto[count($xml)-1]->addChild($key, $value);
			}
		});
		$stringXML = $xml->asXML();
		//return var_dump($stringXML);
		/**
		 *  Obtenemos el CardCode del usuario Lead y el ID de la session de SAP
		 **/
		$Cardcode = Auth::user()->sapResultado;

		$ID = Session::get('UserId');
		$client = Session::get('Client');
		//$ID = Sap::getId();

		/***  Hacer la cotizacion
		 *  Ademas necesitamos un Client de SAP para enviar el mensaje y elaborar la cotizacion en SAP
		 */
		$stringTest = $client->call('getCotizacion',array('CardCode' => $Cardcode, 'SID' => $ID, 'Items' => $stringXML));

		/**
		 * Se obtiene la respuesta => codigo de la cotizacion
		 */
		$idReport = (string)$stringTest['getCotizacionResult'];

		/**
		 * Se puede obtener la cotizacion y enviarla por email
		 */
		$email = $client->call('getDocCotz',array('idReport' => $idReport, 'user_email' => Auth::user()->email));
		//echo ($email);
		/**
		 * si la respuesta es igual a "enviado"  entonces el email ha sido enviado desde C#
		 */
		if ( strcmp(((string)$email['getDocCotzResult']) , "enviado") == 0) {
			Session::flash('mensaje', 'Hemos enviado la cotización a tu email');
		}else{
			return back()->withErrors(array('msg' => 'Ha ocurrido un error al procesar su solicitud'));
		}
		return back();

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
