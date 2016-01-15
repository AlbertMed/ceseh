@extends('app')
@section('titulo')
	Datos Cliente
@endsection
@section('content')
	<div class="container">
	@if($errors->any())
			<div class="row">
				<div class="card-panel red lighten-3 col s12" >
					<p>Revisa los Errores:</p>
					<ul>
						@foreach ($errors->all() as $error)
							<li><span class="red-text text-darken-1">{{ $error }}</span></li>
						@endforeach
					</ul>
				</div>
			</div>
	@endif

	@if (Session::has('mensaje'))

			<div class="row">
				<div class="card-panel teal lighten-2  col s12" >
					<ul>
						<li><span class="teal-text text-lighten-5">{{ Session::get('mensaje') }}</span></li>
					</ul>
				</div>
			</div>
	@endif
	<br>
		<div class="row">
			<div class="col m3">
				<ul>
					<li style="font-size: 12pt;">Perfil de Facturación</li>

					<li><a href="{!! url('edit_perfil') !!}">Editar</a></li>
				</ul>
			</div>
			<div class="col m7">

				<div>
					<p style="font-weight: bold">Información Fiscal:</p>
					<p>RFC: {{Auth::user()->RFC}}</p>
					<hr>

					<p style="font-weight: bold">Datos de la empresa:</p>
					<p>
						{{Auth::user()->nombreEmpresa}}<br>
						{{Auth::user()->nombre}} {{ Auth::user()->Apellido }}<br>
						tel. {{Auth::user()->telefono}}
						<br><br>
						{{$dirFactura->calle}} #{{$dirFactura->num_calle}}<br>
						col.{{$dirFactura->colonia}}, {{$dirFactura->municipio}}<br>
						CP.{{$dirFactura->cp}}. {{$dirFactura->ciudad}}, {{$dirFactura->estado}}.<br>
						México.


					</p>
					<hr>

					<p style="font-weight: bold">Datos de Entrega:</p>
					<p>
						{{$dirEntrega->calle}} #{{$dirEntrega->num_calle}}<br>
						col.{{$dirEntrega->colonia}}, {{$dirEntrega->municipio}}<br>
						CP.{{$dirEntrega->cp}}. {{$dirEntrega->ciudad}}, {{$dirEntrega->estado}}.<br>
						México.
					</p>

				</div>
				<div class="col m12">
					<p class="right-align">
						@yield('complemento')
					</p>
				</div>
			</div>
		</div>
    </div>

@endsection