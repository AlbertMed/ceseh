<?php namespace App\Http\Controllers;
use Session;
use App\Articulos;
use DB;
use Auth;
use Bwords\Main as Sap;
class HomeController extends Controller {
	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		 if (!Auth::guest()){ 
			if (!Session::has('UserId')) {			
			Session::put('UserId', Sap::getId());
			Session::put('Client', Sap::getClientSoap());
		
		    $usuario = Auth::user()->email;
            $articulos = DB::table('carrito')->where('cliente', '=', $usuario)->get();
            
            $cant = 0;
            foreach ($articulos as $art) {
           	$cant += $art->cantidad;
            }
            Session::put('cant',$cant);

          }
		}else{}
		
	}

     public function getS(){
     	 return DB::table('producto')->distinct()->select('SubMarca')->get();
     }


	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index(){
         
         //revisar cantidad de productos que se compraran
		 //primero debemos recorrer la tabla carrito
		//
		 //return var_dump(Session::get('cant'));
         $categoria = DB::table('producto')->distinct()->select('SubMarca')->get();
		 return view('inicio')->with('categorias',$categoria);
	}


}
	