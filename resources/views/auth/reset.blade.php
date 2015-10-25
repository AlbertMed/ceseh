@extends('app')
@section('titulo')
  Reset
@endsection
@section('content')
<div class="container">
	<div class="card-panel">
	<div class="row">

        <div class="col m8 offset-m2 s12">

            <h2 class="center-align">Establecer Nueva Password</h2>

				
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="token" value="{{ $token }}">

						<div class="input-field form-group col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
								<label class="col-md-4 control-label">E-Mail *</label>
						</div>

						<div class="input-field form-group col-md-6">
							<input type="password" class="form-control" name="password">
							<label class="col-md-4 control-label">Nueva Password *</label>
						</div>

						<div class="input-field form-group col-md-6">
							<input type="password" class="form-control" name="password_confirmation">
							<label class="col-md-4 control-label">Confirma Nueva Password *</label>
						</div>

						<div class="form-group">
							<div class="right-align col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Guardar
								</button>
							</div>
						</div>
					</form>
				</div>
		</div>
		</div>
	</div>
</div>
@endsection
