<?php namespace App\Http\Controllers;
use Session;
use App\Articulos;
use DB;
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
		//$this->middleware('guest');
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
           
         $categoria = DB::table('producto')->distinct()->select('SubMarca')->get();


		return view('home')->with('categorias',$categoria);
	}


}
	