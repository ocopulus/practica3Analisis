<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function index()
    {
    	   	return view('home');
	}
	
	public function transferencia(){
		return view('transferencia');
	}
	public function credito(){
		return view('credito');
	}
	public function debito(){
		return view('debito');
	}
}
