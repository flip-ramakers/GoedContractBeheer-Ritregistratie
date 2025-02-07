<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientenController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view("clienten.index", compact('clients'));
    }

    public function create()
    {
        return view("clienten.create");
    }

    public function store(StoreClientRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'street_address' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'city' => 'required|string|max:100',
            'telephone' => 'required|string|max:15',
        ]);

        Client::create($request->all());

        return redirect()->route('clienten.index')->with('success', __('labels.client_created'));
    }

    public function edit(Client $clienten)
    {
        return view("clienten.edit", compact('clienten'));
    }

    public function update(StoreClientRequest $request, Client $clienten)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'street_address' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'city' => 'required|string|max:100',
            'telephone' => 'required|string|max:15',
        ]);

        $clienten->update($request->all());

        return redirect()->route('clienten.index')->with('success', __('labels.client_updated'));
    }

    public function destroy(Client $clienten)
    {
        $clienten->delete();
        return redirect()->route('clienten.index')->with('success', __('labels.client_deleted'));
    }
}
