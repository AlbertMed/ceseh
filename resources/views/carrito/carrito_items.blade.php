@extends('app')
@section('titulo')
    Carrito
@endsection

@section('content')

    <div class="row">
        <div class="col s12 m7 offset-m1">
            <!-- <h3 class="center-align">Carrito de Compra - Lista de Productos</h3> -->
            <p style="white-space: pre-line"></p><br>
            @if (count($errors) > 0)
                <div class="alert alert-danger text-center">
                    @foreach($errors->getMessages() as $this_error)
                        <strong>¡Lo sentimos!  &nbsp; {{$this_error[0]}}</strong><br>
                    @endforeach
                </div>
            @elseif(Session::has('mensaje'))
                <div class="row">
                    <div class="card-panel teal lighten-2  col s12" >
                        <ul>
                            <li><span class="teal-text text-lighten-5">{{ Session::get('mensaje') }}</span></li>
                        </ul>
                    </div>
                </div>
            @endif
            @if(count($datos) > 0)

                <table class="responsive-table bordered hoverable">
                    <thead>
                    <tr style="color: #333333">
                        <th data-field="producto" class="center-align"  >Producto</th>
                        <th data-field="nombre">Nombre / Descripción</th>
                        <th data-field = "stock" class="center-align">Disponibles</th>
                        <th data-field="cantidad" class="center-align">Cantidad</th>
                        <th class="center-align">Opciones</th>
                        <th data-field="subtotal" class="center-align">Sub Total</th>

                    </tr>
                    </thead>

                    <tbody>
                    <?php $total = 0; ?>
                    @foreach($datos as $dato)
                        <tr>
                            <td align="center">

                                <img class="responsive-img" style=" width: 80px; height: 80px;"

                                     src="/img/project1.jpg" alt="">

                            </td>

                            <td><h5 style="white-space: pre-wrap; color: #43B02A;">{{$dato->ItemCode}}</h5>
                                <h6 style="color: #43B02A">{{$dato->ItemName}}</h6> <br>
                                    Precio sin iva: ${{number_format($dato->precio,2,'.',',')}} mx/pieza</td>


                            <td class="center-align"> <h6>{{$dato->stock}}</h6></td>
                            <td class="center-align"> <h6>{{$dato->cantidad}}</h6></td>
                            <td class="center-align">
                                <a class="btn-floating btn-xs waves-effect waves-light" style="background-color: #c6c6c5"
                                   href="{!! url('updatecantidad/'.$dato->ItemCode.'/1') !!}">
                                    <i class="material-icons green-text">add</i>
                                </a>
                                <p style="white-space: pre-wrap"></p>
                                <a class="btn-floating btn-xs waves-effect waves-light" style="background-color: #c6c6c5"
                                   href="{!! url('updatecantidad/'.$dato->ItemCode.'/-1') !!}">
                                    <i class="mdi-content-remove red-text"></i>
                                </a>
                                <p style="white-space: pre-wrap"></p>
                                <a  class="btn-floating btn-xs waves-effect waves-light" style="background-color: #c6c6c5"
                                    href="{!! url('deleteItem/'.Auth::user()->email.'/'.$dato->ItemCode.'/'.csrf_token()) !!}">
                                    <i class="material-icons grey-text">delete</i>
                                </a>
                            </td>
                            <td  style="color: #43B02A" class="center-align"> <strong>
                                    ${{number_format(($dato->cantidad * $dato->precio),2,'.',',')}}</strong></td>

                        </tr>
                              <?php $total = $total + ($dato->cantidad * $dato->precio); ?>
                    @endforeach


                    </tbody>

                </table>

        </div>

                    <div class="col s12 m3 ">
                        <p style="white-space: pre-line"></p><br>
                        <div class="card" style="background-color: #f5f5f5"> <!-- EFEEEE -->

                            <table>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <div  class="card-title">

                                        <td  style="background-color: #c6c6c5; text-align: center;" class="white-text">
                                            <strong>Resumen de la orden de compra</strong>
                                        </td>
                                    </div>
                                </tr>
                            </table>
                            <div class="card-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col m6">
                                            <p>
                                                Subtotal: <br>
                                                Envio: <br>
                                                IVA:
                                            </p>
                                            <p style="margin-top: 15px"><strong>Total:</strong></p>
                                        </div>
                                        <div class="col m6">
                                            <p>
                                                <?php
                                                    $envio = 100.0;
                                                    $iva = 10.0;
                                                    $total2 = $total+$envio+$iva;
                                                ?>
                                                $ {{number_format($total,2,'.',',')}} <br>
                                                $ {{number_format($envio,2,'.',',')}} <br>
                                                $ {{number_format($iva,2,'.',',')}}
                                            </p>
                                            <p style="color: #43B02A; margin-top: 15px">$ {{number_format($total2,2,'.',',')}}</p>
                                        </div>
                                    </div>
                                </div>
                                <p style="font-size: xx-small">La disponibilidad, impuestos y promociones no son definitivos hasta que completes tu compra.</p>
                                <br>
                                <hr>
                                <br>
                                <div>
                                    <div class="row">
                                        <div class="col m6">
                                            <a class="waves-effect waves-light btn"  href="{!! url('/#marcas') !!}" style="background-color: #43B02A">Atras</a>
                                        </div>
                                        <div class="col m6">
                                            <a style="background-color: #43B02A; margin-left: -15px"
                                               class="waves-effect waves-light btn "  href="{!! url('compra/check_info') !!}">Comprar</a>
                                        </div>
                                        <div class="col m12" style="margin-top: 15px">
                                            <a style=" background-color: #29235c" onclick="Materialize.toast('Estamos Ahora haciendo su Cotización', 4000, 'rounded')"
                                               href="{!! url('/cotizacion') !!}" class="waves-effect waves-light btn" role="button">Email Cotización</a>
                                        </div>
                                    </div>
                                </div>
                                <p>




                                </p>
                            </div>
                        </div>




                    </div>

                <div class="row">
                    @else
                        <div class="card-panel green lighten-3">
                            <h4>Tu Carrito esta Vacío</h4>
                        </div>
                        <div class="col m12 right-align">

                            <p><a class="waves-effect waves-light btn-large"  href="{!! url('/#marcas') !!}"><i class="material-icons left">shopping_cart</i>Regresar</a></p>
                        </div>
                    @endif
                </div>



    </div>
@endsection
