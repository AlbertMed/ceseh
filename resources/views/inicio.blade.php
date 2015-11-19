@extends('app')
@section('titulo')
  Home
@endsection
@section('content')

<div class="row">

    <div class="col s12 m4 l3"> <!-- Note that "m4 l3" was added -->
        <!-- Grey navigation panel
          This content will be:
          3-columns-wide on large screens,
          4-columns-wide on medium screens,
          12-columns-wide on small screens  -->
      <br><br><br><br><br><br>
        @include('includes.menu')
    </div><!-- no tocar este div -->

    <div class="col s12 m8 l7"> <!-- Note that "m8 l9" was added -->
        <!-- Teal page content
          This content will be:
          9-columns-wide on large screens,
          8-columns-wide on medium screens,
          12-columns-wide on small screens  -->
          <br>
          <div class="row">
              @if(Session::has('add'))
              <div class="card-panel teal lighten-2">
                      <p>{{Session::get('add')}}</p>
              </div>
                  {{Session::forget('add')}}
              @endif
                <div class="jumbotron">
                    <h2>Productos Destacados</h2>
                </div>
               <div class="slider">
                   <ul class="slides">
                    <li>
                               {!! Html::image("/img/logo/Aniv-25-01.jpg") !!} <!-- random image -->
                                <div class="caption center-align" alt="Smiley face" height="42" width="42">
                                   
                                </div>
                          </li>
                       @foreach ($vistos as $visto)
                           <?php
                                $data = utf8_decode($visto->ItemCode);
                                $code = preg_replace('/[^,\sA-Za-z0-9.-]/','',$data);

                            ?>
                            <li>

                                {!! Html::image($visto->image_url) !!} <!-- random image -->
                                <div class="caption center-align" alt="Smiley face" height="42" width="42">
                                    <h3>{{$visto->ItemName}}!</h3>
                                    <h5 class="light grey-text text-lighten-3">Gran Valor</h5>
                                    <h5 class="light grey-text text-lighten-3">{{$visto->ItemCode}}</h5>
                                    <div class="card-action">
                                        <a href="{!! url('productos/'.$visto->SubMarca.'/datos/'.$code) !!}" >Ver Detalles</a>
                                    </div>
                                </div>
                          </li>
                         
                       @endforeach
                   </ul>
              </div>
          </div>
    </div><!-- no tocar este div -->
</div>

<hr>
<!-- section of produts most buyed -->
<br><br><br>

 <!--Team-->
<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="jumbotron">
                <h2>Más Vendidos</h2>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-body">
                        <div class="row">
                            @foreach ($vendidos as $vende)
                                <?php

                                $data =utf8_decode($vende->ItemCode);
                                $codes = preg_replace('/[^,\sA-Za-z0-9.-]/','',$data);

                                ?>
                                    <div class="col s6 m3 l3">
                                        <div class="card small grey lighten-2 z-depth-5">
                                            <div class="card-image circle responsive-img">
                                                <img class="circle responsive-img" src="{{$vende->image_url}}">
                                            </div>
                                            <div class="card-content">
                                                <p>{{$vende->ItemName}}</p>
                                            </div>
                                            <div class="card-action">
                                                <a href="{!! url('productos/'.$vende->SubMarca.'/datos/'.$codes) !!}">Ver
                                                    Detalles</a>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            

@endsection



