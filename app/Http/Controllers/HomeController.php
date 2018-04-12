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

	public function regCredito()
	{
		if(request()->cuenta == '' || request()->descripcion == '' || request()->monto == '')
		{
			return redirect()
				->route('regCredito')
				->with('status', 'Faltan Datos, por favor ingreselos');
		}

		$cuenta = Cuenta::find(request()->cuenta);
		if($cuenta == null)
		{
			return redirect()
				->route('regCredito')
				->with('status', 'La cuenta no Existe');
		}
		$datos = [
			'cuenta_id' => $cuenta->id,
			'monto' => request()->monto,
			'descripcion' => request()->descripcion,
			'tipo' => 'credito'
		];

		$credito = CredDev::create($datos);
		$cuenta->saldo = $cuenta->saldo + request()->monto;
		$cuenta->save();

		return redirect()
			->route('home')
			->with('status', 'Credito agregado exitosamente');
	}
}
