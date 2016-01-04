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
				<div class="col m6 offset-m1">
					<img class="avatar materialboxed hoverable" data-caption="Codigo: {{$producto->ItemCode}}"
						 width="420" height="475" src="/../{{$producto->image_url}}">
				</div>
				<div class="col m5 flow-text offset-m1">

					<p style="font-size: 24pt; margin: 5% 0">{{$producto->ItemCode}}</p>
					<p style="font-size: 12pt; margin: -4.5% 0">{{$producto->ItemName}}</p>

					<p>
					<p style="font-size: 14pt; margin-top: 9%"><strong>Disponibles: {{$stock}} pzas</strong></p>
					<p style="font-size: 20pt; margin-top: 3%">Precio: ${{$precio}} MX</p>

					<div class="row" style="margin-top: 3%">
						{!! Form::open(['route' => 'add', 'method' => 'GET'])!!}
						<input type="hidden" name="itemCode" value="{{ $producto->ItemCode }}">
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
					<p style="font-size: 10pt">{{$producto->tipo}}</p>
					<p style="font-size: 10pt">
						@foreach($detalle as $det)
							{{$det->det1}}:  {{$det->det2}}<br>
						@endforeach
					</p>
					</p>
				</div>
			</div>
		</div>
		<div class="row">
			<hr>
			<div class="chip fontS">
				Productos Relacionados
			</div>

		</div>

		<div class="cContainer">
			<div class="col s12 m9 l9">
				<div class="col s12 l12 m12">
					<div class="row">
						@foreach ($relacionados as $relacion)
							<?php
							$data = utf8_decode($relacion->ItemCode);
							$codes = preg_replace('/[^,\sA-Za-z0-9.-]/', '', $data);
							?>
							<div class="col s4 m6 l3">
								<div class="card medium grey lighten-2 z-depth-5">
									<div class="card-image responsive-img">
										<img src="/../{{$relacion->image_url}}" class="avatar materialboxed hoverable" data-caption="Codigo: {{$relacion->ItemCode}}">
									</div>
									<div class="card-content">
										<p>{{$relacion->ItemName}}</p>

										<p>{{$relacion->ItemCode}}</p>
										<p><a href="{!! url('productos/'.$relacion->Marca.'/datos/'.$codes) !!}">Ver
												Detalles</a></p>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div><!-- no tocar este div -->

	</div>

@endsection


@section('scripts')
	<script>
		$(document).on('ready', function(){
			$("select").material_select();
		});
	</script>
@endsection