@extends('app')
@section('titulo')
  Test
@endsection
@section('content')
	<body>
	<div class="container">
		<div class="card-panel margintop">
			<div class="row valign-wrapper">
				<div class="col m5 offset-m1">
					<img class="margintop avatar materialboxed hoverable" data-caption="Codigo: "
						 width="350" height="350" src="http://www.ar.all.biz/img/ar/catalog/52062.jpeg">
				</div>
				<div class="col m flow-text">
					<p  class="center-align">
                        <h3>202-U</h3>
					<h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aspernatur aut corporis deserunt</h6>
					</p>
					<p>
						<h5>Disponibles: 6 piezas</h5>
					    <h4>Precio: $100 MX</h4>
					</p>

					<div class="row">
						<div class="col m7 input-field ">
							<a  class="waves-effect waves-light btn-large"><i class="left mdi-action-add-shopping-cart"></i>Agregar</a>
						</div>
                        <div class="col m4 input-field ">
							<label>Cantidad:</label>
							{!!Form::input('number','number','1', ['max' => 10, 'min' => '1']) !!}
						</div>
					</div>
					<p>
						<h5>Detalles</h5>
					<h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore doloremque
						expedita impedit in perferendis quia ratione rerum! Amet cupiditate deserunt
						dolore enim fugit labore optio placeat quas, ratione vero voluptate.</h6>
					</p>

				</div>
			</div>
		</div>
	</div>
	</body>
@endsection