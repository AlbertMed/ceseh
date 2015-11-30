@extends('app')
@section('titulo')
        Pagar
@endsection
@section('content')
        <div class="container">
                <div class="row">
                        <div class="col s12 m6 l6">
                                <h3>Formas de pago</h3>
                                <ul class="collapsible popout" data-collapsible="accordion">
                                        <li>
                                                <div class="collapsible-header"><i class="material-icons">filter_drama</i>Terjeta de Crédito/Debito</div>
                                                <div class="collapsible-body card-panel grey lighten-5" >

                                                        <div class="row">
                                                                <form class="col s12 m12 l12" action="{{ url('paymentCreditCard') }}" method="POST" id="card-form">
                                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                        <span class="errors"></span>
                                                                        <div class="row col s6 m6 l6">
                                                                                <label>
                                                                                        <span>Nombre del tarjetahabiente</span>
                                                                                        <input type="text" size="20" data-conekta="card[name]"/>
                                                                                </label>
                                                                        </div>
                                                                        <div class="row col s6 m6 l6">
                                                                                <label>
                                                                                        <span>Número de tarjeta de crédito</span>
                                                                                        <input type="text" size="20" data-conekta="card[number]"/>
                                                                                </label>
                                                                        </div>
                                                                        <div class="row col s4 m4 l4">
                                                                                <label>
                                                                                        <span>Código de Seguridad</span>
                                                                                        <input type="text" size="4" data-conekta="card[cvc]"/>
                                                                                </label>
                                                                        </div>
                                                                        <div class="row col s6 m6 l6">
                                                                                <div class="container">
                                                                                        <label class="col s12 m12 l12">
                                                                                                <span>Fecha de expiración (MM/AAAA)</span>
                                                                                        </label>
                                                                                        <input class="col m4 l4 s4" type="text" size="2" data-conekta="card[exp_month]"/>
                                                                                        <span class="col s2 m2 l2">/</span>
                                                                                        <input class="col m4 l4 s4" type="text" size="4" data-conekta="card[exp_year]"/>
                                                                                </div>
                                                                        </div>
                                                                        <div class="row col s6 m6 l6">
                                                                                <button type="submit">¡Pagar ahora!</button>
                                                                        </div>

                                                                </form>
                                                        </div>

                                                </div>
                                        </li>
                                        <li>
                                                <div class="collapsible-header"><i class="material-icons">place</i>PayPal</div>
                                                <div class="collapsible-body card-panel grey lighten-5">
                                                        <p>
                                                                pagar mediante cuenta de paypal
                                                        </p>
                                                        <p>
                                                        <form class="col s12 m12 L12" role="form" method="post" action="{{ url('Paypal') }}">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <div class="row" align="left">
                                                                        <button class="btn waves-effect waves-light" align="left" type="submit" name="action">Pagar via Paypal
                                                                                <i class="mdi-content-send right"></i>
                                                                        </button>
                                                                </div>
                                                        </form>
                                                        </p>
                                                </div>
                                        </li>
                                        <li>
                                                <div class="collapsible-header"><i class="material-icons">whatshot</i>Deposito Bancario</div>
                                                <div class="collapsible-body">
                                                        <p>
                                                                Lorem ipsum dolor sit amet.
                                                        </p>
                                                </div>
                                        </li>
                                </ul>


                        </div>

                        <div class="col s12 m6 l6">
                                <h3>Descripción</h3>
                                <div class="row">
                                        <div class="col s12 m6 l6">
                                                <div class="card blue-grey darken-1">
                                                        <div class="card-content white-text">
                                                                <span class="card-title">Card Title</span>
                                                                <p>I am a very simple card. I am good at containing small bits of information.
                                                                        I am convenient because I require little markup to use effectively.</p>
                                                        </div>
                                                        <div class="card-action">
                                                                <a href="#">This is a link</a>
                                                                <a href="#">This is a link</a>
                                                        </div>
                                                </div>
                                        </div>
                                </div>



                        </div>

                </div>
        </div>
@endsection
@section('scripts')
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript" src="https://conektaapi.s3.amazonaws.com/v0.3.2/js/conekta.js"></script>
        <script type="text/javascript">
                // Conekta Public Key
                Conekta.setPublishableKey('key_LwZyqNbCxvgSSqWydHQCHrA');
                // ...
                jQuery(function($) {

                        var conektaSuccessResponseHandler;
                        conektaSuccessResponseHandler = function(token) {
                                var $form;
                                $form = $("#card-form");

                                /* Inserta el token_id en la forma para que se envíe al servidor */
                                $form.append($("<input type=\"hidden\" name=\"conektaTokenId\" />").val(token.id));

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

@endsection