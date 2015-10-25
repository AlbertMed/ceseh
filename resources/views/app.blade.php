
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>CESEHSA | @yield('titulo')</title>


    <!-- {!! Html::style('css/plugin-min.css')!!} -->
    {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css')!!}
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

</head>

<body id="top" class="scrollspy" >

<!-- Dropdown Structure -->
<ul id="dropdown_mobil" class="dropdown-content">
    <li>
        <a href="{!! url('/auth/login') !!}">
            Login</a>
    </li>

    <li>
        <a href="{!! url('/auth/register') !!}">
            Registrate</a>
    </li>
</ul>
<ul id="dropdown_desk" class="dropdown-content">
    <li>
        <a href="{!! url('/auth/login') !!}">
            <i class="material-icons left black-text">perm_identity</i>Login</a>
    </li>

    <li>
        <a href="{!! url('/auth/register') !!}">
            <i class="material-icons left black-text">description</i>Registrate</a>
    </li>
</ul>
<!--Navigation-->


<nav id="nav_f" class="lime lighten-5" role="navigation" >

    <div class="nav-wrapper">
        <a href="/" class="black-text">
            <div class="logo">
                <img  style="width:55%; max-height:55%" src="/img/logo/logocesehsa.png" alt="">
            </div>
        </a>


        <ul class="right hide-on-med-and-down">
            <li>
                <a href="{!! url('home/contacto') !!}" class="black-text"><i class="material-icons left black-text">contact_phone</i>Contáctanos</a>
            </li>
            @if (Auth::guest())
                <li>
                    <a class="dropdown-button black-text" href="#" data-activates="dropdown_desk"> <i class="material-icons left ">person_pin</i>Cuenta de Invitado
                    </a>
                </li>
            @else
                <ul id="dropdown_desk2" class="dropdown-content">
                    <li>
                        <a href="{!! url('home/datos/info/'.csrf_token().'/='.Auth::user()->email) !!}">
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
                    <a class="dropdown-button black-text" href="#" data-activates="dropdown_desk2"> <i class="material-icons left black-text">person_pin</i>{{ Auth::user()->nombre }} <i class="material-icons right black-text">arrow_drop_down</i>
                    </a>
                </li>
            @endif
        </ul>


        <!-- barra para mobil-->
        <ul id="nav-mobile" class="right side-nav">
            <li>
                <a href="{!! url('home/contacto') !!}" class="black-text">Contáctanos</a>
            </li>
            @if (Auth::guest())
                <li>
                    <a class="dropdown-button black-text" href="#" data-activates="dropdown_mobil">Cuenta de Invitado<i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
            @else
                <ul id="dropdown_mobil2" class="dropdown-content">
                    <li>
                        <a href="{!! url('home/datos/info/'.csrf_token().'/='.Auth::user()->email) !!}">
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


<div >
    <nav class="light-green darken-3 flat">
        <div class="nav-wrapper container">
            <form method="GET" action="{!! url('busqueda/datos') !!}">
                <div class="input-field">
                    <meta content="{!! url('busqueda/datos?search={search}') !!}" itemprop="terget"/>
                    <input id="search" name="search" type="search" required="" placeholder="Buscar...">
                    <label for="search"><i class="mdi-action-search"></i></label>

                </div>
            </form>
        </div>
    </nav>
</div>
@yield('content')


<br>
<div id="contact"></div>
<!--Footer-->
<footer  class="page-footer scrollspy lime lighten-5">
    <div class="container">
        <div class="row">

            <div class="col l3 s12">
                <h5 class="black-text">Toluca</h5>
                <ul>
                    <li>BAHIA DE TODOS LOS SANTOS #166 SANTA
                        ANA TLAPALTITLAN, TOLUCA EDO. DE MEXICO C.P. 50160</li>
                    <li>TEL: (722) 211 5701</li>
                    <li>e-mail: info@cesehsa.com.mx</li>
                </ul>
            </div>
            <div class="col l3 s12">
                <h5 class="black-text">Social</h5>
                <ul>

                    <li>
                        <a class="black-text" href="https://www.facebook.com/">
                            <i class="small fa fa-facebook-square black-text"></i> Facebook
                        </a>
                    </li>

                    <li>
                        <a class="black-text" href="https://www.linkedin.com/">
                            <i class="small fa fa-linkedin-square black-text"></i> Linkedin
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright light-green darken-3">
        <div class="container">
         <span class="white-text">
            2014  IngenieriaLigera
            </span>

            <ul class="black-text right">
                <li>
                    <img src="../payment/payment-amex.png" width="47" height="35">
                    <img src="../payment/payment-master.png" width="47" height="35">
                    <img src="../payment/payment-paypal.png" width="47" height="35">
                    <img src="../payment/payment-visa.png" width="47" height="35">
                </li>

            </ul>
        </div>
    </div>
</footer>
<!--  Scripts-->

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
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

    });

</script>


@yield('scripts')
</body>
</html>


