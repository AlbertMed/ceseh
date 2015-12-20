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
						 width="350" height="475" src="http://www.ar.all.biz/img/ar/catalog/52062.jpeg">
				</div>
				<div class="col m5 flow-text offset-m1">

					<p style="font-size: 24pt; margin: 5% 0">{{$itemCode}}</p>
					<p style="font-size: 12pt; margin: -4.5% 0">{{$itemName}}</p>

					<p>
					<p style="font-size: 14pt; margin-top: 9%"><strong>Disponibles: {{$stock}} pzas</strong></p>
					<p style="font-size: 20pt; margin-top: 3%">Precio: ${{$precio}} MX</p>

					<div class="row" style="margin-top: 3%">
						{!! Form::open(['route' => 'add', 'method' => 'GET'])!!}
						<input type="hidden" name="itemCode" value="{{ $itemCode }}">
						<div class="col m3 input-field ">
							<label>Cantidad:</label>
							{!!Form::input('number','micantidad','1', ['max' => $stock, 'min' => '1']) !!}
						</div>
						<div class="col m8 input-field ">
							<button type="submit"  class="waves-effect waves-light btn" style="font-size: 16pt">
								<i class="left mdi-action-add-shopping-cart"></i>Agregar</button>
						</div>
						{!! Form::close() !!}
					</div>
					<p >
					<p style="font-size: 12pt">Descripción</p>
					<p style="font-size: 10pt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore doloremque
						expedita impedit in perferendis quia ratione rerum! Amet cupiditate deserunt
						dolore enim fugit labore optio placeat quas, ratione vero voluptate.</p>
					</p>

				</div>
			</div>
		</div>
			<ul class="nav nav-tabs">
				<li class="active"><a href="#">Productos Relacionados</a></li>

			</ul>
	</div>

@endsection


@section('scripts')
	<script>
		$(document).on('ready', function(){
			$("select").material_select();
		});
	</script>
@endsection