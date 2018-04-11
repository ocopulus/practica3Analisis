@extends('home',array('title' => "Credito"))

@section('cuerpo')
<div class="card">
		<div class="card-content ">
		  <span class="card-title">agregar credito</span>
		  
		  <div class="row">
				<div class="input-field col s12">
				  <input id="Description" type="text" data-length="45">
				  <label for="Description">Descripcion</label>
				</div>
				<div class="input-field col s12">
						<input id="tipo" type="text" data-length="45">
						<label for="tipo">tipo</label>
				</div>
				<div class="input-field col s12">
						<input id="Monto" type="text" data-length="45">
						<label for="Monto">Monto 0.00</label>
				</div>
			<div class="card-action">
		  <a href="#" class = "btn btn-danger" >transferir</a>
		  
		</div>
</div>
@endsection