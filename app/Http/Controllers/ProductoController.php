<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Request;

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

       $categoria = DB::table('producto')->distinct()->select('Marca')->where("ItemName","<>","''")->where('Marca','!=','NULL')->get();
        $vistos = DB::select('select * from producto order by visto desc limit 10');
        $vendidos = DB::select('select *from producto order by comprado desc limit 8');
      
        return view('inicio')->with(compact('vistos','vendidos','categoria'));


    }

     /**
      * Display list of products
      * 
      * @return products
      */
     public function listarProductos($categoria){
        $articulos = Articulos::where('Marca', 'like','%'.$categoria.'%')->paginate(12);
        $categoria = DB::table('producto')->distinct()->select('Marca')->where("ItemName","<>","''")->where('Marca','!=','NULL')->get();

        return view('producto.listar2')->with(compact('articulos','categoria'));
    }

    /**
     * Display detall of a product selected
     * 
     * @return product
     */ 
    public function datos($categoria,$valor){
        
        $ID = null;
        $client = null;
        if (Auth::check()){ 
          // $ID = Session::get('UserId'); Corregir para que estos datos se agregen cuando inicia sesion como cuando se registra
          // $client = Session::get('Client');
           $ID = Sap::getId();             
           $client = Sap::getClientSoap();
        }else{
           $ID = Sap::getId();             
           $client = Sap::getClientSoap();
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

        if ($BOM->BO->Items_Prices->row[1]->Currency=="MXP"){
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

     public function busquedaProductos(){
        $categoria = DB::table('producto')->distinct()->select('Marca')->where("ItemName","!=","''")->get();
        $dato = Request::get('search');
        $data= Articulos::where('ItemName', 'like', '%'.$dato.'%')->orWhere('Marca','like','%'.$dato.'%')->orWhere('ItemCode','like','%'.$dato.'%')->Paginate(12);
        return view('producto.busqueda')->with(compact('data','dato','categoria'));
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
