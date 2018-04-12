@extends('layouts.app')

@section('content')
	<div class="row justify-content-center">
		<div class="col-4">
			@if (session('status'))
			    <div class="alert alert-danger">
			        {{ session('status') }}
			    </div>
			@endif
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Registro de Usuario</h5>
					<form method="POST" action="{{route('reguser')}}">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="text">Nombre</label>
							<input class="form-control" 
							type="text" 
							name="name"
							placeholder="Nombre Completo">
						</div>
						<div class="form-group">
							<label for="text">User</label>
							<input class="form-control" 
							type="text" 
							name="user"
							placeholder="Ingresa tu Usuario">
						</div>
						<div class="form-group">
							<label for="text">Email</label>
							<input class="form-control" 
							type="text" 
							name="email"
							placeholder="Ingresa tu email">
						</div>
						<div class="form-group">
							<label for="password">Contraseña</label>
							<input class="form-control" 
							type="password" 
							name="password" 
							placeholder="Ingresa tu Contraseña">
						</div>
						<button class="btn btn-primary btn-block">Registrar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection