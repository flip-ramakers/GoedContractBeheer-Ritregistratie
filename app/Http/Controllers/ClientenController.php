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
        return view("clients.index", compact('clients')); 
    }

    public function create()
    {
        return view("clients.create"); 
    }

    public function store(StoreClientRequest $request)
    {
        Client::create($request->validated());
        return redirect()->route('clients.index')->with('success', __('labels.client_created'));
    }

    public function edit(Client $client)
    {
        return view("clients.edit", compact('client'));
    }

    public function update(StoreClientRequest $request, Client $client)
    {
        $client->update($request->validated());

        $client->update($request->all());

        return redirect()->route('clients.index')->with('success', __('labels.client_updated'));
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', __('labels.client_deleted'));
    }
}
