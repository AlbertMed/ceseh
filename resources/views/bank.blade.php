@extends('app')
@section('titulo')
    Contacto
@endsection
@section('content')
    <br>

    <br><br>

    <div class="container">
        <div class="row">
            <div class="card-panel">


                @if($errors->any())

                    <div class="row">
                        <div class="card-panel red lighten-3 col s12" >
                            <p>Revisa los Errores:</p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li><span class="red-text text-darken-1">{{ $error }}</span></li>
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

                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="">
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
@endsection