@extends('app')
 @section('titulo')
		  Carrito
	@endsection
	@section('content')
	<br><br>
	<div class="row">
		<div class="col s12 m4 l2">-</div>
	    <div class="col s12 m4 l8">
	   
	    	<table class="hoverable striped">
			        <thead>
			          <tr>
			              <th data-field="nombre">Nombre</th>
			              <th data-field="codigo">Código</th>
			              <th data-field="cantidad">Cantidad</th>
			              <th data-field="price">Precio</th>
			          </tr>
			        </thead>

			        <tbody>
			        @foreach($datos as $dato)
			          <tr>
			            <td>{{$dato->ItemName}}</td>
			            <td>{{$dato->ItemCode}}</td>
			            <td>{{$dato->cantidad}}</td>
			            <td>{{$dato->precio}}</td>
			            <td> 
			                <div class="col s12">
				               <p><a href="{!! url('deleteItem/'.Auth::user()->email.'/'.$dato->ItemCode.'/'.csrf_token()) !!}" class="btn btn-block btn-primary btn-xs glyphicon glyphicon-shopping-cart col s4" role="button"><i class="material-icons left">not_interested</i></a></p>
			                </div>
			            </td>
			          </tr>
			        @endforeach  
			        </tbody>
			    </table>
			    <div class="col s6">
					<br><br>
				    <p><a onclick="Materialize.toast('Estamos Ahora haciendo su Cotización', 4000, 'rounded')" href="{!! url('/cotizacion') !!}" class="btn btn-primary btn-large glyphicon glyphicon-shopping-cart col s8" role="button"><i class="material-icons left">assignment</i>Enviarme Cotización</a></p>
			    </div>
	    </div>
	    <div class="col s12 m4 l2">-</div>
    </div>
@endsection

@section('scripts')
  @if (Session::has('mensaje'))
            <script>Materialize.toast("<?php echo Session::get('mensaje')?>", 4000, 'rounded')</script>
         @endif

@endsection