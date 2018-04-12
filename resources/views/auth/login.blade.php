@extends('layouts.app')

@section('content')
	<div class="row justify-content-center">
		<div class="col-4">
			@if (session('status'))
			    <div class="alert alert-success">
			        {{ session('status') }}
			    </div>
			@endif
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Login</h5>
					<form method="POST" action="{{route('login')}}">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="text">Codigo</label>
							<input class="form-control" 
							type="text" 
							name="id" 
							value="{{ old('id') }}" 
							placeholder="Codigo">
							{!! $errors->first('id', '<span class="help-block">:message</span>') !!}
						</div>
						<div class="form-group">
							<label for="text">User</label>
							<input class="form-control" 
							type="text" 
							name="user" 
							value="{{ old('user') }}" 
							placeholder="Ingresa tu email">
							{!! $errors->first('user', '<span class="help-block">:message</span>') !!}
						</div>
						<div class="form-group">
							<label for="password">Contraseña</label>
							<input class="form-control" 
							type="password" 
							name="password" 
							placeholder="Ingresa tu Contraseña">
							{!! $errors->first('password', '<span class="help-block">:message</span>') !!}
						</div>
						<button class="btn btn-primary btn-block" name="btn">Acceder</button>
						<a class="btn btn-primary btn-block" href="{{ route('vistareguser') }}" role="button">Registrar</a>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection