
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>CESEHSA | @yield('titulo')</title>

     {!! Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css')!!}
    {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.2/css/materialize.min.css')!!}
    {!!Html::style("https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css")!!}
            <!-- {!! Html::style('css/custom-min.css')!!} -->
    {!! Html::style('css/ingenieria-ligera.css')!!}
            <!-- Fonts -->
    {!! Html::style('https://fonts.googleapis.com/icon?family=Material+Icons')!!}
    {!! Html::style('//fonts.googleapis.com/css?family=Roboto:400,300')!!}

            <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .hr {border: 0; height: 2px; text-align: center; background-color: #EFEEEE;}
        .margintop {
            margin-top: 2em;
        }
        .avatar {
            /* los siguientes valores son independientes del tamaño del círculo */
            background-repeat: no-repeat;
            background-position: 50%;
            border-radius: 5%;
            background-size: 100% auto;
        }
        .search {
            position: relative;
            color: #aaa;
            font-size: 16px;
        }

        .search input {
            width: 250px;
            height: 32px;

            background: #fcfcfc;
            border: 1px solid #aaa;
            border-radius: 5px;
            box-shadow: 0 0 3px #ccc, 0 10px 15px #ebebeb inset;
        }

        .search input { text-indent: 32px;}
        .search .fa-search {
            position: absolute;
            top: 10px;
            left: 10px;
        }
        .search .fa-user {
            position: absolute;
            top: 23px;
            left: 10px;
        }
        .search .fa-lock {
            position: absolute;
            top: 23px;
            left: 10px;
        }
    </style>
</head>

<body id="top" class="scrollspy" >

<!-- Dropdown Structure -->
<ul id="dropdown_mobil" class="dropdown-content">
    <li>
        <a href="{!! url('/auth/login') !!}">Login</a>
    </li>

    <li>
        <a href="{!! url('/auth/register') !!}">
            Registrate</a>
    </li>
</ul>
<ul id="dropdown_desk" class="dropdown-content">

</ul>
<!--Navigation-->

<!-- Barra para escritorio-->
<div class="navbar-fixed ">
    <nav id="nav_f" style="background-color: #e5e5e5" role="navigation" >

        <div class="nav-wrapper">
            <a href="/" class="black-text">
                <div class="logo">
                    <img  style="width:55%; max-height:55%; margin-top: -7%" src="/img/logo/logocesehsa.png" alt="">
                </div>
            </a>

            <div style="width: 90%">

                <ul class="right hide-on-med-and-down ">
                    @if (Auth::guest())


                        {!! Form::open(['url'=>'auth/login', 'role'=>'form']) !!}
                            <li style="background-color: transparent; ">
                            <div class="search" >
                                    <span  class="fa fa-user"></span>
                                    <input style="height: 40px;  width: 250px; font-size: medium;" id="search" name="email"  type="email"  placeholder="Usuario">

                                </div>
                            </li>

                            <li style="background-color: transparent; margin-left: 10px">
                            <div class="search" >
                                <span  class="fa fa-lock"></span>
                                <input style="height: 40px;  width: 150px; font-size: medium;" id="search" name="password" type="password"  placeholder="Contraseña">

                            </div>
                            </li>
                            <li style="background-color: transparent; margin-left: 10px">
                                <div class="" >
                                    <button type="submit" class="btn grey darken-1">Entrar</button>

                                </div>
                            </li>
                        {!! Form::close() !!}
                        <li style="background-color: transparent; margin-left: 10px">
                            <div class="" >
                                <a href="{!! url('/auth/register') !!}" type="button" class="btn waves-light grey darken-1">Registro</a>

                            </div>
                        </li>



                    @else
                        <ul id="dropdown_desk2" class="dropdown-content">
                            <li>
                                <a href="{!! url('home/perfil') !!}">
                                    <i class="material-icons left black-text">contacts</i>Mi Perfil</a>
                            </li>

                            <li class="divider"></li>

                            <li>
                                <a href="{!! url('/auth/logout') !!}">
                                    <i class="material-icons left black-text">lock_outline</i>Salir</a>
                            </li>
                        </ul>
                        <li>
                            <a class="black-text" href="{!! url('productos/carrito/items/'.Auth::user()->email) !!}">
                                <i class="material-icons left black-text">shopping_cart</i>

                                {{Session::get('cant')}} Producto(s)

                            </a>

                        </li>

                        <li>
                            <a class="dropdown-button black-text" href="#" data-activates="dropdown_desk2">
                                <i class="material-icons left black-text">person_pin</i>{{ Auth::user()->nombre }}
                            </a>
                        </li>
                    @endif
                </ul>
            </div>

            <!-- barra para mobil-->
            <ul id="nav-mobile" class="right side-nav">

                @if (Auth::guest())
                    <li>
                        <a class="dropdown-button black-text" href="#" data-activates="dropdown_mobil"><i class="material-icons right">arrow_drop_down</i>
                            Inicio de Sesión
                        </a>
                    </li>
                @else
                    <ul id="dropdown_mobil2" class="dropdown-content">
                        <li>
                            <a href="{!! url('home/perfil') !!}">
                                <i class="material-icons left black-text">contacts</i>Mi Perfil</a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="{!! url('/auth/logout') !!}">
                                <i class="material-icons left black-text">lock_outline</i>Salir</a>
                        </li>
                    </ul>
                    <li>
                        <a class="black-text" href="{!! url('productos/carrito/items/'.Auth::user()->email) !!}"><i class="material-icons left black-text">shopping_cart</i>

                            {{Session::get('cant')}} Producto(s)

                        </a>

                    </li>

                    <li>
                        <a class="dropdown-button black-text" href="#" data-activates="dropdown_mobil2"> <i class="material-icons left black-text">person_pin</i>{{ Auth::user()->nombre }} <i class="material-icons right black-text">arrow_drop_down</i>
                        </a>
                    </li>
                @endif
            </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse black-text"><i class="material-icons ">view_headline</i></a>
        </div>

    </nav>
</div>

<div class="fixed">
    <nav class=" " style="height: 50px; background-color: #EFEEEE">
        <div class="nav-wrapper container valign-wrapper">

            <form method="GET" action="{!! url('busqueda/datos') !!}">
                <div class="search" >
                    <meta content="{!! url('busqueda/datos?search={search}') !!}" itemprop="terget"/>
                    <span style="margin-top: 14px;" class="fa fa-search"></span>
                    <input style="height: 40px;  width: 400px; font-size: medium;" id="search" name="search" type="" required="" placeholder="Encuentra lo que buscas"> 
                </div>
            </form>
            <p style="margin-left:200px; color: black; margin-top: 2%"><strong>LLAMA GRATIS AL 01 800 - 2373472</strong></p>
        </div>
    </nav>
</div>
@if (count($errors) > 0)
    <div class="">
        <div class="container">
        <div class="col-md-6 col-md-offset-5">
            <div class="card grey lighten-5" style="z-index: 1; position: absolute;">
                <div class="card-content red-text">

                    <p>!Lo sentimos¡ El usuario o contraseña son incorrectos</p>
                </div>
                <div class="grey-text">
                    <p>
                    <a style="color: gray; margin-left: 10px" href="{!! url('/password/email') !!}">Recuperar contraseña</a>
                    </p>
                </div>
            </div>
        </div>
        </div>
    </div>
@endif
@yield('content')
<div class="vFlotante">
    <hgroup style="display:inline-block;">
        <h5 class="titulo">Social</h5>
    </hgroup>
    <p style="display:inline-block;">información</p>
</div>

<br>
<div id="contact"></div>
<!--Footer-->
<footer  class="page-footer" style="background-color: transparent">
    <div class="fixed">
        <nav role="" style="background-color: #ececec" >
            <div style="margin-left: 12%">
<div class="row">
    <ul class="">

        <li>
            <a href="{!! url('/') !!}" class="black-text">
                HISTORIA</a>
        </li>
        <li>
            <a href="{!! url('/') !!}" class="black-text">
                MAYOREO</a>
        </li>
        <li>
            <a href="{!! url('/') !!}" class="black-text">
                POLÍTICAS</a>
        </li>
        <li>
            <a href="{!! url('/') !!}" class="black-text">
                FACTURAS</a>
        </li>
        <li>
            <a href="{!! url('/') !!}" class="black-text">
                ¿CÓMO COMPRAR?</a>
        </li>
        <li>
            <a href="{!! url('/') !!}" class="black-text">
                CONTÁCTANOS</a>
        </li>
        <li>
            <a href="{!! url('/') !!}" class="black-text">
                <i class=" medium material-icons left black-text">call</i> 01 800 - 2373472</a>
        </li>
    </ul>
</div>
            </div>
        </nav>
    </div>

</footer>
<!--  Scripts-->

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.2/js/materialize.min.js"></script>

<!-- <script type="text/javascript" src="/js/plugin-min.js"></script>  -->
<!-- <script src="js/custom-min.js"></script> -->

<script>

    $(document).on('ready', function(){
        $(".dropdown-button").dropdown(
                { belowOrigin: true,}
        );
        $('.slider').slider();
        $('.modal-trigger').leanModal();
        $(".button-collapse").sideNav();
        $('select').material_select();
        $('.tooltipped').tooltip({delay: 50});
    });

</script>


@yield('scripts')
</body>
</html>


