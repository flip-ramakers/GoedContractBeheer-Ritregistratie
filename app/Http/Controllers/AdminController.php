<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
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


        return redirect()->route('admins.index')->with('success', __('labels.admin_created'));
    }

    public function edit(string $id)
    {
        $admin = User::findOrFail($id);
        return view('admins.edit', compact('admin'));
    }


    public function update(UpdateAdminRequest $request, string $id)
    {
        $user = User::findOrFail($id);
        $validated = $request->validated();

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('admins.index')->with('success', __('labels.admin_updated'));
    }



    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admins.index')->with('success', __('labels.daycare_deleted'));
    }
}
