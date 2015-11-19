@extends('app')
@section('titulo')
    Carrito
@endsection

@section('content')

    <div class="row">
        <div class="col m10 offset-m1">
            <h3 class="center-align">Carrito de Compra - Lista de Productos</h3>
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
                <table class="responsive-table bordered hoverable highlight centered">
                    <thead>
                    <tr>
                        <th data-field="producto">Producto</th>
                        <th data-field="nombre">Nombre</th>
                        <th data-field="codigo">Código</th>
                        <th>Opciones</th>
                        <th data-field = "stock">Stock</th>
                        <th data-field="cantidad">Cantidad</th>
                        <th data-field="price">Precio/Unidad</th>
                        <th data-field="subtotal">Subtotal</th>

                    </tr>
                    </thead>

                    <tbody>
                    <?php $total = 0; ?>
                    @foreach($datos as $dato)
                        <tr>
                            <td>

                                <img class="responsive-img" style=" width: 50px; height: 50px;" src="/img/project1.jpg" alt="">

                            </td>

                            <td> {{$dato->ItemName}}</td>
                            <td> {{$dato->ItemCode}}</td>
                            <td>
                                <a class="btn-floating btn-xs waves-effect waves-light red darken-3"
                                   href="{!! url('deleteItem/'.Auth::user()->email.'/'.$dato->ItemCode.'/'.csrf_token()) !!}">
                                    <i class="material-icons">delete</i>
                                </a>

                                <a class="btn-floating btn-xs waves-effect waves-light red"
                                   href="{!! url('updatecantidad/'.$dato->ItemCode.'/-1') !!}">
                                    <i class="mdi-content-remove"></i>
                                </a>

                                <a class="btn-floating btn-xs waves-effect waves-light green"
                                   href="{!! url('updatecantidad/'.$dato->ItemCode.'/1') !!}">
                                    <i class="material-icons">add</i>
                                </a>
                            </td>
                            <td> {{$dato->stock}}</td>
                            <td> {{$dato->cantidad}}</td>
                            <td> {{$dato->precio}}</td>
                            <td> {{$dato->cantidad * $dato->precio}}</td>

                        </tr>
                        <?php $total = $total + ($dato->cantidad * $dato->precio); ?>
                    @endforeach


                    </tbody>

                </table>

                <div class="row">

                    <div class=" right-align col m12">
                        <div class="card-panel green lighten-3"><h6>Total: {{$total}} PMX</h6></div>

                        <p>
                            <a class="waves-effect waves-light btn-large"  href="{!! url('/#marcas') !!}"><i class="material-icons left">shopping_cart</i>Regresar</a>

                            <a onclick="Materialize.toast('Estamos Ahora haciendo su Cotización', 4000, 'rounded')" href="{!! url('/cotizacion') !!}" class="waves-effect waves-light btn-large right-align" role="button"><i class="material-icons left">assignment</i>Enviarme Cotización</a>

                            <a class="waves-effect waves-light btn-large green "  href="{!! url('compra/check_info') !!}"><i class="material-icons left">done_all</i>Comprar</a>
                        </p>
                    </div>

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
    </div>
@endsection
