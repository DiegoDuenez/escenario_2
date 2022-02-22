<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserCode;
use Illuminate\Support\Facades\Session;

class TwoFactorAuthController extends Controller
{
    public function index()
    {
        return view('2fa');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
        ]);
  
        $exists = UserCode::where('user_id', auth()->user()->id)
                ->where('code', $validated['code'])
                ->where('updated_at', '>=', now()->subMinutes(5))
                ->exists();
  
        if ($exists) {
            Session::put('2fa', auth()->user()->id);
            
            return redirect()->route('dashboard');
        }
            return redirect()
            ->back()
            ->with('error', 'Codigo invalido.');
    }

    public function reenviar()
    {
        auth()->user()->generateCode();
  
        return back()
            ->with('success', 'EL codigo se ha reenviado a tu número.');
    }
}
