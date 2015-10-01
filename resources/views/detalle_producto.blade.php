@extends('app')
@section('titulo')
  Producto
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col s12">
			<div class="panel panel-default">
				<div class="panel-body">

			       <div class="row">
                      <br><br>
				      <div class="col s12 m4 l3"> <!-- Note that "m4 l3" was added -->
				        <!-- Grey navigation panel
                        
				              This content will be:
				          3-columns-wide on large screens,
				          4-columns-wide on medium screens,
				          12-columns-wide on small screens  -->
				          <div class="col s12">
				               <img class="materialboxed col s12" width="200" src="http://www.ar.all.biz/img/ar/catalog/52062.jpeg">
                          </div>
				      </div>
                 
				      <div class="col s12 m8 l9"> 
				      		<br><br>
					        <div class="row">
								<div class="col s12">
								   <ul class="tabs">
								      <li class="tab col s4"><a class="active" href="#test1">Producto</a></li>
								      <li class="tab col s4"><a href="#test2">Especificaciones</a></li>
								      <li class="tab col s4"><a href="#test3">Otras</a></li>
								    </ul>
							    </div>
							    <div id="test1" class="col s12">
                                     <br><br><br>
							      
		                            <br>
		                            {{$itemName}}
								    
								       <br><br> 
									<span>Precio</span><br>
									@if(Auth::check())
									<span class="teal-text text-lighten-2"><p>$ {{$precio}}&nbsp;MXP</p></span>
									@else
                                     <span class="teal-text text-lighten-2"><p>Solo Usuarios Registrados</p></span>
									@endif
								        
								    <br>
								    <span>Código</span><br>
									<span><i class="material-icons left">label_outline</i>{{$itemCode}}</span>
		                            <br><br>
		                            <span>En Stock</span>
		                            <br>
		                            {{$stock}}
		                            <br><br>                                    
		                            {!! Form::open(array("url" => "/add/".$itemCode))!!}
		                            
		                            <div class="input-field col s3">
                                    {!!Form::input('number','number','1', ['max' => $stock, 'min' => '1']) !!}
                                     <label>Cantidad:</label>
                                    </div>                                    
		                            <br>
                                   
                                   	 <button class="btn waves-effect waves-light" type="submit" name="action">Agregar
                                   <i class="material-icons right">send</i>
                                   </button>

								  									 			
								    
								    {!! Form::close() !!}
								</div>    
								<div id="test2" class="col s12">aquí van los detalles</div>
								<div id="test3" class="col s12">aqui ira algo másk</div>
						   </div>
					  </div>
                 </div><!--se termina row-->
			 </div>
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