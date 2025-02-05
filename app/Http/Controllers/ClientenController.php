<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientenController extends Controller
{
    public function index(){
        return view("clienten.index");
    }
    public function create()
    {
        return view("clienten.create");
    }
}
