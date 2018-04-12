@extends('home',array('title' => $titulo))

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
	  <span class="card-title">Saldo</span>
		<div class="row">
			<h4>Q {{$saldo}}</h4>
		</div>
		<div class="card-action">		  
		</div>
	<a href="#" class = "btn btn-danger" >agregar</a>
	</div>	
</div>
@endsection