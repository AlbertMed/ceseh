
<!DOCTYPE html>
<html lang="es"  ng-app="appLaravel"  ng-controller="carController">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title>CESEHSA | @yield('titulo')</title>

    {!! Html::style('css/estilos.css') !!}
 {{--    {!! Html::style('bower_components/bootstrap/dist/css/bootstrap.min.css') !!}
    {!! Html::style('bower_components/bootstrap-material-design/dist/css/material.min.css') !!}
    {!! Html::style('bower_components/bootstrap-material-design/dist/css/material-fullpalette.min.css') !!}
    {!! Html::style('bower_components/bootstrap-material-design/dist/css/ripples.min.css') !!} --}}
    {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css') !!} 
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
  <li><a href="{!! url('/auth/login') !!}">Iniciar Sesión</a></li>
  <li><a href="{!! url('/auth/register') !!}">Registrate</a></li>
</ul>
<ul id="dropdown2" class="dropdown-content">
  <li><a ng-click="logout()" class="waves-effect waves-light " href="{!! url('/auth/logout') !!}">Cerrar Sesión</a></li>
</ul>

<nav>
  <div class="nav-wrapper">
    <a href="{!! url('/') !!}" class="brand-logo"><i class="material-icons right">business</i> &nbsp; Cesehsa</a>
    <ul class="right hide-on-med-and-down">

      

      <!-- Dropdown Trigger -->
        <li>
        	<a href="#"><i class="material-icons left">contact_phone</i>Contáctanos</a>
        </li>
        @if (Auth::guest()) 
		        <li>
		         <a class="dropdown-button" href="#" data-activates="dropdown1"> <i class="material-icons left">person_pin</i>Invitado<i class="material-icons right">arrow_drop_down</i>
		         </a>
		       </li>	
		@else
		        <li>
		        	<a href="{!! url('home/datos/info/'.csrf_token().'/='.Auth::user()->email) !!}"><i class="material-icons left">contacts</i>Mis datos</a>
		        </li>
		        <li>
		        	<a class="badge" href="{!! url('productos/carrito/items/'.csrf_token().'/='.Auth::user()->email) !!}">

		        	
		        	<% carr %> Producto(s)

		        	<i class="large material-icons left ">shopping_cart</i>
		        	</a>
		        	
		        </li>
		        
				<li>
                 <a class="dropdown-button" href="#" data-activates="dropdown2"> <i class="material-icons left">person_pin</i>{{ Auth::user()->nombre }} <i class="material-icons right">arrow_drop_down</i>
                 </a>
               </li>
		@endif
    </ul>
  </div>
</nav>
	@yield('content')

	<!-- Scripts
	{!! Html::script('bower_components/jquery/dist/jquery.min.js') !!}
	{!! Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js') !!}
    {!! Html::script('bower_components/bootstrap-material-design/dist/js/ripples.min.js') !!}
	{!! Html::script('bower_components/bootstrap-material-design/dist/js/material.min.js') !!}
	-->
	<!-- Compiled and minified JavaScript -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
     {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js') !!}

      <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.6/angular.min.js"></script>
	<script>
      
     $(document).on('ready', function(){
    $(".dropdown-button").dropdown();
     });

     var sampleApp = angular.module('appLaravel',[], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });

     function carController($scope) {
    
   
   $scope.carr = localStorage.getItem('c');
    $scope.add = function() {

    	if( ! isNaN(Number($scope.newitem)) && (Number($scope.newitem) != null )) {
         $scope.carr = Number (localStorage.getItem('c')) + Number($scope.newitem);		
		 localStorage.setItem('c',$scope.carr);
}
       
       
    }

    $scope.logout = function(){
    	localStorage.removeItem('c');    	
    }
}

	</script>
	
@yield('scripts')
</body>
</html>
