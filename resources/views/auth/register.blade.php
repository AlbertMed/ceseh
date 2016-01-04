@extends('app')
@section('titulo')
    Registro
@endsection
@section('content')
    <div class="container">
        <!-- Modal Structure -->
        <div id="modal1" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h4>Términos y Condiciones</h4>
                <p>
                    <object type="application/pdf" data="{{ asset('politicas.pdf')}}" width='700' height='400'>
                    </object>
                </p>
            </div>
            <div class="modal-footer" align="right">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Aceptar</a>
            </div>
        </div>
        <!-- End Modal Structure -->
        <div>
        <div class="row">

            <div class="">
                <div class="row">

                    <div class="col m10 offset-m1">
                        @if (count($errors) > 0)
                            <p style="margin-top: 20px"></p>
                            <div class="alert alert-danger">

                                <strong>¡Lo sentimos!</strong> Hay algunos problemas con la información ingresada.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    </div>
                </div>
                <p style="margin-top: 35px"></p>
                <div class="row">
                    <div class="col m1" >
                        <p style="font-size: 12pt;" class="text-left">Registro</p>
                    </div>
                    <div class="col m4 ">

                        <p style="font-size: 10pt" class="text-justify"> * Campos obligatorios <br>
                        Por favor llene la siguiente información
                        </p>
                    </div>
                </div>
                <div class="col m9 offset-m1">
                        <form class="col s12 " role="form" method="POST" action="{{ url('/auth/register') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                            <div class="col m12">
                                <p style="font-weight: bold">Datos de acceso:</p>
                                <div class="input-field col m4 s12">
                                    <i class ="material-icons prefix">email</i>
                                    <input id="e-mail" type="email" class="validate" required name="email" value="{{ old('email') }}">
                                    <label for="e-mail" data-error="" data-success="ok">E-Mail de Contacto *</label>
                                </div>
                                <div class="input-field col m4 s12">
                                    <i class="mdi-action-lock prefix"></i>
                                    <input class="tooltipped" data-position="buttom" data-delay="50" data-tooltip="6 caracteres mínimo" id="password" type="password" class="validate" name="password">
                                    <label for="password">Password *</label>
                                </div>
                                <div class="input-field col m4 s12">
                                    <i class="mdi-action-lock prefix"></i>
                                    <input id="re-password" type="password" class="validate" name="password_confirmation">
                                    <label for="re-password">Confirme Password *</label>
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col m12">
                                <p style="font-weight: bold">Datos personales:</p>
                                <div class="input-field col m4 s12">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="name" type="text" class="validate" name="name" value="{{ old('name') }}">
                                    <label for="name">Nombre *</label>
                                </div>
                                <div class="input-field col m4 s12">
                                    <input id="apellido" type="text" class="validate" name="apellido" value="{{ old('apellido') }}">
                                    <label for="apellido">Apellido *</label>
                                </div>
                                <div class="input-field col m4 s12">
                                    <i class = "material-icons prefix">phone</i>
                                    <input id="telefono" type="number" class="validate" maxlength="10" name="telefono" value="{{ old('telefono') }}">
                                    <label for="telefono">Teléfono de Contacto*</label>
                                </div>
                            </div>

                    </div>

                </div>

            </div>


            <div class="col m2 offset-m1">
                <p class="left-align"><button class="btn waves-effect waves-light" style="background-color: #43B02A" type="submit" name="action">Registro
                        <i class="material-icons right">send</i>
                    </button>
            </div>
            </form>
            <div class="col m5">
                <p style="font-size: 10pt"> Al dar clic en el boton "Registro" reconozco haber
                    leído y aceptado los términos y condiciones del <a class="modal-trigger" href="#modal1">Aviso de Privacidad.</a></p>
            </div>

            </div>
        </div>
        </div>
    </div>
@endsection