@extends('home',array('title' => "Transferencia"))

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
		<span class="card-title">Transferir</span>
		<div class="row">
			<form method="POST" action="{{route('regTransferencia')}}">
				{{ csrf_field() }}
				<div class="input-field col s12">
					<input id="cuenta" type="number" class="validate" name="cuenta">
					<label for="cuenta">se dirige al numero de cuenta de</label>
				</div>

				<div class="input-field col s12">
					<input id="Monto" type="number" data-length="45" name="monto">
						<label for="Monto">0.00</label>
				</div>
	
				<div class="card-action">
				</div>

				<button class="btn waves-effect waves-light" type="submit" name="action">Transferir
					<i class="material-icons right">send</i>
				</button>
			</form>
		</div>
	</div>			
</div>
@endsection