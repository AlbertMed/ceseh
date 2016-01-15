@extends('datos.actualizar')
@section('titulo')
        Compra
@endsection


@section('complemento')

        <a style="background-color: #43B02A" class="btn waves-effect waves-light" href="{!! url('pago') !!}" role="button" name="action"><i class="mdi-content-send right">
        </i>Siguiente</a>
@endsection