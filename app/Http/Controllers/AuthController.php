<?php

namespace App\Http\Controllers;

use App\Models\Chauffeur;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'exists:chauffeurs,email'],
        ]);
        Chauffeur::whereEmail($data['email'])->first()->sendLoginLink();
        session()->flash('success', true);
        return redirect()->back();
    }
    
    public function verifyLogin(Request $request, $token)
    {
        $token = \App\Models\LoginToken::whereToken(hash('sha256', $token))->firstOrFail();
        abort_unless($request->hasValidSignature() && $token->isValid(), 401);
        $token->consume();
        Chauffeur::login($token->chauffeur);
        return redirect('/');
    }
}
