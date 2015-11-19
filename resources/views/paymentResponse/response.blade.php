@extends('app')
@section('titulo')
    Status de Compra
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12 m6">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title">Su pago se a realizado con éxito!</span>
                        <p>estado de pago: {{ $charge->status }}</p>
                        <p>codigo de autorización: {{ $charge->payment_method->auth_code }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection