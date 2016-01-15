@extends('datos.appbootstrap')
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

		@yield('formulario')
		<div class="row">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="col m3">
				<ul>
					<li style="font-size: 12pt;">Perfil de Facturación
				</ul>
			</div>
			<div class="col m7">
					<div>
						<div class="" style="font-weight: bold"><i class="material-icons left">account_circle</i>Información fiscal:</div>
						<br>

							<div class="row">
								<div class="input-field col s6 m6">
									<input class="active" value="{{Auth::user()->RFC}}" name="rfc" id="rfc" type="text" class="validate">
									<label class="active" for="rfc">RFC *</label>
								</div>
							</div>

						<br>
							<hr>
							<br>

						<div class="" style="font-weight: bold"><i class="material-icons left">business</i>Datos de la empresa:</div>
						<br>

						<div class="row">
							<div class="input-field col s6 m4">
								<input value="{{Auth::user()->nombreEmpresa}}" name="nombreEmpresa" id="empresa" type="text" class="validate">
								<label class="active" for="empresa">Nombre de la Empresa *</label>
							</div>
							<div class="input-field col s6 m4">
								<select  id="giro" name="grupoGiro">
									<option  <?php
									if(strcmp(Auth::user()->grupoGiro,"")==0){
										echo "disabled selected>";
										echo "Seleccione Giro de la Empresa";
									}else{
										foreach($groupGiro as $es){
											echo "value='$es->code'>";
											echo $es->value;
										}
									}
									?></option>
									@foreach ($group as $rol)
										<option value="{{$rol->code}}">{{$rol->value}}</option>
									@endforeach
								</select>
								<label for="giro" class="active">Giro *</label>
							</div>

							<div class="input-field col s6 m6">
								<input value="{{Auth::user()->nombre}}" name="nombre" id="icon_prefix" type="text" class="validate">
								<label class="active" for="icon_prefix">Nombre de contacto *</label>
							</div>
							<div class="input-field col s6 m6">
								<input value="{{ Auth::user()->Apellido }}" name="apellido" id="apellido" type="text" class="active">
								<label for="apellido" class="active">Apellido</label>
							</div>
							<div class="input-field col s6 m6">
								<!--<i class="material-icons prefix">phone</i>  -->
								<input value="{{Auth::user()->telefono}}" name="num_telefono" id="icon_telephone" type="number"  class="active">
								<label class="active" for="icon_telephone">Teléfono *</label>
							</div>
							<div class="input-field col s6 m6">
								<!--<i class="material-icons prefix">email</i>  -->
								<input disabled = "true" value="{{Auth::user()->email}}" name="email_cli" id="icon_email" type="email" class="validate">
								<label class="active" for="icon_email">Email de contacto *</label>
							</div>
						</div>

						<div class="row">
							<div class="input-field col s6 m4">
								<input value="{{$dirFactura->calle}}" name="Fcalle" id="fac_prefix" type="text" class="validate">
								<label class="active" for="fac_prefix">Calle *</label>
							</div>
							<div class="input-field col s6 m4">
								<input value="{{$dirFactura->num_calle}}" name="Fnumero" id="num"  type="number" class="validate">
								<label class="active" for="num">Número Exterior *</label>
							</div>
							<div class="input-field col s6 m4">
								<input value="{{$dirFactura->num_interior}}" name="numinterior" id="numinterior"  type="number" class="validate">
								<label class="active" for="numinterior">Número Interior</label>
							</div>
						</div>

						<div class="row">
							<div class="input-field col s6 m4">
								<input value="{{$dirFactura->colonia}}" name="Fcolonia" id="fac_RFC" type="text" class="validate">
								<label class="active" for="fac_RFC">Colonia *</label>
							</div>
							<div class="input-field col s6 m4">
								<input value="{{$dirFactura->municipio}}" name="Fmunicipio" id="fac_ciudad"  type="text" class="validate">
								<label class="active" for="fac_ciudad">Municipio/Delegación *</label>
							</div>
							<div class="input-field col s6 m4">
								<input value="{{$dirFactura->cp}}" name="Fcp" id="cp" type="number" class="validate">
								<label class="active" for="cp">Código postal *</label>
							</div>
						</div>

						<div class="row">
							<div class="input-field col s6 m4">
								<input value="{{$dirFactura->ciudad}}" name="Fciudad" id="fac_calle" type="text" class="validate">
								<label class="active" for="fac_calle">Ciudad *</label>
							</div>
							<div class="input-field col s6 m4">
								<input  disabled="true" value="México"  name="Fpais" id="pais" type="text" class="validate">
								<label class="active" for="pais">Pais *</label>
							</div>
							<div class="browser-default col s6 m4">
								<select  id="festado" class="validate" name="Festado">
									<option
									<?php
									if(strcmp($dirFactura->estado,"")==0){
										echo "disabled selected>";
										echo "Seleccione Estado";
									}else{
										foreach($estado as $es){
											echo "value='$es->code'>";
											echo $es->value;
										}

									}
									?>
									</option>
									@foreach ($estados as $edo)
										<option value="{{$edo->code}}">{{$edo->value}}</option>
									@endforeach
								</select>
								<label class="active" for="festado">Estado *</label>
							</div>
						</div>

						<br>
						<hr>
						<br>

						<div class="" style="font-weight: bold"><i class="material-icons left">account_circle</i>Datos de Entrega:</div>
						<br>

							<div class="row">
								<div class="col m12">
									<p >
										<input name="DentreI" type="checkbox" class="filled-in" id="filled-in-box"  />
										<label for="filled-in-box">Los datos de Entrega son los mismos que los de facturación</label>
									</p>
									<br>
								</div>
								<div class="input-field col s6 m4">
									<input value="{{$dirEntrega->calle}}" name="en_calle" id="en_calle" type="text" class="validate">
									<label class="active" for="en_calle">Calle *</label>
								</div>
								<div class="input-field col m4">
									<input value="{{$dirEntrega->num_calle}}" name="en_numero" id="num"  type="number" class="validate">
									<label class="active" for="num">Número Exterior *</label>
								</div>
								<div class="input-field col s6 m4">
									<input value="{{$dirEntrega->num_interior}}" name="en_numinterior" id="interior"  type="number" class="validate">
									<label class="active" for="interior">Número Interior</label>
								</div>
								<div class="input-field col s6 m4">
									<input value="{{$dirEntrega->colonia}}" name="en_colonia" id="en_colonia" type="text" class="validate">
									<label class="active" for="en_colonia">Colonia *</label>
								</div>
								<div class="input-field col s6 m4">
									<input value="{{$dirEntrega->municipio}}"  id="en_municipio" name="en_municipio" type="text" class="validate">
									<label class="active" for="en_municipio">Delegacion/Municipio *</label>
								</div>
								<div class="input-field col s6 m4">
									<input value="{{$dirEntrega->cp}}"  id="en_cp" name="en_cp" type="number" class="validate">
									<label class="active" for="en_cp">Código Postal *</label>
								</div>
								<div class="input-field col s6 m4">
									<input value="{{$dirEntrega->ciudad}}" name="en_ciudad" id="en_ciudad"  type="text" class="validate">
									<label class="active" for="en_ciudad">Ciudad *</label>
								</div>
								<div class="input-field col s6 m4">
									<input disabled="true" value="México"  id="en_pais" name="en_pais" type="text" class="validate">
									<label class="active" for="en_pais">Pais *</label>
								</div>
								<div class="browser-default col s6 m4">

									<select  id="en_estado" class="validate" name="en_estado">
										<option <?php
										if(strcmp($dirEntrega->estado,"")==0){
											echo "disabled selected>";
											echo "Seleccione Estado";
										}else{
											foreach($estado as $es){
												echo "value='$es->code'>";
												echo $es->value;
											}
										}
										?>
										</option>
										@foreach ($estados as $edo)
											<option value="{{$edo->code}}">{{$edo->value}}</option>
										@endforeach
									</select>
									<label class="active" for="en_estado">Estado *</label>
								</div>
								<div class="col m12">
									<br>
									<p class="right-align">

										@yield('complemento')
									</p>
								</div>
							</div>
						</div>

			</div>




		</div>
		{!! Form::close() !!}
    </div>

@endsection