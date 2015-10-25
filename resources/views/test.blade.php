<html>
	<head>
		 {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css')!!} 
    <!-- {!! Html::style('css/custom-min.css')!!} --> 

	<!-- Fonts -->	
	{!! Html::style('https://fonts.googleapis.com/icon?family=Material+Icons')!!}   
	{!! Html::style('//fonts.googleapis.com/css?family=Roboto:400,300')!!}
	{!! Html::style('css/ingenieria-ligera.css')!!}

	</head>
	<body>
		
     <!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
  <li><a href="#!">one</a></li>
  <li><a href="#!">two</a></li>
  <li class="divider"></li>
  <li><a href="#!">three</a></li>
</ul>



<nav>
    <div class="nav-wrapper">
      <div class="logo">
      	<img  style="width:55%; max-height:55%" src="/img/logo/logocesehsa.png" alt="">
      </div>

    <ul class="right hide-on-med-and-down">
      <li><a href="sass.html">Sass</a></li>
      <li><a href="badges.html">Components</a></li>
      <!-- Dropdown Trigger -->
      <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Dropdown<i class="material-icons right">arrow_drop_down</i></a></li>
    </ul>
    </div>
</nav>
           <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script> 
 <!-- <script type="text/javascript" src="/js/plugin-min.js"></script>  -->
 <!-- <script src="js/custom-min.js"></script> -->
 
<script>
      
     $(document).on('ready', function(){
       $(".dropdown-button").dropdown();
       $('.slider').slider();             
       $('.modal-trigger').leanModal();
 

     });  

	</script>
	
	</body>
</html>





<nav id="nav_f" class="lime lighten-5" role="navigation" >

    <div class="nav-wrapper">
        <a href="/" class="text_b">
            <div class="logo">
                <img  style="width:55%; max-height:55%" src="/img/logo/logocesehsa.png" alt="">
            </div>
        </a>


        <ul id="nav-mobile" class="right side-nav">
            <li>
                <a href="{!! url('home/contacto') !!}" class="text_b"><i class="material-icons left white-text">contact_phone</i>Contáctanos</a>
            </li>
            @if (Auth::guest())
                <li>
                    <a class="dropdown-button text_b" href="#" data-activates="dropdown1"> <i class="material-icons left white-text">person_pin</i>Invitado<i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
            @else
                <ul id="dropdown2" class="dropdown-content">
                    <li>
                        <a href="{!! url('home/datos/info/'.csrf_token().'/='.Auth::user()->email) !!}">
                            <i class="material-icons left white-text">contacts</i>Mi Perfil</a>
                    </li>

                    <li class="divider"></li>

                    <li>
                        <a href="{!! url('/auth/logout') !!}">
                            <i class="material-icons left white-text">lock_outline</i>Cerrar Sesión</a>
                    </li>
                </ul>
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


</nav>
