<?php namespace App\Http\Controllers;
use Session;
use App\Articulos;
use DB;
use Auth;

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
		 $categoria = DB::table('producto')->distinct()->select('Marca')->where("ItemName","<>","''")->where('Marca','!=','NULL')->get();
        $vistos = DB::select('select * from producto order by visto desc limit 10');
        $vendidos = DB::select('select *from producto order by comprado desc limit 5');
      
        return view('inicio')->with(compact('vistos','vendidos','categoria'));
	}

	public function contacto(){
		$mensaje=null;
		$color="white";
		return view('datos.contacto')->with(compact('mensaje','color'));
	}


}
	