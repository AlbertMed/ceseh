@extends('datos.actualizar')
@section('titulo')
        Compra
@endsection
@section('formulario')
        {!! Form::open(['url'=>'perfil', 'role'=>'form', 'class'=>'col s12']) !!}
                @endsection
                @section('complemento')
@section('complemento')
        <button class="btn waves-effect waves-light" type="submit" name="action"><i class="mdi-content-send right"></i>Guardar cambios</button>
@endsection