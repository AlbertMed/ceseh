<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>CESEHSA | @yield('titulo')</title>

    @yield('estilos')

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

    -->
</head>
<body>
    <div class="row">
        <div class="container">
            <div class="col s12 m8 offset-m2 l6 offset-l3">
                <div class="card-panel grey lighten-5 z-depth-1">
                    <div class="row valign-wrapper">
                        <div class="col s12">
                            <div class="row">
                                <strong>¡Comprobante pago!</strong>
                                Código de Socio de negocio: {{" ".$sapUser}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <br>
        </body>
</html>