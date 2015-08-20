@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col s6">
			<div class="panel panel-default">
				<div class="panel-heading">Reset Password</div>
				<div class="panel-body">
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif

					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>¡Lo sentimos!</strong> Hay problemas con la información ingresada.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="row">
							<div class="input-field col s6">
								<input id="email" type="email" class="validate" name="email" value="{{ old('email') }}">
							    <label for="email" data-error="wrong" data-success="right">E-Mail Address</label>
							</div>
						</div>

						 <button class="btn waves-effect waves-light" type="submit" name="action">Enviar a mi email
						    <i class="material-icons">send</i>
						  </button>

						
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
