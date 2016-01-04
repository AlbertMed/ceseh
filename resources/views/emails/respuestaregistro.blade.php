@extends('app')
@section('titulo')
    Registro
@endsection
@section('content')
<p style="margin-top: 20px"></p>
<div class="alert alert-info">

    <strong>¡Te has registrado correctamente!</strong>
    <p>
        Para activar tu cuenta te llegara un correo a
    <div style="font-weight: bold">{{$email}}</div> con la liga de activación,
    </p><br>
    <p>Por favor ingrese para completar el registro.</p>
    <br><br>

    <p>¡Gracias por su preferencia!</p>

</div>
@endsection
