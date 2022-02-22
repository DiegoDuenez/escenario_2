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
        $validation = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'string', 'unique:users'],
            'phone' => ['required', 'min:10', 'unique:users'],
            'password' => ['required', 'string', 'min:10']
        ]);

        if($validation){
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => "+52".$request->phone,
                'password' => Hash::make($request->password),
            ]);
            return $redirect->to('/')->with('status', 'Ahora puedes iniciar sesión');
        }

    }

}
