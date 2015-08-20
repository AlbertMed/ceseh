@extends('app')
   @section('titulo')
       Home
   @endsection
   @section('content')
  

    <br>
    
		<div>
		  <h5 class="center-align">Datos Guardados actualmente en la base de datos</h5>
		</div>
        
   <br><br>
    @foreach ($datos as $dato) 
	<div class="container">
	    	<div class="row">
			    <form class="col s12">
               <div class="row">
				    <div class="input-field col s6">
				          <i class="material-icons prefix">account_circle</i>
				          <input value="{{$dato->nombre}}" id="icon_prefix" type="text" class="validate">
				          <label for="icon_prefix">Nombre</label>
			        </div>
			    </div>
                  
                <div class="row">
			      <div class="input-field col s6">
			          <i class="material-icons prefix">email</i>
			          <input value="{{$dato->email}}"  id="icon_email" type="email" class="validate">
			          <label class="active" for="icon_email">Email</label>
			        </div>
			     </div>

			     <div class="row">
			       <div class="input-field col s6">
			          <i class="material-icons prefix">phone</i>
			          <input value="{{$dato->telefono}}" id="icon_telephone" type="tel" class="validate">
			          <label class="active" for="icon_telephone">Telefono</label>
			        </div>
			      </div>

			       <div class="row">
			       <div class="input-field col s6">
			          <i class="material-icons prefix">location_on</i>
			          <input value="{{$dato->direccion}}"  id="icon_dire" type="text" class="validate">
			          <label class="active" for="icon_dire">Dirección</label>
			        </div>
			      </div>

			      <div class="row">
			       <div class="input-field col s6">
			          <i class="material-icons prefix">location_on</i>
			          <input value="{{$dato->cp}}"  id="icon_dir" type="text" class="validate">
			          <label class="active" for="icon_dir">CP</label>
			        </div>
			      </div>


			    </form>
		   </div>
   </div>
 @endforeach
   
@endsection