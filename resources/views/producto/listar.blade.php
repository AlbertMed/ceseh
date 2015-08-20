@extends('app')
	@section('titulo')
		 Home
	@endsection
	@section('content')
		<div class="container">
			
				<div class="col-md-12">
				  <div class="jumbotron">
				      <h2>Categoria 1</h2>
				  </div>
					<div class="panel panel-default">
						<div class="panel-heading">Productos</div>
						
		                <div class="panel-body">             
		                					
							<?php
							  $BOM = new \SimpleXMLElement($datos);
					          $numProductos = (int)$BOM->BO->OITW->row->count();
					       ?>
					       <br>
					       
								
								<?php for($i=0;$i<$numProductos;$i++){ 
					       	         	 $valor= $BOM->BO->OITW->row[$i]->ItemCode; 
					       	         	  

					       	    ?>
                                        @if ($i % 4 == 0 && $i > 1)                                         
                                          </div>
					       	         	  <div class="row">
					       	         	  @elseif ($i == 0)					       	         	 
					       	         	  <div class="row">
					       	         	  @endif

					       	         	    <div class="col-sm-6 col-md-3">
					       	         	      <div class="thumbnail">
					       	         	        <img clas="img-circle" src="http://cesehsa.com.mx/cesehsa/wp-content/uploads/2013/06/Sujeción-240x150.png" alt="...">
					       	         	        
					       	         	        <div class="text-center">
					       	         	          <h4><?=$BOM->BO->OITW->row[$i]->ItemName; ?></h4> 
					       	         	          </div>
					       	         	          <p>
					       	         	          	<h6>Código:&nbsp;<?=$BOM->BO->OITW->row[$i]->ItemCode;  ?></h6>
													<h6>En Stock:&nbsp;<?=$BOM->BO->OITW->row[$i]->OnHand*1; ?></h6>
					       	         	          </p> 
					       	         	          <div class="text-center">
					       	         	          <p><a href="{!! url("Home/datos/$valor") !!}" class="btn btn-primary" role="button">Ver Detalles</a>
					       	         	          </p>
					       	         	        </div>
					       	         	      </div>
					       	         	    </div>
					       	         	 
		                                  
											   
									<?php }?>													
					     
	               
		                
		                </div> <!-- fin panel-body -->

					</div>
				</div>
			
      </div>
	@endsection			   