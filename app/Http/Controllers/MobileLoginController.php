<?php

namespace App\Http\Controllers;

use App\Models\Chauffeur;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class MobileLoginController extends Controller
{

    public function showLoginform()
    {
        return view('mobile-login.login');
    }
    

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'exists:chauffeurs,email'],
        ]);
        Chauffeur::where('email', $data['email'])->first()->sendLoginLink();
        session()->flash('success', true);
        return redirect()->back();
    }

    public function verifyLogin(Request $request, $token)
    {
        $token = \App\Models\LoginToken::whereToken(hash('sha256', $token))->firstOrFail();
        abort_unless($request->hasValidSignature() && $token->isValid(), 401);
        $token->consume();
        auth()->guard('chauffeur')->login($token->chauffeur);

        return redirect()->route('chauffeur.clienten');
    }
    
    public function logout()
    {
        auth()->guard('chauffeur')->logout();
        return redirect()->route('login');
    }
}
