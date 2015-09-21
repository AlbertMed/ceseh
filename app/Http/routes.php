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
Route::get('login', function(){
	return view('auth.login');
});
Route::get('register', function(){
	return view('auth.register');
});

Route::get('password', function(){
    return view('auth.password');
});

Route::get('/', 'ProductoController@index');

Route::get('/cotizacion', 'cotizaController@cotizador');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('session',function(){
	$productosCarrito = Session::get('productosCarrito'); 
    echo '<pre>';
	print_r($productosCarrito);
	echo '</pre>';
});

Route::get('productos/carrito/items/{usuario}','CarritoController@itemsCarrito');

Route::get('productos/{categoria}/datos/{valor}','ProductoController@datos');

Route::get('productos/{categoria}', 'ProductoController@listarProductos');

Route::get('carrito', 'CarritoController@index');

Route::post('add/{itemCode}', 'CarritoController@add');

Route::get('deleteItem/{user}/{id}/{token}','CarritoController@delete');