@extends('app')
@section('titulo')
	Contacto
@endsection
@section('content')
	<br>
	<h2><p ALIGN=center>Necesitas más información, Contáctanos! </p></h2>
	<br><br>
	<div class="container">
		<div class="row">

			<div class="col s12 m7 "> <!-- Note that "m4 l3" was added  initial div -->
				<!-- Grey navigation panel -->
				<div class="row card-panel grey lighten-2">
					<div class="google-maps">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29269.894500704402!2d-99.60729726224379!3d19.284715051299205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cd8a3ea0fc4489%3A0xf23cb2695f151cd3!2sCESEHSA!5e0!3m2!1ses-419!2smx!4v1442538186207" width="650" height="650" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
				</div>
			</div> <!-- final div -->

			<div class="col s12 m5 "> <!-- Note that "m8 l9" was added initial div -->
				<!-- Teal page content -->

				<h4 align="center"> Sucursales</h4>

				<ul class="collapsible popout" data-collapsible="accordion">
					<li>
						<div class="collapsible-header"><i class="material-icons">place</i>Toluca</div>
						<div class="collapsible-body"><p>BAHIA DE TODOS LOS SANTOS #166 SANTA

								ANA TLAPALTITLAN, TOLUCA EDO. DE MEXICO C.P. 50160
								<br>
								TEL: (722) 211 5701
								<br>
								e-mail: info@cesehsa.com.mx.</p></div>
					</li>
					<li>
						<div class="collapsible-header"><i class="material-icons">place</i>Aguascalientes</div>
						<div class="collapsible-body"><p>Roberto Acuña
								<br>CEL: (449) 205-32-39 <br>
								e-mail: racuna@cesehsa.com.mx</p></div>
					</li>
					<li>
						<div class="collapsible-header"><i class="material-icons">place</i>Chihuahua</div>
						<div class="collapsible-body"><p>
								CEL: (656) 364 1775 <br>
								e-mail: aamador@cesehsa.com.mx</p></div>
					</li>
					<li>
						<div class="collapsible-header"><i class="material-icons">place</i>Hermosillo</div>
						<div class="collapsible-body"><p>
								SAN ANDRES # 56 RESIDENCIAL
								PASEO SAN ANGEL <br>
								C.P. 83288 HERMOSILLO, SONORA
								Jesús León <br>
								Cel: (662) 176 4178 <br>
								Jorge Moreno Cel:(662) 176 0079 <br>
								TEL. (662) 252 87 71<br>
								e-mail: jleon@cesehsa.com.mx, jmoreno@cesehsa.com.mx</p></div>
					</li>
					<li>
						<div class="collapsible-header"><i class="material-icons">place</i>México D.F</div>
						<div class="collapsible-body"><p>
								CEL: (55) 35 66 22 16 <br>
								e-mail: jcervantes@cesehsa.com.mx</p></div>
					</li>
					<li>
						<div class="collapsible-header"><i class="material-icons">place</i>Monterrey</div>
						<div class="collapsible-body"><p>
								AV. MIGUEL ALEMAN 102-B FRACC. LA VICTORIA, GPE. NUEVO LEON C.P. 67110.
								Tomas F. Galván <br> Cel: (811) 318 2078 <br>
								e-mail: tgalvan@cesehsa.com.mx</p></div>
					</li>
					<li>
						<div class="collapsible-header"><i class="material-icons">place</i>Puebla</div>
						<div class="collapsible-body"><p>
								EJERCITO DE ORIENTE NÚM. 31-A Col. ARBOLEDAS DE GUADALUPE
								PUEBLA, PUE. <br> C.P. 72260. <br>
								TEL: (222) 291 8797 <br>
								FAX: (222) 291 8771 <br>
								e-mail: greyes@cesehsa.com.mx, ebaez@cesehsa.com.mx, alopez@cesehsa.com.mx</p></div>
					</li>
					<li>
						<div class="collapsible-header"><i class="material-icons">place</i>Querétaro</div>
						<div class="collapsible-body"><p>
								CEL. (442) 176 9559 <br>
								email: balvarez@cesehsa.com.mx</p></div>
					</li>
					<li>
						<div class="collapsible-header"><i class="material-icons">place</i>Saltillo</div>
						<div class="collapsible-body"><p>
								BOULEVAR FRANCISCO COSS #838
								INERIOR 2 ZONA CENTRO <br>
								TEL: (844) 410 9285 <br> FAX: (844) 410 9286 <br>
								e-mail: pmendoza@cesehsa.com.mx, jpresas@cesehsa.com.mx</p></div>
					</li>
				</ul>
			</div><!-- final div -->
		</div>
	</div>
	<div class="container">
		<div class="row">
		<div class="card-panel">
		<h3><p ALIGN=center>Déjanos tu mensaje</p></h3>

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
		@if($mensaje)

			<div class="row">
				<div class="card-panel {{$color}} col s12" >
					<p>{{$mensaje}}</p>
				</div>
			</div>

		@endif

		<div class="row">
           <div class="col m10 offset-m1">
				<form method="post" action="{!! url('home/info/enviar') !!}" role="form">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="row">
						<div class="input-field col m6">
							<i class="material-icons prefix">business</i>
							<input value="" name="nombre_empresa" id="nombre_empresa" type="text" class="validate">
							<label class="active" for="nombre_empresa">Nombre de la Empresa *</label>
						</div>
						<div class="input-field col m6">
							<i class="material-icons prefix">account_circle</i>
							<input class="active" value="" name="nombre_solicitante" id="nombre_solicitante" type="text" class="validate">
							<label class="active" for="nombre_solicitante">Nombre de Contacto *</label>
						</div>
					</div>


					<div class="row">

						<div class="input-field col m6">
							<i class="material-icons prefix">email</i>
							<input value="" name="email" id="icon_email" type="email" class="validate">
							<label class="active" for="icon_email">Correo Electrónico *</label>
						</div>
						<div class="input-field col m6">
							<i class="material-icons prefix">phone</i>
							<input value="" name="telefono" id="icon_telephone" type="tel" class="validate">
							<label class="active" for="icon_telephone">Teléfono *</label>
						</div>

					</div>

					<div class="row">
						<div class="input-field col m6">
							<i class="material-icons prefix">description</i>
							<input value="" name="asunto" id="asunto" type="text" class="validate">
							<label class="active" for="asunto">Asunto *</label>
						</div>
						<div class="input-field col m6">
							<i class="material-icons prefix">comment</i>
							<textarea id="mensaje" name="mensaje" class="materialize-textarea"></textarea>
							<label for="mensaje">Mensaje *</label>
						</div>
					</div>


                    <div class="right-align">
						<p class="right-align">
						<button  class="btn waves-effect waves-light right-align" type="submit" name="action">Enviar
							<i class="material-icons right">email</i>
						</button>
						</p>
					</div>

				</form>
		   </div>
		</div>
		</div>
      </div>
     </div>
@endsection