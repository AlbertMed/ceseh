@extends('app')
@section('title')
    paypal Response
@endsection
@section('content')
código de pago: {{ $id }}
<br>
Estado: {{ $dato }}
@endsection