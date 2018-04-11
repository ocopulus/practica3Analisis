@extends('home',array('title' => "Debito"))

@section('cuerpo')
<div class="card">
	<div class="card-content ">
	  <span class="card-title">agregar Debito</span>
		<div class="row">
			<div class="input-field col s12">
				<input id="No. Cuenta" type="number" class="validate" data-length="45">
				<label for="No. Cuenta">Cuenta</label>
			</div>
			<div class="input-field col s12">
				<input id="Description" type="text" class="validate" data-length="45">
				<label for="Description">Descripcion</label>
			</div>

			<div class="input-field col s12">
				<input id="Monto" type="number" data-length="45">
				<label for="Monto">Monto 0.00</label>
			</div>
		</div>
		<div class="card-action">		  
		</div>
	<a href="#" class = "btn btn-danger" >agregar</a>
	</div>	
</div>
@endsection