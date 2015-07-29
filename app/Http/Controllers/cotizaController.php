<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class cotizaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
/*
    producto ->  numero, precio cantidad
*/    
    /* 
        $wsdl = env('WSDL');
		$client = new \nusoap_client($wsdl, true);
		$idLogin = $client->call('Login');
		$ID = $idLogin['LoginResult']."";
    */		
    // El id debe ser el primer elemento del array		
	$productos = [
    ['producto' => ['id' => 'aaa', 'cantidad' => '10']],
    ['producto' => ['id' => 'bbb', 'cantidad' => '100']]
    ];
    // agregando otro producto 
    $productos[] = ['producto' => ['id' => 'ccc', 'cantidad' => '99']];		
	
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
    //echo $stringXML;			
    // Hacer la cotizacion
	$stringTest = $client->call('getCotizacion',array('SID' => $ID, 'Items' => $stringXML));
        
	print_r ($stringTest);
	
    echo('<br><pre>');
    print_r($productos);
    echo('</pre>');		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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
