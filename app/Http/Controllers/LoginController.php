<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Routing\Redirector;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

       /* $user = User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)){
           
            return redirect('/')
            ->with('status', 'Credenciales no validas');
        }*/

        if(Auth::attempt($credentials)){
            auth()->user()->generateCode();
            return redirect()->route('2fa.index');
        }
        return redirect('/')
        ->with('status', 'Credenciales no validas');
       

        /*if(Auth::attempt($credentials)){
           
        }*/
        /*return redirect('/')
        ->with('status', 'Credenciales no validas');*/
            
        //$request->session()->regenerate();

       /* $user = User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)){

            
            return redirect('/')
            ->with('status', 'Credenciales no validas');    
        }
     
        auth()->user()->generateCode();
        return redirect()->route('2fa.index');*/
        
            //return $redirect->intended('dashboard')->with('status', 'Estas logeado');
        
       

       

        
    }

    function logout(Request $request, Redirector $redirect){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return $redirect->to('/')->with('status', 'Bye');
    }
}
