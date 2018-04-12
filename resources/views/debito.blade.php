@extends('home',array('title' => "Debito"))

@section('cuerpo')
@if (session('status'))
<div class="card blue-grey darken-1">
	<div class="card-content white-text">
		<p>{{ session('status') }}</p>
	</div>
</div>
@endif
<div class="card">
	<div class="card-content ">
	  <span class="card-title">agregar Debito</span>
		<div class="row">
			<form method="POST" action="{{route('regDevito')}}">
				{{ csrf_field() }}
				<div class="input-field col s12">
					<input id="No. Cuenta" type="number" class="validate" data-length="45" name="cuenta">
					<label for="No. Cuenta">Cuenta</label>
				</div>
				<div class="input-field col s12">
					<input id="Description" type="text" class="validate" data-length="45" name="descripcion">
					<label for="Description">Descripcion</label>
				</div>
				<div class="input-field col s12">
					<input id="Monto" type="number" data-length="45" name="monto">
					<label for="Monto">Monto 0.00</label>
				</div>
				<div class="card-action">		  
				</div>
				<button class="btn waves-effect waves-light" type="submit" name="action">Devitar saldo
					<i class="material-icons right">send</i>
				</button>
			</form>
		</div>
	</div>	
</div>
@endsection