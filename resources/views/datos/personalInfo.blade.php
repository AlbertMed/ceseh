@extends('datos.perfil')
@section('titulo')
        Compra
@endsection
@section('formulario')
        {!! Form::open(['url'=>'perfil_compra', 'role'=>'form', 'class'=>'col s12']) !!}
                @endsection
                @section('complemento')
@section('complemento')
        <button style="background-color: #43B02A" class="btn waves-effect waves-light" type="submit" name="action"><i class="mdi-content-send right"></i>Guardar cambios</button>
@endsection