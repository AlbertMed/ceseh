<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Request;
use Session;
use DB;
use Auth;
use App\Http\Controllers\Controller;
use App\Carrito;
use Bwords\Main as Sap;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
public function __construct()
  {
    $this->middleware('auth');
  }
    public function index()
    {

       // return view('carrito.home');
    }

    public function add($itemCode){
         if (Auth::guest()){ //no autenticado           
             return redirect('auth/login');
         }else{
          $ID = Session::get('UserId');
          $client = Session::get('Client');

          $CurrencyRate = $client->call('getCurrencyRate',array('tipo' => 'USD','SID' => $ID));
          $currency = $CurrencyRate['getCurrencyRateResult'];
         /*
           funcion para sacar el detalle de un producto 
         */
          $ItemList = $client->call('GetDetalle',array('SID' => $ID , 'producto' => $itemCode));
          $productos = (string)$ItemList['GetDetalleResult'];
          $datos = utf8_encode($productos);
          $BOM = new \SimpleXMLElement($datos);
        //datos a mostrar en la interfaz
          $itemName = (string)$BOM->BO->Items->row->ItemName;
          $itemCode = (string)$BOM->BO->Items->row->ItemCode;

          if ($BOM->BO->Items_Prices->row[0]->Currency=="MXP"){
            $numero = (float)($BOM->BO->Items_Prices->row[1]->Price);
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


        $articulos =array(
            'ItemCode'=>$itemCode,
            'ItemName'=>$itemName,
            'cantidad'=>(int)Request::get('number'),
            'precio'  =>$precio,
            'cliente' =>(string)Auth::user()->email,
            'status' =>1,
            'stock' => $stock
            );

        $carr = DB::table('carrito')->where('itemCode', $itemCode)->where('cliente', Auth::user()->email)->first();
        
        if ($carr) {            
            $cant = $carr->cantidad;            
            DB::table('carrito')
            ->where('itemCode', $itemCode)->where('cliente', Auth::user()->email)->update(['cantidad' => ((int)$cant + (int)Request::get('number')), 'stock' => $stock]);
        }else{
            Carrito::create($articulos);
        }

             $articulos = DB::table('carrito')->where('cliente', '=', Auth::user()->email)->get();

             $value = count($articulos);

             session(['cant' => $value]);


        return back();        
    }
}
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * show the items of the car
     * 
     * @return list of items
     */ 
    public function itemsCarrito($usuario){
        $ID = null;
        $client = null;
        if (!Auth::check()){
            $ID = Session::get('UserId');
            $client = Session::get('Client');
        }else{
            $ID = Sap::getId();
            $client = Sap::getClientSoap();
        }

     $CurrencyRate = $client->call('getCurrencyRate',array('tipo' => 'USD','SID' => $ID));
     $currency = $CurrencyRate['getCurrencyRateResult'];  
     $datos = DB::table('carrito')->where('cliente', '=', $usuario)->get();

     foreach ($datos as $pro) {
        $ItemList = $client->call('GetDetalle',array('SID' => $ID , 'producto' => $pro->ItemCode));
        $productos = (string)$ItemList['GetDetalleResult'];
        $dat = utf8_encode($productos);

        $BOM = new \SimpleXMLElement($dat);
        //datos a mostrar en la interfaz
        //$itemName = $BOM->BO->Items->row->ItemName;
        //$itemCode = $BOM->BO->Items->row->ItemCode;

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
        DB::table('carrito')->where('cliente', '=', $usuario)
        ->where('ItemCode', '=', $pro->ItemCode)
        ->update(['precio' => $precio, 'stock' => $stock]);
    }

        $articulos = DB::table('carrito')->where('cliente', '=', $usuario)->get();

        $value = count($articulos);

        session(['cant' => $value]);

        return view('carrito/carrito_items')->with('datos',$articulos);

           }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(){


    }

    /**
     * Delete one register of the cotitation
     * 
     * @return new view
     */ 
    public function delete($user,$id,$token){
        DB::table('carrito')->where('cliente', '=', $user)
            ->where('ItemCode', '=', $id)->delete();

        $articulos = DB::table('carrito')->where('cliente', '=', $user)->get();

        $value = count($articulos);

        //session(['cant' => $value]);
        Session::put('cant', $value);
        return view('carrito/carrito_items')->with('datos',$articulos);
   }

    /**
     * actualiza el valor de la cantidad del producto especificado
     *
     * @param  int  $id
     * @return Response
     */
    public function updatecantidad($id, $val)
    {
        $user = Auth::user()->email;

        $producto = DB::table('carrito')->where('cliente', '=', $user)
            ->where('ItemCode', '=', $id)->first();

        $newCant = ($producto->cantidad) + $val;

        if($newCant <= ($producto->stock)) {

            if ($newCant == 0) {
                DB::table('carrito')->where('cliente', '=', $user)
                    ->where('ItemCode', '=', $id)->delete();
            } else {
                DB::table('carrito')->where('cliente', '=', $user)
                    ->where('ItemCode', '=', $id)
                    ->update(['cantidad' => $newCant]);
            }

            $datos = DB::table('carrito')->where('cliente', '=', $user)->get();

            return view('carrito/carrito_items')->with('datos',$datos);

        }else{
            $datos = DB::table('carrito')->where('cliente', '=', $user)->get();

            return view('carrito/carrito_items')->with('datos',$datos)->withErrors(array('msg' => 'No hay otro en Stock'));
        }





  }
}
