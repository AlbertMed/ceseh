@extends('app')
@section('titulo')
  Home
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col s12">
		  <div class="jumbotron">
		      <h2>Productos</h2>
		  </div>
			<div class="panel panel-default">
				<div class="panel-heading">Categorias</div>
				
                <div class="panel-body">             
                	<div class="row">
                    @foreach($categorias as $dato)
                	  <div class="col s3">
                	      <div class="card">
					           <div class="card-image">
					              <img src="http://www.nocturnar.com/forum/attachments/fondos-de-pantalla/28575d1338158805-paisajes-hermosos-fondo-de-pantalla-paisajes_hermosos_del_mundo2.jpg">
					              <span class="card-title">{{$dato->SubMarca}}</span>
					            </div>
					            <div class="card-content">
					            <p>Descripción</p>
					            </div>
					            <div class="card-action">
					              <a href="{!! url('productos/'.$dato->SubMarca) !!}">Ver Productos</a>
					            </div>
					        </div>
                	    </div>

	                @endforeach	   

                	  



                	</div> <!-- fin row-->
                </div> <!-- fin panel-body -->

			</div>
		</div>
	</div>
</div>
@endsection

 