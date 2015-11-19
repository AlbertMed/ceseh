@extends('datos.actualizar')
@section('titulo')
        Compra
@endsection
@section('formulario')
        {!! Form::open(['url'=>'perfil_compra', 'role'=>'form', 'class'=>'col s12']) !!}
        @endsection
@section('complemento')

        <button class="btn waves-effect waves-light" type="submit" name="action"><i class="mdi-content-send right">

                </i>Siguiente</button>
@endsection