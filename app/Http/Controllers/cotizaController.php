<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Bwords\Main as Sap;
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
		 /*
          Descripcion: necesita obtener de la variable session
          - CardCode de Usuario
          - Email
          - Items que seleccionó
         */ 
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
	
    //Session::get('productosCarrito');
    $Cardcode = Auth::user()->sapResultado;
     //return var_dump($Cardcode);
    //return var_dump($productos);
    	
	// Hacer xml	
	
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
    //echo $stringXML;			
    // Hacer la cotizacion
    $ID = Sap::getId();

   
    
    $stringTest = Sap::getClientSoap()->call('getCotizacion',array('CardCode' => $Cardcode, 'SID' => $ID, 'Items' => $stringXML));
   
   $idReport = (string)$stringTest['getCotizacionResult'];  
 
   $email = Sap::getClientSoap()->call('getDocCotz',array('idReport' => $idReport, 'user_email' => Auth::user()->email));
   //echo ($email);

	if ( strcmp(((string)$email['getDocCotzResult']) , "enviado") == 0) {
			 	Session::flash('mensaje', 'Hemos enviado la cotización a tu email');
			 }else{
			 	Session::flash('mensaje', 'Algo ha salido mal...');
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
