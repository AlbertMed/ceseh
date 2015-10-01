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
      <br><br><br><br><br><br><br>
        <div>
            <ul class="collapsible" data-collapsible="accordion">
                <li>
                    <div class="collapsible-header active"><i class="material-icons"></i>Marcas</div>
                    <div class="collapsible-body">

                        <ul class="collection">
                            <?php $array_C = array_slice($categoria,0,10); ?>
                            @foreach($array_C as $categorias)
                                <a href="{!! url('productos/'.$categorias->Marca) !!}" class="collection-item">{{$categorias->Marca}}<span class="badge">></span></a>
                            @endforeach
                        </ul>

                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons"></i>Más Marcas</div>
                    <div class="collapsible-body">

                        <!--ul class="collection">
                            <?php $array_C = array_slice($categoria,10); ?>
                            @foreach($array_C as $categorias)
                                <a href="{!! url('productos/'.$categorias->Marca) !!}" class="collection-item">{{$categorias->Marca}}<span class="badge">></span></a>
                            @endforeach
                        </ul -->

                    </div>
                </li>
            </ul>
        </div>
    </div><!-- no tocar este div -->

    <div class="col s12 m8 l7"> <!-- Note that "m8 l9" was added -->
        <!-- Teal page content
          This content will be:
          9-columns-wide on large screens,
          8-columns-wide on medium screens,
          12-columns-wide on small screens  -->
          <br><br>
          <div class="row">
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
<div class="section scrollspy" id="team">
    <div class="container">
        <h2 class="header text_b"> Más Vendidos  </h2>
        <div class="row">
            @foreach ($vendidos as $vende)
            <?php  
                $data =utf8_decode($vende->ItemCode);
                $codes = preg_replace('/[^,\sA-Za-z0-9.-]/','',$data);
                              
            ?>
            <div class="col s12 m3">
                <div class="card card-avatar small grey lighten-2">
                    <div class="waves-effect waves-block waves-light">
                        <img class="activator" src="{{$vende->image_url}}">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">{{$vende->ItemName}}<br/>
                        <div class="card-content">
                                <p></p>
                        </div>
                            </span>
                       
                    </div>
                </div>
            </div>
             @endforeach    
        </div>
    </div>
</div>
            

@endsection



