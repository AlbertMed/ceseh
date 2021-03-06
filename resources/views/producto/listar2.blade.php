@extends('app')
@section('titulo')
	Listar: {{$cate}}
@endsection
@section('content')

	<br><br>
	<div class="row">
		<div class="cContainer">
			<div class="col s12 m9 l9">

				<div class="col s12 l12 m12">

					<div class="row">
						<div class="chip fontS">
							Categoria: {{$cate}}
						</div>
						<hr>
					</div>
					<div class="panel-heading">Productos &nbsp;Página - {{$articulos->currentPage()}} </div>
					<div class="row">
						@foreach ($articulos as $vende)
							<?php
							$data = utf8_decode($vende->ItemCode);
							$codes = preg_replace('/[^,\sA-Za-z0-9.-]/', '', $data);
							?>
							<div class="col s4 m6 l4">
								<div class="card small grey lighten-2 z-depth-5">
									<div class="card-image responsive-img">
										<img src="/../{{$vende->image_url}}" class="avatar materialboxed hoverable" data-caption="Codigo: {{$vende->ItemCode}}">
									</div>
									<div class="card-content">
										<p>{{$vende->ItemName}}</p>

										<p>{{$vende->ItemCode}}</p>
										<p><a href="{!! url('productos/'.$vende->Marca.'/datos/'.$codes) !!}">Ver
												Detalles</a></p>
									</div>
								</div>
							</div>
						@endforeach
					</div>
					<div class="row">
						<div class="text-center"> {!! $articulos->render() !!}</div>
					</div>
				</div>
			</div>
		</div><!-- no tocar este div -->

		<div class="col s6 m3 l3">
			<br><br><br>

			@include('includes.menu')

		</div><!-- no tocar este div -->
	</div>
@endsection			   