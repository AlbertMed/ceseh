@extends('app')
		@section('titulo')
		  Home
		@endsection
		@section('content')
		<div class="container">
			
				<div class="col-md-12">
				  <div class="jumbotron">
				      <h2>Categoria <?php $i=0; foreach($datos as $dato){
				                      if($i==0){
				                      echo $dato->SubMarca;
				                  }
				                  $i++;
				                  }
				             ?></h2>
				  </div>
					<div class="panel panel-default">
						<div class="panel-heading">Productos &nbsp;Página - {{$datos->currentPage()}} </div>
						
		                <div class="panel-body">     
		                
		                <div class="row">
		                @foreach($datos as $dato)
		                <?php  $data =utf8_decode($dato->ItemCode);
		                       $code = preg_replace('/[^,\sA-Za-z0-9.-]/','',$data) 
		                ?>
					       	         	    <div class="col s3"> 
					       	         	      <div class="card medium">
						       	         	        <div class="card-image">
						       	         	          <img src="http://cesehsa.com.mx/cesehsa/wp-content/uploads/2013/06/Sujeción-240x150.png" >
						       	         	          <span class="card-title red-text text-lighten-1">{{$dato->ItemName}} </span>
						       	         	        </div>
						       	         	        <div class="card-content">
											            <p>Código:&nbsp;  {{$dato->ItemCode}}</p>
											        </div>
						       	         	         
						       	         	        <div class="card-action">
											            <a href="{!! url('productos/'.$dato->SubMarca.'/datos/'.$code) !!}" >Ver Detalles</a>
											           
											        </div>
					       	         	      </div>
					       	         	    </div>
						@endforeach
		                </div>
		                </div> <!-- fin panel-body -->
		                <div class="text-center">{!! $datos->render() !!}</div>
                       
					</div>
				</div>
			
   </div>
@endsection			   