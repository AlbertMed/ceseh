@extends('app')
@section('titulo')
Registro
@endsection
@section('content')
<div class="container">
    <div class="row">

        <div class="col m10 offset-m1 s12">

            <h2 class="center-align">Registro</h2>

            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>¡Lo sentimos!</strong> Hay algunos problemas con la información ingresada.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form class="col s12 " role="form" method="POST" action="{{ url('/auth/register') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">                     
                    <div class="input-field col m6 s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="name" type="text" class="validate" name="name" value="{{ old('name') }}">
                        <label for="name">Nombre</label>
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="name" type="text" class="validate" name="name" value="{{ old('name') }}">
                        <label for="name">Apellido</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col m6 s12">
                        <i class ="material-icons prefix">email</i>
                        <input id="e-mail" type="email" class="validate" name="email" value="{{ old('email') }}">
                        <label for="e-mail" data-error="wrong" data-success="right">Dirección E-Mail</label>
                    </div>

                    <div class="input-field col m6 s12">
                        <i class = "material-icons prefix">phone</i>
                        <input id="telefono" type="tel" class="validate" name="telefono" value="{{ old('telefono') }}">
                        <label for="telefono">Telefono</label>
                    </div>						
                </div>

                <div class="row">						    
                    <div class="input-field col m6 s12">
                        <i class = "material-icons prefix">location_on</i>
                        <input id="direccion" type="text" class="validate" name="direccion" value="{{ old('direccion') }}">
                        <label for="direccion">Dirección</label>
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="cp" type="text" class="validate" name="cp" value="{{ old('cp') }}">
                        <label for="cp">CP</label>
                    </div>					    								    
                </div>

                <div class="row">
                    <div class="input-field col m6 s12">
                        <i class="mdi-communication-vpn-key prefix"></i> 
                        <input id="password" type="password" class="validate" name="password">
                        <label for="password">Password</label>
                    </div>

                    <div class="input-field col m6 s12">
                        <i class="mdi-communication-vpn-key prefix"></i> 
                        <input id="re-password" type="password" class="validate" name="password_confirmation">
                        <label for="re-password">Confirme Password</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col m12">
                        <p class="right-align"><button class="btn btn-large waves-effect waves-light" type="submit" name="action">Enviar
                                <i class="material-icons right">send</i>
                            </button>
                    </div>
                </div>
            </form>
           
        </div>
    </div>
</div>
@endsection