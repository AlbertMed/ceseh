@extends('app')
@section('titulo')
  Login
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col s6">
			<div class="panel panel-default">
			    <br><br>
				<div class="panel-heading">Login</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger text-center">
							<strong>¡Lo sentimos!</strong>  Las credenciales ingresadas no coinciden con nuestros registros.<br>							
						</div>
					@endif

                    {!! Form::open(['url'=>'auth/login', 'role'=>'form', 'class'=>'form-horizontal']) !!}											
						<div class="form-group">
                            {!! Form::label('email', 'Dirección Email',['class'=>'validate']) !!}
							
							<div class="col s12">
							    {!! Form::email('email', old('email'),['class'=>'form-control']) !!}															    
							</div>
						</div>

						<div class="form-group">
						    {!! Form::label('password', 'Password',
						    ['class'=>'col-md-4 control-label']) !!}
							
							<div class="col s12">
							    {!! Form::password('password',['class'=>'form-control']) !!}															    
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Recordar credenciales
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn waves-effect waves-light">Login</button>

								<a class="btn waves-effect waves-light" href="{!! url('/password/email') !!}">¿Olvidaste tu Password?</a>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
