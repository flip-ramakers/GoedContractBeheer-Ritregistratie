<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index()
    {
        $admins = User::all();
        return view('admins.index', compact('admins'));
    }


    public function create()
    {
        return view('admins.create');
    }


    public function store(StoreAdminRequest $request)
    {
        $validated = $request->validated();
    
        $validated['password'] = Hash::make($validated['password']);
    
        User::create($validated);
    
        return redirect()->route('admins.index')->with('success', 'User created successfully!');
    }


    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('admins.show', compact('user'));
    }


    public function edit(string $id )
    {
        $admin = user::findOrFail($id);
        return view('admins.edit', compact('admin'));
    }


    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
    
        $validated = $request->validated();
    
        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {

            unset($validated['password']);
        }
    
        $user->update($validated);
    
        return redirect()->route('admins.index')->with('success', 'admin updated successfully!');
    }


    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admins.index')->with('success', 'admin deleted successfully!');
    }
}
