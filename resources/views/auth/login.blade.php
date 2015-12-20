@extends('app')
@section('titulo')
Login
@endsection
@section('content')
<div class="container">
    <div class="card-panel">
        <div class="row">
            <h2 class="center-align">Inicio de Sesión</h2>

            @if (count($errors) > 0)
            <div class="alert alert-danger text-center">
                <strong>¡Lo sentimos!</strong>  Las credenciales ingresadas no coinciden con nuestros registros.<br>                
            </div>
            @endif

            {!! Form::open(['url'=>'auth/login', 'role'=>'form', 'class'=>'col s12']) !!}

            
                <div class="input-field col m8 offset-m2 s12">

                    
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
                   
                    <p class="right-align">
                        <button class="btn btn-large waves-effect waves-light" type="submit" name="action">Entrar</button></p>

                    <p class="right-align">
                        <a href="{!! url('/password/email') !!}">¿Olvidaste tu Password?</a>
                    </p>
                    <p class="right-align">
                        <a href="{!! url('/auth/register') !!}"><ins>Crear Cuenta</ins></a>
                    </p>
                </div>




        {!! Form::close() !!}

    </div>
</div>
</div>
@endsection
