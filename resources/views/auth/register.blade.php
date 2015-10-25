@extends('app')
@section('titulo')
    Registro
@endsection
@section('content')
    <div class="container">
        <!-- Modal Structure -->
        <div id="modal1" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h4>Terminos y Condiciones CESEHSA</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
            </div>
            <div class="modal-footer" align="right">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Aceptar</a>
            </div>
        </div>
        <!-- End Modal Structure -->
        <div class="card-panel">
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
                            <label for="name">Nombre *</label>
                        </div>

                        <div class="input-field col m6 s12">
                            <input id="apellido" type="text" class="validate" name="apellido" value="{{ old('apellido') }}">
                            <label for="apellido">Apellido *</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col m6 s12">
                            <i class ="material-icons prefix">email</i>
                            <input id="e-mail" type="email" class="validate" name="email" value="{{ old('email') }}">
                            <label for="e-mail" data-error="wrong" data-success="right">Dirección E-Mail *</label>
                        </div>

                        <div class="input-field col m6 s12">
                            <i class = "material-icons prefix">phone</i>
                            <input id="telefono" type="tel" class="validate" name="telefono" value="{{ old('telefono') }}">
                            <label for="telefono">Telefono *</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col m6 s12">
                            <i class = "material-icons prefix">location_on</i>
                            <input id="direccion" type="text" class="validate" name="direccion" value="{{ old('direccion') }}">
                            <label for="direccion">Dirección *</label>
                        </div>

                        <div class="input-field col m6 s12">
                            <input id="cp" type="text" class="validate" name="cp" value="{{ old('cp') }}">
                            <label for="cp">CP *</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col m6 s12">
                            <i class="mdi-communication-vpn-key prefix"></i>
                            <input id="password" type="password" class="validate" name="password">
                            <label for="password">Password *</label>
                        </div>

                        <div class="input-field col m6 s12">
                            <i class="mdi-communication-vpn-key prefix"></i>
                            <input id="re-password" type="password" class="validate" name="password_confirmation">
                            <label for="re-password">Confirme Password *</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col m6 offset-m6 s12">
                            <p>
                                <input name="condiciones" type="checkbox" class="filled-in" id="filled-in-box" />
                                <label for="filled-in-box"><a class="modal-trigger" href="#modal1">Aceptar Terminos y Condiciones </a></label>
                            </p>
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
    </div>
@endsection