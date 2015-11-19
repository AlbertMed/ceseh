@extends('app')
		<?php 
   $i=0; 
   foreach($articulos as $dato){
	   if($i==0){
	       $titulo=$dato->Marca;
	    }
	    $i++;
	}
?>
		@section('titulo')
		  Listar: {{$titulo}}
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
					@include('includes.menu')
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
								<h2>Categoria {{$titulo}}</h2>
							</div>

								<div class="panel-heading">Productos &nbsp;Página - {{$articulos->currentPage()}} </div>
									<div class="row">
										@foreach($articulos as $dato)
											<?php
											$data =utf8_decode($dato->ItemCode);
											$code = preg_replace('/[^,\sA-Za-z0-9.-]/','',$data);
											
											?>
											<div class="col s3">
												<div class="card medium">
													<div class="card-image">
														{!! Html::image($dato->image_url) !!}
														<span class="card-title red-text text-lighten-1">{{$dato->ItemName}} </span>
													</div>
													<div class="card-content">
														<p>Código:&nbsp;  {{$dato->ItemCode}}</p>
													</div>

													<div class="card-action">
														<a href="{!! url('productos/'.$dato->SubMarca.'/datos/'.$code) !!}" >Ver Detalles</a>
														<a href="{!! url('addItemCarrito/'.$dato->ItemCode) !!}">Agregar</a>
													</div>
												</div>
											</div>
										@endforeach
									</div>
								<div class="text-center">{!! $articulos->render() !!}</div>
					</div>
				</div><!-- no tocar este div -->
			</div><!-- fin del contendedor de dos apartados -->
@endsection			   