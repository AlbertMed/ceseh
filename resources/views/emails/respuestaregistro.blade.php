@extends('app')
@section('titulo')
    Registro
@endsection
@section('content')
    <br><br><br>
    <div class="row">
        <div class="container">
            <div class="col s12 m8 offset-m2 l6 offset-l3">
                <div class="card-panel grey lighten-5 z-depth-1">
                    <div class="row valign-wrapper">
                        <div class="col s12">
                            <div class="row">
                                <strong>¡Te has registrado correctamente!</strong>
                                <p>
                                    Para activar tu cuenta te llegara un correo a
                                <div style="font-weight: bold">{{$email}}<br></div> con la liga de activación,
                                </p><br>
                                <p>Por favor ingrese para completar el registro.</p>
                                <br><br>

                                <p>¡Gracias por su preferencia!</p>
                            </div>
                            <div class="row">
                                <span class="grey-text">
                                    Para cualquier aclaración comunicarse al 01800-237-3472
                                </span>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <br><br><br><br><br><br><br><br>
@endsection