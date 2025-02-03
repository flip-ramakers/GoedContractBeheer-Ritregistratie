<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginAdminRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }


    public function login(LoginAdminRequest $request)
    {

        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            return redirect()->intended('/admins');
        }

        return back()->withErrors([
            'email' => 'De ingevoerde inloggegevens zijn onjuist.',
        ])->onlyInput('email');
    }
    
    public function logout(Request $request) {
        Auth::logout(); 
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
      }
}
