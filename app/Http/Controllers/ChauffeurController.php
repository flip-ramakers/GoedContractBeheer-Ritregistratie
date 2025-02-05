<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChauffeurRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ChauffeurController extends Controller
{

    public function index()
    {
        $chauffeurs = User::all();
        return view('chauffeurs.index', compact('chauffeurs'));
    }
    public function create()
    {
        return view('chauffeurs.create');
    }

    public function store(StoreChauffeurRequest $request)
    {
        $validated = $request->validated();

        User::create($validated);

        return back()->withErrors([
            'email' => 'Dit e-mailadres is al in gebruik.',
        ]);

        return redirect()->route('admins.index')->with('success', 'User created successfully!');
    }

    public function update() {}

    public function edit()
    {
        return view('chauffeurs.edit');
    }
}
