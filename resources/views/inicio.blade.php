@extends('app')
@section('titulo')
  Home
@endsection
@section('content')
<div id="intro" class="section scrollspy">
    <div class="container">
      <h2 class="center header text_h2"><p>Esta parte es para Julio / Eslogan</p></h2>
    </div>
</div>

<!--Work-->
<div class="section scrollspy" id="work">
    <div class="container">
        <h2 class="header text_b">Más Vendidos</h2>
        <div class="row">
            <div class="col s12 m4 l4">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="img/project1.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nombre de Producto <i class="mdi-navigation-more-vert right"></i></span>
                        <p><a href="#">Detalles</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Nombre de Producto <i class="mdi-navigation-close right"></i></span>
                        <p>Precio, Stok, etc..</p>
                    </div>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="img/project2.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nombre de Producto <i class="mdi-navigation-more-vert right"></i></span>
                        <p><a href="#">Detalles</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Nombre de Producto <i class="mdi-navigation-close right"></i></span>
                        <p>Precio, Stok, etc..</p>
                    </div>
                    
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="img/project3.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nombre de Producto <i class="mdi-navigation-more-vert right"></i></span>
                        <p><a href="#">Detalles</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Nombre de Producto <i class="mdi-navigation-close right"></i></span>
                        <p>Precio, Stok, etc..</p>
                    </div>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="img/project4.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nombre de Producto <i class="mdi-navigation-more-vert right"></i></span>
                        <p><a href="#">Detalles</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Nombre de Producto <i class="mdi-navigation-close right"></i></span>
                        <p>Precio, Stok, etc..</p>
                    </div>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="img/project5.jpg">
                    </div>
                     <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nombre de Producto <i class="mdi-navigation-more-vert right"></i></span>
                        <p><a href="#">Detalles</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Nombre de Producto <i class="mdi-navigation-close right"></i></span>
                        <p>Precio, Stok, etc..</p>
                    </div>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="img/project6.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nombre de Producto <i class="mdi-navigation-more-vert right"></i></span>
                        <p><a href="#">Detalles</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Nombre de Producto <i class="mdi-navigation-close right"></i></span>
                        <p>Precio, Stok, etc..</p>
                    </div>
                 </div>
             
            </div>
        </div>
    </div>
</div>

<!--Parallax-->
<div class="parallax-container">
    <div class="parallax"><img src="http://cesehsa.com.mx/cesehsa/wp-content/uploads/2013/06/aplicacion-clamp-manual-opt.jpg"></div>
</div>

<!--Team-->
<div class="section scrollspy" id="team">
    <div class="container">
        <h2 class="header text_b"> Marcas / División </h2>
        <div class="row">
             @foreach($categorias as $dato)
            <div class="col s12 m3">
                <div class="card card-avatar">
                    <div class="waves-effect waves-block waves-light">
                        <img class="activator" src="http://www.nocturnar.com/forum/attachments/fondos-de-pantalla/28575d1338158805-paisajes-hermosos-fondo-de-pantalla-paisajes_hermosos_del_mundo2.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">{{$dato->SubMarca}}<br/>
                        <div class="card-content">
					            <p>Descripción</p>
					            </div>
                            <small><em><a class="green-text text-darken-1" href="{!! url('productos/'.$dato->SubMarca) !!}">Ver más</a></em></small></span>
                       
                    </div>
                </div>
            </div>
             @endforeach	
        </div>
    </div>
</div>
@endsection



