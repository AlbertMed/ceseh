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


//Route::get('/test', function(){
//	return view('auth.vistatest');
//});

Route::get('/', 'ProductoController@index');

//
Route::get('/historia', function(){
	return view('cesehsa.historia');
});

Route::get('/facturas', function(){
	return view('cesehsa.facturas');
});

Route::get('/contactanos', 'HomeController@contacto');

Route::get('/politicas', function(){
	return view('cesehsa.politicas');
});

Route::get('/como_comprar', function(){
	return view('cesehsa.comocomprar');
});

Route::get('/mayoreo', function(){
	return view('cesehsa.mayoreo');
});
//

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

Route::get('productos/Serie/{categoria}', 'ProductoController@listarProductos');

Route::get('productos/Marca/{categoria}', 'ProductoController@listarProductos');

Route::get('productos/Nombre/{categoria}', 'ProductoController@listarProductos');

Route::get('busqueda/datos','ProductoController@busquedaProductos');

//Route::get('/comprobante','ContactoController@index');

Route::post('home/info/enviar','ContactoController@create');

Route::post('home/info/enviar_comprobante','ContactoController@comprobanteDeposito');

Route::get('/registro','testController@registro');



Route::group(['middleware' => 'auth'], function() {

	Route::get('home/perfil','UserController@showPerfil');
	Route::get('edit_perfil', 'UserController@getData');
	Route::post('perfil','UserController@store');
	Route::post('perfil_compra','UserController@storecompra');

	Route::get('/cotizacion', 'cotizaController@cotizador');

	Route::get('productos/carrito/items/{usuario}','CarritoController@itemsCarrito');

	Route::get('carrito', 'CarritoController@index');

	//Route::post('add/{itemCode}', 'CarritoController@add');

	Route::get('add', ['as' => 'add', 'uses' =>'CarritoController@add']);

	Route::get('deleteItem/{user}/{id}/{token}','CarritoController@delete');

	Route::get('updatecantidad/{id}/{val}','CarritoController@updatecantidad');

	Route::get('pago','UserController@store_compra');

	Route::get('info','UserController@info');


	Route::post('carrito/pay/creditCard/{user}/={token}','ConektaController@pay');

	Route::post('carrito/pay/PayPal/{user}/={token}','PaypalController@pay');

	Route::get('payment/status',array(
		'as'   => 'payment.status',
		'uses' => 'PaypalController@getPaymentStatus'
	));


	Route::get('carrito/pay/PayPal/Response/failed/{token}',array(
		'as'   => 'carrito.failed',
		'uses' => 'PaypalController@postPaymentF'
	));

	Route::get('carrito/pay/PayPal/Response/success/{id}/{token}',array(
		'as'   => 'carrito.success',
		'uses' => 'PaypalController@postPayment'
	));
});
Route::group(['middleware' => 'auth', 'prefix' => 'compra'], function()
{
	Route::get('check_info', 'CompraController@getPersonalInfo');
	Route::get('direcciones_usuario', 'CompraController@direcciones');
});

Route::get('registrado/{email}', 'UserController@active');