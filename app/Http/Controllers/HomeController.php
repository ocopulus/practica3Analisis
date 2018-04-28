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
			'saldo' =>'Q '.auth()->user()->cuentas[0]->saldo, 
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

	public function regDevito()
	{
		if(request()->cuenta == '' || request()->descripcion == '' || request()->monto == '')
		{
			return redirect()
				->route('regDevito')
				->with('status', 'Faltan Datos, por favor ingreselos');
		}

		$cuenta = Cuenta::find(request()->cuenta);
		if($cuenta == null)
		{
			return redirect()
				->route('regDevito')
				->with('status', 'La cuenta no Existe');
		}

		if($cuenta->saldo < request()->monto)
		{
			return redirect()
				->route('regDevito')
				->with('status', 'Error el monto a devitar es mayor al saldo de la cuneta papu ;V');
		}

		$datos = [
			'cuenta_id' => $cuenta->id, 
			'monto' => request()->monto, 
			'descripcion' => request()->descripcion, 
			'tipo'=>'devito'
		];

		$credito = CredDev::create($datos);
		$cuenta->saldo = $cuenta->saldo - request()->monto;
		$cuenta->save();

		return redirect()
			->route('home')
			->with('status', 'Devito realizado exitosamente');
	}

	public function regTransferencia()
	{
		if(request()->cuenta == '' || request()->monto == '')
		{
			return redirect()
			->route('regTransferencia')
			->with('status', 'Faltan Datos, por favor ingreselos');
		}

		$cuenta_us = auth()->user()->cuentas[0];
		$cuenta = Cuenta::find(request()->cuenta);

		if($cuenta == null)
		{
			return redirect()
				->route('regTransferencia')
				->with('status', 'La cuenta a transferir no Existe');
		}

		if($cuenta_us->saldo < request()->monto){
			return redirect()
				->route('regTransferencia')
				->with('status', 'El monto a transferir es mayor al sado de la cuenta del usuario logeado');
		}

		$datos = [
			'cuenta_in_id' => $cuenta->id,
			'cuenta_out_id' => $cuenta_us->id,
			'monto' => request()->monto
		];

		$trans = Transferencia::create($datos);
		$cuenta_us->saldo = $cuenta_us->saldo - request()->monto;
		$cuenta_us->save();
		$cuenta->saldo = $cuenta->saldo + request()->monto;
		$cuenta->save();

		return redirect()
			->route('home')
			->with('status', 'Se a transferiado Q '.request()->monto.', a la cuenta '.request()->cuenta);
	}
	
}
