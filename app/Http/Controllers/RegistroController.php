<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;


class RegistroController extends Controller
{

    use RegistersUsers;
    protected $redirectTo = 'login';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function registro(Request $request, Redirector $redirect)
    {

        //$request->phone = "+52".$request->phone;

        $validation = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|string|unique:users',
            'phone' => 'required|string|unique:users|min:10',
            'password' => 'required|string|min:10'
        ]
        , 
        [
            'email.unique'=>'Este email ya esta en uso.',
            'phone.unique'=>'Este número ya está en uso.',
            'phone.min'=>'El Número tiene que tener al menos 10 dígitos',
            'password.min'=>'La Contraseña tiene que tener al menos 10 caracteres'
        ]
        );

        if($validation){
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]);
            return $redirect->to('/')->with('status', 'Ahora puedes iniciar sesión');
        }
        else{
           // return $redirect->to('/registro')->with('status', 'Ahora puedes iniciar sesión');
        }

    }

}
