<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Routing\Redirector;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Storage;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = 'login';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function index(){
       
        return view('login');
    }

    public function login(Request $request, Redirector $redirect){
        //$credentials = request()->only('email', 'password');
        $credentials = $request->validate([
            'email' => ['required', 'email', 'string'],
            'password' => ['required', 'string']
        ]);

        if(Auth::attempt($credentials)){
            auth()->user()->generateCode();
            return redirect()->route('2fa.index');
        }
        return redirect('/')
        ->with('error', 'Credenciales no validas');
        
    }

    function logout(Request $request, Redirector $redirect){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return $redirect->to('/')->with('status', 'Bye');
    }
}
