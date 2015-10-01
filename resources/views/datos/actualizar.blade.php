@extends('app')
   @section('titulo')
       Datos Cliente
   @endsection
   @section('content')
  <?php
     $calle   = null;
     $colonia = null;
     $ciudad  = null;
     $delegacion = null;
     $estado = null;
     $cp = null;
     $numero = null;

      foreach ($entrega as $entregar) {
         $calle      = $entregar->en_calle;
      	 $colonia    = $entregar->en_colonia;
	     $ciudad     = $entregar->en_ciudad;
	     $delegacion = $entregar->en_municipio;
	     $estado     = $entregar->en_estado;
	     $cp         = $entregar->en_cp;
	     $numero     = $entregar->en_numero;

      }
  ?> 
       @if($errors->any())
           <div class="container">
	           <div class="row">
	               <div class="card-panel red lighten-3 col s12" >
	                   <p>Revisa los Errores:</p>
	                   <ul>
	                      @foreach ($errors->all() as $error)
	                      <li><span class="red-text text-darken-1">{{ $error }}</span></li>
	                      @endforeach
	                   </ul>
	               </div>
	           </div>
           </div>

       @endif 
        
        <br>   
    <br>
    
		<div>
		  <h5 class="center-align">Datos de de contacto</h5>
		</div>
        
   <br><br>
    @foreach ($datos as $dato) 
		<div class="container">
		    <div class="row">
			   <form method="post" action="{!! url('datos/ver') !!}" role="form" class="col s12">
			    <input type="hidden" name="_token" value="{{ csrf_token() }}">
		            <div class="row">
						<div class="input-field col s6">
						    <i class="material-icons prefix">account_circle</i>
						    <input value="{{$dato->nombre}}" name="nombre" id="icon_prefix" type="text" class="validate">
						    <label class="active" for="icon_prefix">Nombre de contacto</label>
					    </div>
				
		                  
		       
					    <div class="input-field col s6">
					        <i class="material-icons prefix">email</i>
					        <input disabled="true" class="active" value="{{$dato->email}}" name="email" id="emailCuenta" type="email" class="validate">
					        <label class="active" for="emailCuenta">Email de cuenta</label>
					    </div>
					</div>

			       <div class="row">
					    <div class="input-field col s6">
					        <i class="material-icons prefix">phone</i>
					        <input value="{{$dato->telefono}}" name="telefono" id="icon_telephone" type="tel" class="validate">
					        <label class="active" for="icon_telephone">Telefono</label>
					    </div>

					     <div class="input-field col s6">
					        <i class="material-icons prefix">email</i>
					        <input value="{{$dato->email_cli}}" name="email_cli" id="icon_email" type="email" class="validate">
					        <label class="active" for="icon_email">Email de contacto</label>
					    </div>
					</div>

					
                    <br>
			       <div>
					  <h5 class="center-align">Datos de facturación </h5>
					</div>
					 <div class="row">
						<div class="input-field col s6">
						    <i class="material-icons prefix">account_circle</i>
						    <input value="{{$dato->nombreRazon}}" name="nombreRazon" id="fac_prefix" type="text" class="validate">
						    <label class="active" for="fac_prefix">Nombre o Razón social</label>
					    </div>
				
		                  
		       
					    <div class="input-field col s6">
					        <i class="material-icons prefix">email</i>
					        <input value="{{$dato->RFC}}" name="RFC" id="fac_RFC" type="text" class="validate">
					        <label class="active" for="fac_RFC">RFC</label>
					    </div>
					</div>

			       <div class="row">
					    <div class="input-field col s6">
					        <i class="material-icons prefix">phone</i>
					        <input value="{{$dato->calle}}" name="calle" id="fac_calle" type="text" class="validate">
					        <label class="active" for="fac_calle">calle</label>
					    </div>
		
					    <div class="input-field col s6">
					        <i class="material-icons prefix">location_on</i>
					        <input value="{{$dato->colonia}}" name="colonia" id="fac_colonia" type="text" class="validate">
					        <label class="active" for="fac_colonia">Colonia</label>
					    </div>
					</div>

					<div class="row">
					    <div class="input-field col s6">
					        <i class="material-icons prefix">location_on</i>
					        <input value="{{$dato->ciudad}}" name="ciudad" id="fac_ciudad" name="location" type="text" class="validate">
					        <label class="active" for="fac_ciudad">Ciudad</label>
					    </div>

					    <div class="input-field col s6">
					        <i class="material-icons prefix">location_on</i>
					        <input value="{{$dato->municipio}}" name="municipio" id="fac_municipio" name="location" type="text" class="validate">
					        <label class="active" for="fac_municipio">Delegacion/Municipio</label>
					    </div>
			       </div>

			       <div class="row">
					    <div class="input-field col s6">
					        <i class="material-icons prefix">location_on</i>
					        <input value="{{$dato->estado}}" name="estado" id="fac_estado" name="location" type="text" class="validate">
					        <label class="active" for="fac_estado">Estado</label>
					    </div>

					    <div class="input-field col s6">
					        <i class="material-icons prefix">location_on</i>
					        <input value="{{$dato->cp}}" name="cp" id="cp" name="location" type="text" class="validate">
					        <label class="active" for="fac_cp">Codigo postal</label>
					    </div>
			       </div>

			       <div class="row">
					    <div class="input-field col s6">
					        <i class="material-icons prefix">location_on</i>
					        <input value="{{$dato->numero}}" name="numero" id="fac_numero" name="location" type="text" class="validate">
					        <label class="active" for="fac_numero">Numero</label>
					    </div>
			       </div>

			       <br>
			       <div>
					  <h5 class="center-align">Datos de entrega </h5>
					</div>
                  
					<div class="row">
					    <div class="input-field col s6">
					        <i class="material-icons prefix">phone</i>
					        <input value="{{$calle}}" name="en_calle" id="en_calle" type="tel" class="validate">
					        <label class="active" for="en_calle">calle</label>
					    </div>
		
					    <div class="input-field col s6">
					        <i class="material-icons prefix">location_on</i>
					        <input value="{{$colonia}}" name="en_colonia" id="en_colonia" type="text" class="validate">
					        <label class="active" for="en_colonia">Colonia</label>
					    </div>
					</div>

					<div class="row">
					    <div class="input-field col s6">
					        <i class="material-icons prefix">location_on</i>
					        <input value="{{$ciudad}}" name="en_ciudad" id="en_ciudad" name="en_ciudad" type="text" class="validate">
					        <label class="active" for="en_ciudad">Ciudad</label>
					    </div>

					    <div class="input-field col s6">
					        <i class="material-icons prefix">location_on</i>
					        <input value="{{$delegacion}}"  id="en_municipio" name="en_municipio" type="text" class="validate">
					        <label class="active" for="en_municipio">Delegacion/Municipio</label>
					    </div>
			       </div>

			       <div class="row">
					    <div class="input-field col s6">
					        <i class="material-icons prefix">location_on</i>
					        <input value="{{$estado}}"  id="en_estado" name="en_estado" type="text" class="validate">
					        <label class="active" for="en_estado">Estado</label>
					    </div>

					    <div class="input-field col s6">
					        <i class="material-icons prefix">location_on</i>
					        <input value="{{$cp}}"  id="en_cp" name="en_cp" type="text" class="validate">
					        <label class="active" for="en_cp">Codigo postal</label>
					    </div>
			       </div>

			       <div class="row">
					    <div class="input-field col s6">
					        <i class="material-icons prefix">location_on</i>
					        <input value="{{$numero}}"  id="en_numero" name="en_numero" type="text" class="validate">
					        <label class="active" for="en_numero">Numero</label>
					    </div>
			       </div>
  

			       <div class="row prefix">
						<button class="btn waves-effect waves-light" type="submit" name="action">Actualizar</button>
					    <i class="mdi-content-send right"></i>
			        </div>
			   </form>
		   </div>
	   </div>
	   <br>
	  
   @endforeach
   
@endsection