<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/test', function(){
	return view('auth.vistatest');
});
Route::get('/', 'ProductoController@index');


Route::get('home', 'ProductoController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('session',function(){
	$var = Session::get('UserId');
	echo "".$var;	
});

Route::get('home/contacto','HomeController@contacto');

Route::get('productos/{categoria}/datos/{valor}','ProductoController@datos');

Route::get('productos/{categoria}', 'ProductoController@listarProductos');

Route::get('busqueda/datos','ProductoController@busquedaProductos');

Route::post('home/info/enviar','ContactoController@create');


Route::get('/registro','testController@registro');



Route::group(['middleware' => 'auth'], function() {
	Route::get('/cotizacion', 'cotizaController@cotizador');

	Route::get('productos/carrito/items/{usuario}','CarritoController@itemsCarrito');

	Route::get('carrito', 'CarritoController@index');

	//Route::post('add/{itemCode}', 'CarritoController@add');

	Route::get('add', ['as' => 'add', 'uses' =>'CarritoController@add']);

	Route::get('home/perfil','UserController@getData');

	Route::get('deleteItem/{user}/{id}/{token}','CarritoController@delete');

	Route::get('updatecantidad/{id}/{val}','CarritoController@updatecantidad');

	Route::post('perfil','UserController@store');

	Route::post('pago','UserController@store_compra');

	Route::post('paymentCreditCard','ConektaController@payWithCreditCard');

	Route::post('Paypal', array(
		'as' => 'payments',
		'uses' => 'PaypalIController@postPayment',
	));

// this is after make the payment, PayPal redirect back to your site
	Route::get('payment/status', array(
		'as' => 'payment.status',
		'uses' => 'PaypalController@getPaymentStatus',
	));

	Route::get('original/route/{dato}/{id}', array(
		'as' => 'original.route',
		'uses' => 'PaypalController@post_Payment',
	));
});
Route::group(['middleware' => 'auth', 'prefix' => 'compra'], function()
{
	Route::get('check_info', 'CompraController@getPersonalInfo');
	Route::get('direcciones_usuario', 'CompraController@direcciones');
});
