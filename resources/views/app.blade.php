
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title>CESEHSA | @yield('titulo')</title>
   
      
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
  <li>
   <a class= "text_b" href="{!! url('home/datos/info/'.Auth::user()->email) !!}"><i class="material-icons left white-text">contacts</i>Mis datos</a>
  </li>
</ul>
<ul id="dropdown2" class="dropdown-content">
<li class="divider"></li>
  <li><a class="waves-effect waves-light " href="{!! url('/auth/logout') !!}">Cerrar Sesión</a></li>
</ul>

<!--Navigation-->
 <div class="navbar-fixed">

    <nav id="nav_f" class="default_color" role="navigation">    		         
        <div class="container">
            <div class="nav-wrapper">
           <a href="/" class="text_b">
             <div id="mifondo">
            <img  style="width:55%; max-height:55%" src="/img/logo/logocesehsa.png" alt="">           	
            </div> 
           </a>                   
          
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
		        	<a class="text_b" href="{!! url('productos/carrito/items/'.Auth::user()->email) !!}"><i class="material-icons left white-text">shopping_cart</i>
		        	
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
  
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="/js/plugin-min.js"></script>  
  <script src="js/custom-min.js"></script>
 
<script>
      
     $(document).on('ready', function(){
    $(".dropdown-button").dropdown();
     $('.slider').slider();
     });

	</script>
	

@yield('scripts')
    </body>
</html>


