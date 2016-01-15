<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DirEntrega;
use App\DirFactura;
use App\groupCodes;
use App\estados;
use App\User;
use Auth;
use Session;
use DB;
use Illuminate\Http\Request;

class CompraController extends Controller {

	/**
	 * visualizar la informacion de direcciones de facturacion/envio
	 *
	 * @return Response
	 */
	public function direcciones()
	{
		return view('compra.direcciones');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getPersonalInfo()
	{
		if(Auth::user()->sapResultado != "") {
		$dirEntrega = DirEntrega::firstOrNew(['user_id' => Auth::user()->id]);
		$dirFactura = DirFactura::firstOrNew(['user_id' => Auth::user()->id]);
		$group      = groupCodes::all();
		$estados	= estados::all();
		$estado= DB::table('codesestados')
			->leftJoin('dirfacturacion',  'codesestados.code', '=','dirfacturacion.estado')
			->select('codesestados.value','codesestados.code')
			->where('dirfacturacion.user_id',Auth::user()->id)
			->get();
		$groupGiro = DB::table('groupcodes')
			->leftJoin('users',  'groupcodes.code', '=','users.grupoGiro')
			->select('groupcodes.value','groupcodes.code')
			->where('users.id',Auth::user()->id)
			->get();

		return view('compra.personalInfo')->with(compact('dirEntrega', 'dirFactura','group', 'estados','estado','groupGiro'));
	}else{
      return redirect('/edit_perfil');
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function getFormasPago()
	{
		return view('compra.fomasPago');
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
