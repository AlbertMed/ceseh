<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Bwords\Main as Sap;
use Illuminate\Http\Request;

class cotizaController extends Controller {

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
	public function create()
	{
		 /*
          Descripcion: necesita obtener de la variable session
          - CardCode de Usuario
          - Email
          - Items que seleccionó
         */    
       
    // El id debe ser el primer elemento del array		
	$productos = [
    ['producto' => ['id' => '150-105', 'cantidad' => '3']],
    ['producto' => ['id' => '112178', 'cantidad' => '5']]
    ];
    $Cardcode = "L00144";
    // agregando otro producto *******************************************************
    //$productos[] = ['producto' => ['id' => 'ccc', 'cantidad' => '99']];		
	
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
    $ID = Sap::getId();
    $email = "luis@gmail.com";
    $stringTest = Sap::getClientSoap()->call('getCotizacion',array('CardCode' => $Cardcode, 'SID' => $ID, 'Items' => $stringXML, 'email' => $email));
    
    echo "resultado: ".$stringTest['getCotizacionResult'];        
	//print_r ($stringTest);
	
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
