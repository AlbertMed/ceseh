<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Request;
use Session;
use DB;
use Auth;
use App\Http\Controllers\Controller;
use App\Carrito;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        
        return view('carrito.home');
    }

    public function add($itemCode){
         if (Auth::guest()){ //no autenticado           
           return redirect('auth/login');
        }else{
             $wsdl = "http://187.188.85.203:8036/Sample.asmx?WSDL";
        $client = new \nusoap_client($wsdl, true);
        $idLogin = $client->call('Login');
        $ID = $idLogin['LoginResult']."";
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
            $numero = ($BOM->BO->Items_Prices->row[1]->Price); 
            $numero = number_format($numero,4,'.',''); 
            $precio = $numero; 
        }else{
            $number = (float)$BOM->BO->Items_Prices->row[1]->Price; 
            $number = number_format($number,4,'.','');  
            $numero = ($number)*16.269951;    
            $numero = number_format($numero,4,'.','');  
            $precio = $numero; 
        }  

        $stock = $BOM->BO->Items->row->QuantityOnStock*1;

         
        $articulos =array(
                'ItemCode'=>$itemCode,
                'ItemName'=>$itemName,
                'cantidad'=>1,
                'precio'  =>$precio,
                'cliente' =>(string)Auth::user()->email,
                'status'  =>1
            );
         Carrito::create($articulos);

          if (Session::has('productosCarrito'))
            {
               $productosCarrito = Session::get('productosCarrito'); 
               $arrayCodes = array_pluck($productosCarrito, 'id');
                         
                    $productosCarrito[] = ['producto' => ['id' => $itemCode, 'cantidad' => Request::get('number')]];
                    Session::put('productosCarrito',$productosCarrito);                                                            
            }else{

               $productosCarrito = [
                             ['producto' => ['id' => $itemCode, 
                                             'cantidad' => Request::get('number')]]   
               ];

               Session::put('productosCarrito', $productosCarrito);
            }

            return back()->withInput();
            
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
    public function items($token,$usuario){

        $articulos = DB::table('carrito')->where('cliente', '=', $usuario)->get();
        
         //return $articulos;
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
        //return $articulos;
        return view('carrito/carrito_items')->with('datos',$articulos);
        //return back()->withInput();
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
