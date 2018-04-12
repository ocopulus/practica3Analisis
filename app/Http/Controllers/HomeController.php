<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cuenta;
use App\CredDev;
use App\Transferencia;

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
	
	public function transferencia() {
		return view('transferencia');
	}
	public function credito() {
		return view('credito');
	}
	public function debito() {
		return view('debito');
	}
	public function saldo() {
		return view('saldo', [
			'saldo' => auth()->user()->cuentas[0]->saldo, 
			'titulo' => 'Saldo'
		]);
	}

	
}
