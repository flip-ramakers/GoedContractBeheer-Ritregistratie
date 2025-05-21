<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Daycare;
use Illuminate\Http\Request;

class MobileClientenController extends Controller
{
    public function index(Request $request)
    {
        $chauffeur = $request->user();
        $clients = Client::query()
            ->withWhereHas('daycares', function ($query) use ($chauffeur) {
                $query->orderBy('name')
                    ->join('chauffeur_daycare', 'chauffeur_daycare.daycare_id', '=', 'daycares.id')
                    ->where('chauffeur_daycare.chauffeur_id', $chauffeur->id);
            })
            ->orderBy('name')
            ->get();
        return view('mobile-client.index', compact('clients'));
    }

    public function show(Request $request, $clientId = null)
    {
        $clientId = $clientId ?? $request->input('client_id', Client::first()?->id);

        $chauffeur = $request->user();
        $client = Client::query()
            ->withWhereHas('daycares', function ($query) use ($chauffeur) {
                $query->orderBy('name')
                    ->join('chauffeur_daycare', 'chauffeur_daycare.daycare_id', '=', 'daycares.id')
                    ->where('chauffeur_daycare.chauffeur_id', $chauffeur->id);
            })
            ->where('id', $clientId)
            ->first();

        if (!$client) {
            abort(404, 'No client found.');
        }

        $daycares = $client->daycares;

        return view('mobile-client.show', compact('client', 'daycares'));
    }
}
