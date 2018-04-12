<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use App\User;
use App\Cuenta;
use Illuminate\Support\Facades\DB;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['only' => 'showlogin']);
    }

   public function showlogin()
   {
        return view('auth.login');
   }

   public function login()
   {
        $this->validate(request(),[
            'id' => 'required|string',
            'user' => 'required|string',
            'password' => 'required|string'
        ]);

        $credenciales = [
            'id' => request()->id,
            'user' => request()->user,
            'password' => request()->password
        ];

        if(Auth::attempt($credenciales))
        {
            return redirect()->route('home');
        }

        return back()
        ->withErrors(['user' => 'Estas Credenciales no concuerdan con nuestro registros'])
        ->withInput(request(['user', 'id']));
   }

   public function logout()
   {
        Auth::logout();
        return redirect('/')->with('status','Fin de Sesion');
   }

   public function showregusuario()
   {
        return view('auth.reg');
   }

   public function registrarUsuario()
   {
        $this->validate(request(),[
            'name' => 'required|string|max:255',
            'user' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);
        $usuario;
        $user = DB::table('users')->where('user', request()->user)->first();
        $user2 = DB::table('users')->where('email', request()->email)->first();
        if($user != null || $user2 != null)
        {
          return redirect()->route('vistareguser')->with('status', 'Error el usuario o Correo ya existe');
        }
        try{
          $usuario = User::create([
              'name' => request()->name,
              'user' => request()->user,
              'email' => request()->email,
              'password' => bcrypt(request()->password)
          ]);
        } catch(\Illuminate\Database\QueryException $ex){
          return redirect()->route('vistareguser')->with('status', 'Error el usuario o Correo ya existe');
        }
        
        $cuenta = Cuenta::create([
          'saldo' => 0,
          'user_id' => $usuario->id
        ]);
        return redirect('/')->with('status','Usuario Registrado tu codigo es: '.$usuario->id.', Cuenta: '.$cuenta->id);
   }
}
