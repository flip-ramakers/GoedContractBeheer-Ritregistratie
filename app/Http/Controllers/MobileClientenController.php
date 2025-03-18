<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Daycare;
use Illuminate\Http\Request;

class MobileClientenController extends Controller
{
    public function index(Request $request)
    {
        $clients = Client::all();
        return view('mobile-client.index', compact('clients'));
    }

    public function show(Request $request, $clientId = null)
    {
        $clientId = $clientId ?? $request->input('client_id', Client::first()?->id);
    
        $client = Client::find($clientId);
    
        if (!$client) {
            abort(404, 'No client found.');
        }
    
        $daycares = $client->daycares;
    
        $clients = Client::all();
    
        return view('mobile-client.show', compact('client', 'clients', 'daycares'));
    }
    
}
