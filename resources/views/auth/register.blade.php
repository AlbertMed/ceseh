@extends('app')
@section('titulo')
  Registro
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
			    <br>
			    <div class="container center">
				<div class="panel-heading" align="left">Registro</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>¡Lo sentimos!</strong> Hay algunos problemas con la información ingresada.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
                 
					<form class="col s12 " role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="row">
							<div class="input-field col s6">
							   <input id="name" type="text" class="validate" name="nombre" value="{{ old('name') }}">
							   <label for="name">Nombre</label>
							</div>
                       </div>

						<div class="row">
							<div class="input-field col s6">
								<input id="e-mail" type="email" class="validate" name="email" value="{{ old('email') }}">
							    <label for="e-mail" data-error="wrong" data-success="right">Dirección E-Mail</label>
							</div>
						</div>

						 <div class="row">
							<div class="input-field col s6">
								<input id="telefono" type="tel" class="validate" name="telefono" value="{{ old('telefono') }}">
							    <label for="telefono">Telefono</label>
							</div>
						</div>

						<div class="row">
							<div class="input-field col s6">
								<input id="direccion" type="text" class="validate" name="direccion" value="{{ old('direccion') }}">
								<label for="direccion">Dirección</label>
							</div>
						</div>

					    <div class="row">
					    	<div class="input-field col s6">
					    		<input id="cp" type="text" class="validate" name="cp" value="{{ old('cp') }}">
					    		<label for="cp">CP</label>
					    	</div>
					    </div>


						<div class="row">
							<div class="input-field col s6">
								<input id="password" type="password" class="validate" name="password">
							    <label for="password">Password</label>
							</div>
						</div>

						
						<div class="row">
							<div class="input-field col s6">
								<input id="re-password" type="password" class="validate" name="password_confirmation">
							    <label for="re-password">Confirme Password</label>
							</div>
						</div>

                        <div class="row" align="left">
						 <button class="btn waves-effect waves-light" type="submit" name="action">Registrar
						      <i class="material-icons">send</i>
						  </button>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
