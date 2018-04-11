@extends('layouts.app2')

@section('head')
	<title>Home</title>
@endsection
@section('content')
	

	@include('pricipal.navBar',array('nombre' => auth()->user()->name, 'codigo' =>  auth()->user()->id, 'email' =>  auth()->user()->email))

	<main>
			<!-- Styles 
	/*
		@include('pricipal.bienvenida',array('nombre' => auth()->user()->name, 'codigo' =>  auth()->user()->id ))
	*/
	-->

	@yield('cuerpo')
		
	</main>
	@include('pricipal.barraLateral',array('nombre' => auth()->user()->name, 'codigo' =>  auth()->user()->id, 'email' =>  auth()->user()->email)))
@endsection