<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Models\Client;
use App\Models\Daycare;
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
        $daycares = Daycare::all();
        return view("clients.create", compact('daycares'));
    }

    public function store(StoreClientRequest $request)
    {
        $client = Client::create($request->only(['name', 'street_address', 'postal_code', 'city', 'telephone']));

        if ($request->has('daycares')) {
            $client->daycares()->attach($request->daycares);
        }

        return redirect()->route('clients.index')->with('success', __('labels.client_created'));
    }

    public function edit(Client $client)
    {
        $daycares = Daycare::all();
        return view("clients.edit", compact('client', 'daycares'));
    }

    public function update(StoreClientRequest $request, Client $client)
    {

        $client->update($request->only(['name', 'street_address', 'postal_code', 'city', 'telephone']));

        $client->daycares()->sync($request->daycares);
    
        return redirect()->route('clients.index')->with('success', __('labels.client_updated'));
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', __('labels.client_deleted'));
    }


    public function addDaycare(Request $request, Client $client)
    {
        $request->validate([
            'daycare_id' => 'required|exists:daycares,id'
        ]);

        $client->daycares()->attach($request->daycare_id);

        return redirect()->back()->with('success', 'Daycare succesvol gekoppeld.');
    }
    public function addDaycareForm(Client $client)
    {
        $daycares = Daycare::all();

        return view("clients.add-daycare", compact('client', 'daycares'));
    }
}
