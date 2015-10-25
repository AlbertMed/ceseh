@extends('app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col m10 offset-m1 s12">

            <h2 class="center-align">Recuperar Contraseña</h2>

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
                    <div class="input-field col m6 s12 offset-m2">
                        <i class ="material-icons prefix">email</i>
                        <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}">
                        <label for="email" data-error="wrong" data-success="right">E-Mail Address</label>
                    </div>
                </div>
                
                <div class="row col m6 s12 offset-m2">
                <p class="right-align">
                <button class="btn waves-effect waves-light" type="submit" name="action">Enviarme un email
                    <i class="material-icons right">send</i>
                </button>                    
                </p>
                </div>

            </form>
            
        </div>
    </div>
</div>

@endsection