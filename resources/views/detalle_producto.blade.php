@extends('app')
@section('titulo')
	Producto
@endsection

@section('content')

	<div class="container">
		@if(Session::has('add'))
			<div class="card-panel teal lighten-2">
				<p>{{Session::get('add')}}</p>
			</div>
			{{Session::forget('add')}}
		@endif
		<div class="card-panel margintop">
			<div class="row valign-wrapper">
				<div class="col m5 offset-m1">
					<img class="avatar materialboxed hoverable" data-caption="Codigo: {{$itemCode}}"
						 width="350" height="350" src="http://www.ar.all.biz/img/ar/catalog/52062.jpeg">
				</div>
				<div class="col m5 flow-text">
					<p  class="center-align">
					<h3>{{$itemCode}}</h3>
					<h5>{{$itemName}}</h5>
					</p>
					<p>
					<h5>Disponibles: {{$stock}} piezas</h5>

						<h4>Precio: ${{$precio}} MX</h4>



					<div class="row">
						{!! Form::open(['route' => 'add', 'method' => 'GET'])!!}
						<input type="hidden" name="itemCode" value="{{ $itemCode }}">
						<div class="col m3 input-field ">
							<label>Cantidad:</label>
							{!!Form::input('number','micantidad','1', ['max' => $stock, 'min' => '1']) !!}
						</div>
						<div class="col m8 input-field ">
							<button type="submit"  class="waves-effect waves-light btn-large">
								<i class="left mdi-action-add-shopping-cart"></i>Agregar</button>
						</div>
						{!! Form::close() !!}
					</div>
					<p>
					<h5>Detalles</h5>
					<h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore doloremque
						expedita impedit in perferendis quia ratione rerum! Amet cupiditate deserunt
						dolore enim fugit labore optio placeat quas, ratione vero voluptate.</h6>
					</p>

				</div>
			</div>
		</div>
	</div>

@endsection


@section('scripts')
	<script>
		$(document).on('ready', function(){
			$("select").material_select();
		});
	</script>
@endsection