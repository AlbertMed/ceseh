<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Request;
use Session;
use DB;
use Auth;
use Input;
use App\Http\Controllers\Controller;
use App\Carrito;
use Bwords\Main as Sap;

class CarritoController extends Controller
{

public function __construct()
  {
    $this->middleware('auth');
  }
    public function add(){
        $micantidad = Input::get('micantidad');
        $itemCode = Input::get('itemCode');
         $ID = Session::get('UserId');
         $client = Session::get('Client');
        //$ID = Sap::getId();
        //$client = Sap::getClientSoap();

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


        $articulos =array(
            'ItemCode'=>$itemCode,
            'ItemName'=>$itemName,
            'cantidad'=>$micantidad,
            'precio'  =>$precio,
            'stock' => $stock,
            'cliente' =>(string)Auth::user()->email,
            'user_id' =>Auth::user()->id,
            );

        $carr = DB::table('carrito')->where('itemCode', $itemCode)->where('user_id', Auth::user()->id)->first();

        if ($carr) {
            $cant = $carr->cantidad;
            DB::table('carrito')
            ->where('itemCode', $itemCode)->where('user_id', Auth::user()->id)->update(['cantidad' => ((int)$cant + (int)Request::get('number')), 'stock' => $stock]);
        }else{
            Carrito::create($articulos);
        }

             $articulos = DB::table('carrito')->where('user_id', '=', Auth::user()->id)->get();
             $value = count($articulos);
             session(['cant' => $value]);

        Session::put('add',"Tu Producto ha sido Agregado al Carrito");
        return redirect()->back();
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
         $ID = Session::get('UserId');
         $client = Session::get('Client');
     //   $ID = Sap::getId();
   //     $client = Sap::getClientSoap();
     $CurrencyRate = $client->call('getCurrencyRate',array('tipo' => 'USD','SID' => $ID));
     $currency = $CurrencyRate['getCurrencyRateResult'];  
     $datos = DB::table('carrito')->where('user_id', Auth::user()->id)->get();

     foreach ($datos as $pro) {
        $ItemList = $client->call('GetDetalle',array('SID' => $ID , 'producto' => $pro->ItemCode));
        $productos = (string)$ItemList['GetDetalleResult'];
        $dat = utf8_encode($productos);

        // muestra que nos regresa sap 
        // * si manda erroren credenciales: revisar que credenciales guardadas en la Session
        //dd($dat); 
        
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
        DB::table('carrito')->where('user_id', '=', Auth::user()->id)
        ->where('ItemCode', '=', $pro->ItemCode)
        ->update(['precio' => $precio, 'stock' => $stock]);
    }

        $articulos = DB::table('carrito')
            ->Join('producto', 'carrito.ItemCode', '=', 'producto.ItemCode')
            ->where('carrito.user_id', '=',  Auth::user()->id)
            ->get();

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
        DB::table('carrito')->where('user_id', '=', Auth::user()->id)
            ->where('ItemCode', '=', $id)->delete();

        $articulos = DB::table('carrito')->where('user_id', '=', Auth::user()->id)->get();

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
