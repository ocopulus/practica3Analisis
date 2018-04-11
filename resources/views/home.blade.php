@extends('layouts.app2')

@section('head')
	<title>{{$title}}</title>
@endsection
@section('content')
	

	@include('pricipal.navBar',array('nombre' => auth()->user()->name, 'codigo' =>  auth()->user()->id, 'email' =>  auth()->user()->email,'title' => $title))
	<main>
		<h4>Cuenta: 1234568</h4>
		<!-- Styles 
	/*
		@include('pricipal.bienvenida',array('nombre' => auth()->user()->name, 'codigo' =>  auth()->user()->id ))
	*/
	-->
	<div class = "align-center">
		<div class="row">
			<div >
				@yield('cuerpo')
			</div>
		</div>
	</div>
	</main>
	@include('pricipal.barraLateral',array('nombre' => auth()->user()->name, 'codigo' =>  auth()->user()->id, 'email' =>  auth()->user()->email)))
@endsection