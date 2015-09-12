@extends('app')
@section('titulo')
  Login
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col m10 offset-m1 s12">
            <h2 class="center-align">Inicio de Sesión</h2>
            <div >
                 @if (count($errors) > 0)
				    <div class="alert alert-danger text-center">
							<strong>¡Lo sentimos!</strong>  Las credenciales ingresadas no coinciden con nuestros registros.<br>	
					</div>
				 @endif

				 {!! Form::open(['url'=>'auth/login', 'role'=>'form', 'class'=>'col s12']) !!}	
                
                    <div class="row">
                        <div class="input-field col m6 s12">                        
                            <i class="mdi-communication-email prefix"></i>
                            <input id="icon_email" name="email" type="email" class="validate">
                            <label for="icon_email">Email</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col m6 s12">  
                         <i class="mdi-communication-vpn-key prefix"></i>                     
						 <input id="password" name="password" type="password" class="validate">
			    		  <label for="password">Escribe tu Password</label>
						</div>
                    </div>

                    <div class="row">
							 <p>
                             <input type="checkbox" class="filled-in" id="filled-in-box"/>
                             <label for="filled-in-box">Recordarme</label>
                             </p>
                    </div>

                    <div class="row">
                        <div class="col m12">
                            <p class="lefth-align"><button class="btn btn-large waves-effect waves-light" type="submit" name="action">Entrar</button></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col m12">
                        <p class="lefth-align">
                         <a href="{!! url('/password/email') !!}">¿Olvidaste tu Password?</a>
                         </p>
                        </div>                        
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

 