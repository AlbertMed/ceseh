
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title>CESEHSA | @yield('titulo')</title>

    {!! Html::style('') !!}
   
      
    {!! Html::style('css/plugin-min.css')!!}  
    {!! Html::style('css/custom-min.css')!!} 
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

<body id="top" class="scrollspy">

<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
  <li><a href="{!! url('/auth/login') !!}">Iniciar Sesión</a></li>
  <li><a href="{!! url('/auth/register') !!}">Registrate</a></li>
</ul>
<ul id="dropdown2" class="dropdown-content">
<li class="divider"></li>
  <li><a class="waves-effect waves-light " href="{!! url('/auth/logout') !!}">Cerrar Sesión</a></li>
</ul>

<!--Navigation-->
 <div class="navbar-fixed">

    <nav id="nav_f" class="default_color" role="navigation">
        <div class="container">
            <div class="nav-wrapper"><a id="logo-container" href="#top" class="brand-logo">Cesehsa</a>
            <ul id="nav-mobile" class="right side-nav">
                <li>
        	<a href="#contact" class="text_b"><i class="material-icons left white-text">contact_phone</i>Contáctanos</a>
        </li>
        @if (Auth::guest()) 
		        <li>
		         <a class="dropdown-button text_b" href="#" data-activates="dropdown1"> <i class="material-icons left white-text">person_pin</i>Invitado<i class="material-icons right">arrow_drop_down</i>
		         </a>
		       </li>	
		@else
		        <li>
		        	<a class= "text_b" href="{!! url('home/datos/info/'.csrf_token().'/='.Auth::user()->email) !!}"><i class="material-icons left white-text">contacts</i>Mis datos</a>
		        </li>
		        <li>
		        	<a class="text_b" href="{!! url('productos/carrito/items/'.csrf_token().'/='.Auth::user()->email) !!}"><i class="material-icons left white-text">shopping_cart</i>
		        	
		        	{{Session::get('cant')}} Producto(s)
		        	
		        	</a>
		        	
		        </li>
		        
				<li>
                 <a class="dropdown-button text_b" href="#" data-activates="dropdown2"> <i class="material-icons left white-text">person_pin</i>{{ Auth::user()->nombre }} <i class="material-icons right white-text">arrow_drop_down</i>
                 </a>
               </li>
		@endif
            </ul>

            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons ">view_headline</i></a>            
            </div>

        </div>
    </nav>


</div>
<div >
	<nav class="teal lighten-2 flat hide-on-med-and-down">
     <div class="nav-wrapper container">
        <form>
            <div class="input-field">
                <input id="search" type="search" required="">
                <label for="search"><i class="mdi-action-search"></i></label>
                
            </div>
        </form>    
    </div>
 </nav>
</div>
@yield('content')

<div id="contact"></div>
<!--Footer-->
<footer  class="page-footer default_color scrollspy">
    <div class="container">  
        <div class="row">
            <div class="col l6 s12">
                <form class="col s12" action="contact.php" method="post">
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="mdi-action-account-circle prefix white-text"></i>
                            <input id="icon_prefix" name="name" type="text" class="validate white-text">
                            <label for="icon_prefix" class="white-text">Nombre</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="mdi-communication-email prefix white-text"></i>
                            <input id="icon_email" name="email" type="email" class="validate white-text">
                            <label for="icon_email" class="white-text">Email</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="mdi-editor-mode-edit prefix white-text"></i>
                            <textarea id="icon_prefix2" name="message" class="materialize-textarea white-text"></textarea>
                            <label for="icon_prefix2" class="white-text">Mensaje</label>
                        </div>
                        <div class="col offset-s7 s5">
                            <button class="btn waves-effect waves-light darken-1" type="submit">Enviar
                                <i class="mdi-content-send right white-text"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Toluca</h5>
                <ul>
                    <li>BAHIA DE TODOS LOS SANTOS #166 SANTA
                        ANA TLAPALTITLAN, TOLUCA EDO. DE MEXICO C.P. 50160</li>
                    <li>TEL: (722) 211 5701</li>
                    <li>e-mail: info@cesehsa.com.mx</li>                    
                </ul>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Social</h5>
                <ul>
                   
                    <li>
                        <a class="white-text" href="https://www.facebook.com/">
                            <i class="small fa fa-facebook-square white-text"></i> Facebook
                        </a>
                    </li>
                   
                    <li>
                        <a class="white-text" href="https://www.linkedin.com/">
                            <i class="small fa fa-linkedin-square white-text"></i> Linkedin
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright white-text">
        <div class="container">
            IngenieriaLigera
        </div>
    </div>
</footer>
    <!--  Scripts-->     
  
  <script src="js/plugin-min.js"></script>
  <script src="js/custom-min.js"></script>
    
<script>
      
     $(document).on('ready', function(){
    $(".dropdown-button").dropdown();
     });

	</script>
	

@yield('scripts')
    </body>
</html>


