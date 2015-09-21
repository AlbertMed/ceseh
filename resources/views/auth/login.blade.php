@extends('app')
@section('titulo')
Login
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col m10 offset-m1 s12">
            <h2 class="center-align">Inicio de Sesión</h2>

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

                    
                    <div class="input-field">
                        <i class="mdi-communication-vpn-key prefix"></i>                   
                        <input id="password" name="password" type="password" class="validate">
                        <label for="password">Escribe tu Password</label>
                    </div>
             
                    <div class="col m4">
                        <p class="right-align">
                        <input type="checkbox" class="filled-in" id="filled-in-box"/>
                        <label for="filled-in-box">Recordarme</label>
                    </p>
                    </div>
                   
                    <p class="right-align"><button class="btn btn-large waves-effect waves-light" type="submit" name="action">Entrar</button></p>

                    <p class="right-align">
                        <a href="{!! url('password') !!}">¿Olvidaste tu Password?</a>
                    </p>
                    <p class="right-align">
                        <a href="{!! url('register') !!}"><ins>Crear Cuenta</ins></a>
                    </p>
                </div>

             <div class="slider col m6">
              <ul class="slides">
              <li>
        <img src="/img/logo/mensaje.jpg"> <!-- random image -->
        <h3  class="center header cd-headline letters type">
        
        <div class="caption center-align">
          
           <span>
               <b class="is-visible"><h5 class="teal accent-4">En CESEHSA tenemos el Mejor Equipo Hidráulico.</h5></b>
           </span>                   
        </div>
        </h3>
      </li>
              
               </ul>
            </div>
        </div>  

        {!! Form::close() !!}

    </div>
</div>
</div>
@endsection
