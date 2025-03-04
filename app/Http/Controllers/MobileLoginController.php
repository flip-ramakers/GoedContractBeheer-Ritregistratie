<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MobileLoginController extends Controller
{

    public function showLoginForm()
    {
        return view('mobile-login.login');
    }
}
