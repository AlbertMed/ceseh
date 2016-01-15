@extends('app')
@section('titulo')
        Formas de pago
@endsection
@section('content')
        <div class="section">
                <div class="cContainer">
                        <div class="row">
                                <div class="chip fontS">
                                        Formas de Pago:
                                </div>
                        </div>
                        <div class="col s6 m6 l6">
                                <ul class="collapsible popout" data-collapsible="accordion">
                                        <li>
                                                <div class="collapsible-header"><i class="fa fa-credit-card"></i>Tarjeta de Crédito</div>
                                                <div class="collapsible-body">
                                                        <div class="container">
                                                                <div class="row">
                                                                        <form action="{!! url('carrito/pay/creditCard/'.Auth::user()->email.'/='.csrf_token()) !!}" method="POST" id="card-form">
                                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                                <div class="col m4 s4 l4 offset-s4">
                                                                                        <div class="credit-card-div">
                                                                                                <span class="card-errors"></span>
                                                                                                <div class="panel panel-default">
                                                                                                        <div class="panel-heading">
                                                                                                                <div class="row">
                                                                                                                        <div class="col s12 m12 l12 paind-adjust">
                                                                                                                                <label>
                                                                                                                                        <span>Número de tarjeta de crédito</span>
                                                                                                                                        <input type="text" size="20" data-conekta="card[number]"/>
                                                                                                                                </label>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                        <div class="col s12 m12 l12 paid-adjust">
                                                                                                                                <label>
                                                                                                                                        <span>Fecha de expiración (MM/AAAA)</span>
                                                                                                                                </label>
                                                                                                                        </div>
                                                                                                                        <div class="col m3 s3 l3">
                                                                                                                                <label>
                                                                                                                                        <span class="small-font">Mes</span>
                                                                                                                                        <input type="text" size="2" placeholder="MM" data-conekta="card[exp_month]"/>
                                                                                                                                </label>
                                                                                                                        </div>
                                                                                                                        <div class="col m3 s3 l3">
                                                                                                                                <label>
                                                                                                                                        <span class="small-font">Año</span>
                                                                                                                                        <input type="text" size="4" placeholder="YYYY" data-conekta="card[exp_year]"/>
                                                                                                                                </label>
                                                                                                                        </div>
                                                                                                                        <div class="col m3 s3 l3">
                                                                                                                                <label>
                                                                                                                                        <span class="small-font">CVC</span>
                                                                                                                                        <input type="text" size="4" placeholder="CVC" data-conekta="card[cvc]"/>
                                                                                                                                </label>
                                                                                                                        </div>
                                                                                                                        <div class="col m3 s3 l3">
                                                                                                                                <img src="/../img/1.png">
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                        <div class="col s12 paid-adjust">
                                                                                                                                <label>
                                                                                                                                        <span>Nombre del tarjetahabiente</span>
                                                                                                                                        <input type="text" size="20" placeholder="Name On The Card" data-conekta="card[name]"/>
                                                                                                                                </label>
                                                                                                                        </div>
                                                                                                                </div>

                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="row " style="text-align:right">
                                                                                                <button style="background-color: #43B02A" class="btn waves-effect waves-light" type="submit" name="action">Pagar</button>
                                                                                        </div>
                                                                                </div>
                                                                        </form>
                                                                </div>
                                                        </div>
                                                </div>
                                        </li>
                                        <li>
                                                <div class="collapsible-header"><i class="fa fa-paypal"></i>Pago con PayPal</div>
                                                <div class="collapsible-body">
                                                        <p>
                                                                Al dar clic en el boton "pagar" te llevara a tu cuenta PayPal para finalizar el pago
                                                        </p>
                                                        <form class="col s12 m12 L12" role="form" method="post" action="{!! url('carrito/pay/PayPal/'.Auth::user()->email.'/='.csrf_token()) !!}">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <div class="sContainer" style="text-align:right" >
                                                                        <button style="background-color: #43B02A" class="btn waves-effect waves-light"  type="submit" name="action">Pagar
                                                                        </button>
                                                                </div>
                                                        </form>
                                                        <br>
                                                </div>
                                        </li>
                                        <li>
                                                <div class="collapsible-header <?php if(Session::has('mensaje')|| $errors->any()){ echo 'active';} ?>"><i class="fa fa-university"></i>Depósito Bancario o transferencias</div>
                                                <div class="collapsible-body">
                                                        <br>
                                                        <div class="Ccontainer">
                                                                <div class="row">
                                                                        <div class="col s6">
                                                                                <div class="row">
                                                                                        <div class="col s3">
                                                                                                <img src="/../img/banc/LB.png" alt="" class="responsive-img">
                                                                                        </div>
                                                                                </div>
                                                                                <div class="row fontS">
                                                                                        Cuenta: 0176968368<br>
                                                                                        Clabe Interbancaria: 012 420 001769683681<br>
                                                                                        Sucursal 6549 Toluca Ofna. Ppal. Zona Industrial<br>
                                                                                        Dirección: AV. 1 de Mayo 173 Col. Zona Industrial México<br>
                                                                                        Plaza. Toluca
                                                                                </div>
                                                                        </div>
                                                                        <div class="col s6">
                                                                                <div class="row">
                                                                                        <div class="col s3">
                                                                                                <img src="/../img/banc/LH.png" alt="" class="responsive-img">
                                                                                        </div>
                                                                                </div>
                                                                                <div class="row fontS">
                                                                                        Cuenta: 4055548440<br>
                                                                                        Clabe Interbancaria: 021420 040555484402<br>
                                                                                        Sucursal 0094 Toluca Zona Industrial
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="container">
                                                                        <div class="row">
                                                                                <div class="fontS">
                                                                                        Para que tu pago sea identificado, ya sea en la transferencia
                                                                                        o en el depósito, deberas agregar este código de referencia:
                                                                                        <br><br>

                                                                                        <div class="col m5 offset-m1">

                                                                                                <div class="row valign-wrapper">
                                                                                                        <div class="">
                                                                                                                <span class="black-text">
                                                                                                                        Código de referencia: {{$referencia->sapResultado}}
                                                                                                                        <br>
                                                                                                                        @if(Session::has('total'))
                                                                                                                                Total a pagar: $ {{number_format(Session::get('total'),2,'.',',')}}
                                                                                                                        @endif
                                                                                                                        <hr>
                                                                                                                </span>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="col m5">
                                                                                                @if($errors->any())

                                                                                                        <div class="row">
                                                                                                                <div class="card-panel red lighten-3 col s12" >
                                                                                                                        Revisa los Errores:
                                                                                                                        <ul>
                                                                                                                                @foreach ($errors->all() as $error)
                                                                                                                                        <li class="red-text text-darken-1">{{ $error }}</li>
                                                                                                                                @endforeach
                                                                                                                        </ul>
                                                                                                                </div>
                                                                                                        </div>

                                                                                                @endif
                                                                                                @if(Session::has('mensaje'))

                                                                                                                <div class="row">
                                                                                                                        <div style="color: #43B02A" class="card-panel  col s12" >
                                                                                                                                <p>{{Session::get('mensaje')}}</p>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        @endif
                                                                                                <div class="">Agregar Comprobante del Depósito</div>
                                                                                                        <br>
                                                                                                        <div class="">
                                                                                                                <form method="POST" action="{!! url('home/info/enviar_comprobante') !!}" accept-charset="UTF-8" enctype="multipart/form-data">

                                                                                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                                                                                        <div class="form-group">

                                                                                                                                <div class="col-md-6">
                                                                                                                                        <input type="file" class="form-control" name="file" >
                                                                                                                                </div>
                                                                                                                                <label class="col-md-4 control-label">Tipos admitidos: jpeg, bmp, png, pdf.</label>
                                                                                                                        </div>
                                                                                                                        <br>
                                                                                                                        <hr>
                                                                                                                        <div class="form-group">
                                                                                                                                <div class="col-md-6 col-md-offset-4">
                                                                                                                                        <button style="background-color: #43B02A" type="submit" class="btn btn-primary">Enviar</button>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                </form>
                                                                                                        </div>

                                                                                        </div>

                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                        </li>
                                </ul>
                        </div>
                </div>
        </div>
        <br>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript" src="https://conektaapi.s3.amazonaws.com/v0.3.2/js/conekta.js"></script>


        <script type="text/javascript">

                // Conekta Public Key
                Conekta.setPublishableKey('key_LwZyqNbCxvgSSqWydHQCHrA');

                jQuery(function($) {

                        var conektaSuccessResponseHandler;
                        conektaSuccessResponseHandler = function(token) {
                                var $form;
                                $form = $("#card-form");

                                /* Inserta el token_id en la forma para que se envíe al servidor */
                                $form.append($("<input type='hidden' name='conektaTokenId'>").val(token.id));

                                /* and submit */
                                $form.get(0).submit();
                        };

                        var conektaErrorResponseHandler;
                        conektaErrorResponseHandler = function(response) {
                                var $form;
                                $form = $("#card-form");

                                /* Muestra los errores en la forma */
                                $form.find(".card-errors").text(response.message);
                                $form.find("button").prop("disabled", false);
                        };

                        $("#card-form").submit(function(event) {
                                var $form;
                                $form = $(this);

                                /* Previene hacer submit más de una vez */
                                $form.find("button").prop("disabled", true);
                                Conekta.token.create($form, conektaSuccessResponseHandler, conektaErrorResponseHandler);

                                /* Previene que la información de la forma sea enviada al servidor */
                                return false;
                        });
                });
        </script>

<br><br><br><br><br><br><br><br><br><br><br><br>
@endsection