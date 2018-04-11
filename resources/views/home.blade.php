@extends('layouts.app2')

@section('head')
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="/css/custom/barraLateral.css">
	<script src="/js/custom/barraLateral.js"></script>
@endsection

@section('content')

	
    @include('pricipal.bienvenida')
	
	@include('pricipal.barraLateral')
@endsection