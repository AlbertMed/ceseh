@extends('app')
@section('titulo')
    Verificación
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
                                  <span class="red-text" style="font-size: 16px;">
                                    ¡Su pago ha sido registrado!<br>
                                      Gracias por su compra
                                  </span>
                            </div>
                            <div class="row">
                                <span class="grey-text">
                                    Para cualquier aclaración comunicarse al 01800-237-3472
                                </span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col m12 right-align">

                        <p><a class="waves-effect waves-light btn-large"  href="{!! url('/#marcas') !!}"><i class="material-icons left">shopping_cart</i>Regresar</a></p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <br><br><br><br><br><br><br><br>
@endsection