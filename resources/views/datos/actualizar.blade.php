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

		@yield('formulario')
		<div class="row">

				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<ul >
					<li>
						<div class=""><i class="material-icons left">business</i>Datos de la Empresa</div>
						<div class="">
							<br>
							<div class="row">

								<div class="input-field col s6 m5 offset-m1">
									<i class="material-icons prefix">business</i>
									<input value="{{Auth::user()->nombreEmpresa}}" name="nombreEmpresa" id="empresa" type="text" class="validate">
									<label class="active" for="empresa">Nombre de la Empresa *</label>
								</div>

							</div>

							<div class="row">

								<div class="input-field col s6 m5 offset-m1">
									<i class="material-icons prefix">account_circle</i>
									<input class="active" value="{{Auth::user()->RFC}}" name="rfc" id="rfc" type="text" class="validate">
									<label class="active" for="rfc">RFC *</label>
								</div>
								<div class="input-field col s6 m5">
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
							</div>
						</div>
					</li>
					<li>
						<div ><i class="material-icons left">assignment_ind</i>Datos de Contacto</div>
						<div >
							<br>
							<div class="row">

								<div class="input-field col s6 m5 offset-m1">
									<i class="material-icons prefix">account_circle</i>
									<input value="{{Auth::user()->nombre}}" name="nombre" id="icon_prefix" type="text" class="validate">
									<label class="active" for="icon_prefix">Nombre de contacto *</label>
								</div>

								<div class="input-field col s6 m5">
									<i class="material-icons prefix">account_circle</i>
									<input value="{{ Auth::user()->Apellido }}" name="apellido" id="apellido" type="text" class="active">
									<label for="apellido" class="active">Apellido</label>
								</div>

							</div>

							<div class="row">

								<div class="input-field col s6 m5 offset-m1">
									<i class="material-icons prefix">phone</i>
									<input value="{{Auth::user()->telefono}}" name="telefono" id="icon_telephone" type="tel" class="validate">
									<label class="active" for="icon_telephone">Teléfono *</label>
								</div>
								<div class="input-field col s6 m5">
									<i class="material-icons prefix">email</i>
									<input disabled = "true" value="{{Auth::user()->email}}" name="email_cli" id="icon_email" type="email" class="validate">
									<label class="active" for="icon_email">Email de contacto *</label>
								</div>

							</div>

						</div>
					</li>
					<li>
						<div ><i class="material-icons left">description</i>Datos de Facturación</div>
						<div >
							<br>
							<div class="row">
								<div class="input-field col s6 m5 offset-m1">
									<i class="material-icons prefix">account_circle</i>
									<input value="{{$dirFactura->calle}}" name="Fcalle" id="fac_prefix" type="text" class="validate">
									<label class="active" for="fac_prefix">Calle *</label>
								</div>

								<div class="input-field col s6 m5">
									<i class="material-icons prefix">email</i>
									<input value="{{$dirFactura->colonia}}" name="Fcolonia" id="fac_RFC" type="text" class="validate">
									<label class="active" for="fac_RFC">Colonia *</label>
								</div>
							</div>

							<div class="row">
								<div class="input-field col  m3  offset-m1">
									<i class="material-icons prefix">location_on</i>
									<input value="{{$dirFactura->num_calle}}" name="Fnumero" id="num"  type="number" class="validate">
									<label class="active" for="num">Número Exterior *</label>
								</div>
								<div class="input-field col  m2 ">
									<input value="{{$dirFactura->num_interior}}" name="numinterior" id="numinterior"  type="number" class="validate">
									<label class="active" for="numinterior">Número Interior</label>
								</div>
								<div class="input-field col s6 m5">
									<i class="material-icons prefix">location_on</i>
									<input value="{{$dirFactura->municipio}}" name="Fmunicipio" id="fac_ciudad"  type="text" class="validate">
									<label class="active" for="fac_ciudad">Municipio/Delegación *</label>
								</div>
							</div>

							<div class="row">

								<div class="input-field col s6 m5 offset-m1">
									<i class="material-icons prefix">location_on</i>
									<input value="{{$dirFactura->cp}}" name="Fcp" id="cp" type="number" class="validate">
									<label class="active" for="cp">Código postal *</label>
								</div>

								<div class="input-field col s6 m5">
									<i class="material-icons prefix">phone</i>
									<input value="{{$dirFactura->ciudad}}" name="Fciudad" id="fac_calle" type="text" class="validate">
									<label class="active" for="fac_calle">Ciudad *</label>
								</div>

							</div>

							<div class="row">
								<div class="input-field col s6 m5 offset-m1">
									<i class="material-icons prefix">location_on</i>
									<input  disabled="true" value="México"  name="Fpais" id="pais" type="text" class="validate">
									<label class="active" for="pais">Pais *</label>
								</div>
								<div class="browser-default col s6 m5">

									<select  id="festado" class="validate" name="Festado">
										<option
										<?php
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
									<label class="active" for="festado">Estado *</label>
								</div>
							</div>
							<div class="row">
								<div class="col m5 offset-m6">
									<p >
										<input name="DentreI" type="checkbox" class="filled-in" id="filled-in-box"  />
										<label for="filled-in-box">Los datos de Entrega son los mismos que los de facturación</label>
									</p>
								</div>
							</div>

						</div>
					</li>
					<li>
						<div ><i class="material-icons">whatshot</i>Datos de Entrega</div>
						<div >
							<br>
								<div class="row">
									<div class="input-field col s6 m5 offset-m1">
										<i class="material-icons prefix">location_on</i>
										<input value="{{$dirEntrega->calle}}" name="en_calle" id="en_calle" type="text" class="validate">
										<label class="active" for="en_calle">Calle *</label>
									</div>

									<div class="input-field col s6 m5">
										<i class="material-icons prefix">location_on</i>
										<input value="{{$dirEntrega->colonia}}" name="en_colonia" id="en_colonia" type="text" class="validate">
										<label class="active" for="en_colonia">Colonia *</label>
									</div>
								</div>

								<div class="row">
									<div class="input-field col m3 offset-m1">
										<i class="material-icons prefix">location_on</i>
										<input value="{{$dirEntrega->num_calle}}" name="en_numero" id="num"  type="number" class="validate">
										<label class="active" for="num">Número Exterior *</label>
									</div>
									<div class="input-field col m2">
										<input value="{{$dirEntrega->num_interior}}" name="en_numinterior" id="interior"  type="number" class="validate">
										<label class="active" for="interior">Número Interior</label>
									</div>
									<div class="input-field col s6 m5">
										<i class="material-icons prefix">location_on</i>
										<input value="{{$dirEntrega->municipio}}"  id="en_municipio" name="en_municipio" type="text" class="validate">
										<label class="active" for="en_municipio">Delegacion/Municipio *</label>
									</div>
								</div>

							<div class="row">
								<div class="input-field col s6 m5 offset-m1">
									<i class="material-icons prefix">location_on</i>
									<input value="{{$dirEntrega->cp}}"  id="en_cp" name="en_cp" type="number" class="validate">
									<label class="active" for="en_cp">Código Postal *</label>
								</div>

								<div class="input-field col s6 m5">
									<i class="material-icons prefix">location_on</i>
									<input value="{{$dirEntrega->ciudad}}" name="en_ciudad" id="en_ciudad"  type="text" class="validate">
									<label class="active" for="en_ciudad">Ciudad *</label>
								</div>
							</div>

							<div class="row">


								<div class="input-field col s6 m5 offset-m1">
									<i class="material-icons prefix">location_on</i>
									<input disabled="true" value="México"  id="en_pais" name="en_pais" type="text" class="validate">
									<label class="active" for="en_pais">Pais *</label>
								</div>
								<div class="browser-default col s6 m5">

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
								</div>

						</div>
					</li>
				</ul>
				<div class="col m12">
					<p class="right-align">

						@yield('complemento')
					</p>
				</div>
		</div>
		{!! Form::close() !!}
    </div>

@endsection