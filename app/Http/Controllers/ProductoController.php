<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Articulos;
use DB;

use Bwords\Main as Sap;
use Auth;
use Session;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(){

        $categoria = DB::table('producto')->distinct()->select('SubMarca')->get();


        return view('inicio')->with('categorias',$categoria);
    }

     /**
      * Display list of products
      * 
      * @return products
      */
     public function listarProductos($categoria){
        $articulos = Articulos::where('SubMarca', '=',$categoria)->paginate(12);

        return view('producto.listar2')->with('datos',$articulos);
    }

    /**
     * Display detall of a product selected
     * 
     * @return product
     */ 
    public function datos($categoria,$valor){
        
        $ID = null;
        $client = null;
        if (!Auth::guest()){ 
           $ID = Sap::getId();             
           $client = Sap::getClientSoap();
        }else{
           $ID = Session::get('UserId');
           $client = Session::get('Client');
        }
        
        $CurrencyRate = $client->call('getCurrencyRate',array('tipo' => 'USD','SID' => $ID));
        $currency = $CurrencyRate['getCurrencyRateResult'];                
        /*
         funcion para sacar el detalle de un producto 
         Session::put('UserId', Sap::getId());
            Session::put('Client',
         */
        $ItemList = $client->call('GetDetalle',array('SID' => $ID , 'producto' => $valor));
        $productos = (string)$ItemList['GetDetalleResult'];
        $datos = utf8_encode($productos);
        $BOM = new \SimpleXMLElement($datos);
        //datos a mostrar en la interfaz
        $itemName = $BOM->BO->Items->row->ItemName;
        $itemCode = $BOM->BO->Items->row->ItemCode;

        if ($BOM->BO->Items_Prices->row[0]->Currency=="MXP"){
            $numero = ($BOM->BO->Items_Prices->row[1]->Price); 
            $numero = number_format($numero,4,'.',''); 
            $precio = $numero; 
        }else{
            $number = (float)$BOM->BO->Items_Prices->row[1]->Price; 
            $number = number_format($number,4,'.','');  
            $numero = ($number)*$currency;    
            $numero = number_format($numero,4,'.','');  
            $precio = $numero; 
        }  

        $stock = $BOM->BO->Items->row->QuantityOnStock*1;



        return view('detalle_producto')->with(compact('itemName','itemCode','precio','stock'));
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
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
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
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
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
