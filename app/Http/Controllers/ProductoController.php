<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Request;

use App\Http\Controllers\Controller;
use App\Articulos;
use DB;


use App\Busqueda;

use Bwords\Main as Sap;
use Auth;
use Session;
use App\Detalles;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(){

        $series = DB::select('select serie from producto where serie <>0  union select serie2 from producto where serie2 != ""');

        //dd($categoria);
        $vistos = DB::select('select * from producto order by visto desc limit 6');
        $vendidos = DB::select('select *from producto order by cotizado desc limit 3');
        $name = DB::table('producto')->distinct()->select('ItemName')->get();
        $categoria = DB::table('producto')->distinct()->select('Marca')->get();

        return view('inicio')->with(compact('vistos','vendidos','categoria','series','name'));


    }

     /**
      * Display list of products
      * 
      * @return products
      */
     public function listarProductos($categorias){
         if(preg_match("/CPI/i", $categorias)){
             $articulos = Articulos::where('serie2',$categorias)->paginate(12);
         }else{
             $articulos = Articulos::where('Marca',$categorias)->orWhere('ItemName',$categorias)->orWhere('serie',$categorias)->paginate(12);
         }

         //dd($articulos);
         $categoria = DB::table('producto')->distinct()->select('Marca')->get();
         $series = DB::select('select serie from producto where serie <>0  union select serie2 from producto where serie2 != ""');
         $name = DB::table('producto')->distinct()->select('ItemName')->get();

         $cate = $categorias;
         return view('producto.listar2')->with(compact('articulos','categoria','series','name','cate'));
    }

    /**
     * Display detall of a product selected
     * 
     * @return product
     */ 
    public function datos($categoria,$valor){
        $producto = Articulos::firstOrNew(['ItemCode' => $valor]);
        $detalle = Detalles::where('ItemCode',$valor)->get();
        $relacionados = DB::select('select * from producto where visto !=0 ORDER BY rand() limit 3');
        $ID = null;
        $client = null;
        if (Auth::check()){ 
          $ID = Session::get('UserId');
           $client = Session::get('Client');
          // $ID = Sap::getId();
          ////$client = Sap::getClientSoap();
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

        if ($BOM->BO->Items_Prices->row[1]->Currency=="MXP"){
            $numero = ($BOM->BO->Items_Prices->row[1]->Price); 
            $numero = number_format($numero,2,'.',',');
            $precio = $numero; 
        }else{
            $number = (float)$BOM->BO->Items_Prices->row[1]->Price; 
            $number = number_format($number,2,'.',',');
            $numero = ($number)*$currency;
            $numero = number_format($numero,2,'.',',');
            $precio = $numero; 
        }  

        $stock = $BOM->BO->Items->row->QuantityOnStock*1;



        return view('detalle_producto')->with(compact('precio','stock','producto','detalle','relacionados'));
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
         $series = DB::table('producto')->distinct()->select('serie')->get();
         $name = DB::table('producto')->distinct()->select('ItemName')->get();
         $categoria = DB::table('producto')->distinct()->select('Marca')->get();
         $dato = Request::get('search');
         $data= Articulos::where('ItemName', 'like', '%'.$dato.'%')->orWhere('Marca','like','%'.$dato.'%')->orWhere('ItemCode','like','%'.$dato.'%')->orWhere('serie',$dato)->orWhere('serie2',$dato)->Paginate(12);
         if (Auth::guest()){
             $busqueda=array(
                 'busqueda'=> $dato,
                 'nombre'  => 'null',
                 'email'   => 'null'
             );
             Busqueda::create($busqueda);
         }else{
             $busqueda=array(
                 'busqueda' =>$dato,
                 'nombre'   => Auth::user()->nombre,
                 'email'    => Auth::user()->email
             );
             Busqueda::create($busqueda);
         }
         return view('producto.busqueda')->with(compact('data','dato','categoria','series','name'));
     }




}
