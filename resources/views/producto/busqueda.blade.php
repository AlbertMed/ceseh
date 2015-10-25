@extends('app')
@section('titulo')
  Busqueda
@endsection
@section('content')

	<div class="row">

		<div class="col s12 m4 l3"> <!-- Note that "m4 l3" was added -->
			<!-- Grey navigation panel
              This content will be:
              3-columns-wide on large screens,
              4-columns-wide on medium screens,
              12-columns-wide on small screens  -->
			<br><br><br>
			<div>
				<ul class="collapsible" data-collapsible="accordion">
					<li>
						<div class="collapsible-header active"><i class="material-icons"></i>Marcas</div>
						<div class="collapsible-body">

							<ul class="collection">
								<?php $array_C = array_slice($categoria,0,10); ?>
								@foreach($array_C as $categorias)
									<a href="{!! url('productos/'.$categorias->Marca) !!}" class="collection-item">{{$categorias->Marca}}<span class="badge">></span></a>
								@endforeach
							</ul>

						</div>
					</li>
					<li>
						<div class="collapsible-header"><i class="material-icons"></i>Más Marcas</div>
						<div class="collapsible-body">

							<ul class="collection">
								<?php $array_C = array_slice($categoria,10); ?>
								@foreach($array_C as $categorias)
									<a href="{!! url('productos/'.$categorias->Marca) !!}" class="collection-item">{{$categorias->Marca}}<span class="badge">></span></a>
								@endforeach
							</ul>

						</div>
					</li>
				</ul>
			</div>
		</div><!-- no tocar este div -->

		<div class="col s12 m8 l9"> <!-- Note that "m8 l9" was added -->
			<!-- Teal page content
              This content will be:
              9-columns-wide on large screens,
              8-columns-wide on medium screens,
              12-columns-wide on small screens  -->
			<br><br>
			<div class="container col s12">
					<div class="jumbotron">
						<h2>Resultados de:&nbsp; {{$dato}}</h2>
					</div>
						<div class="panel-heading">Productos &nbsp;Página - {{$data->currentPage()}} </div>
							<div class="row">
								@foreach($data as $producto)
									<?php
									$extension=".jpg";
									$dat =utf8_decode($producto->ItemCode);
									$code = preg_replace('/[^,\sA-Za-z0-9.-]/','',$dat);


									?>
									<div class="col s3">
										<div class="card medium">
											<div class="card-image">
												{!! Html::image($producto->image_url) !!}
												<span class="card-title red-text text-lighten-1">{{$producto->ItemName}} </span>
											</div>
											<div class="card-content" >
												<p>Código: <br>
												 {{$producto->ItemCode}}</p>
												<p>Marca:&nbsp;  {{$producto->SubMarca}}</p>
											</div>
											<div class="card-action">
												<a href="{!! url('productos/'.$producto->SubMarca.'/datos/'.$code) !!}" >Ver Detalles</a>
												<a href="{!! url('addItemCarrito/'.$producto->ItemCode) !!}">Agregar</a>
											</div>
										</div>
									</div>
								@endforeach
							</div>

						<div class="text-center">{!! $data->appends(Request::only(['search']))->render() !!}</div>
			</div>
		</div><!-- no tocar este div -->
	</div>
@endsection

