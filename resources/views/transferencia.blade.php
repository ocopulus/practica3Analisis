@extends('home',array('title' => "Transferencia"))

@section('cuerpo')

<div class="card">
		<div class="card-content ">
		  <span class="card-title">Transferir</span>
		  
		  <div class="row">
					
				<div class="input-field col s12">
					<input id="cuenta" type="number" class="validate">
					<label for="cuenta">se dirige al numero de cuenta de</label>
				</div>

				<div class="input-field col s12">
					<input id="Monto" type="number" data-length="45">
						<label for="Monto">0.00</label>
				</div>
	
				<div class="card-action">
		</div>
			<a href="#" class = "btn btn-danger" >transferir</a>
</div>
@endsection