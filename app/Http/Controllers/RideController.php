<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRideRequest;
use Illuminate\Http\Request;
use App\Models\Ride;
use App\Models\Client;
use App\Models\Daycare;

class RideController extends Controller
{
    public function index()
    {
        $rides = Ride::with(['client', 'daycare'])->latest()->get();
        return view('rides.index', compact('rides'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'daycare_id' => 'nullable|exists:daycares,id',
            'remarks' => 'nullable|string',
            'status' => 'required|in:steppedin,notsteppedin',
        ]);

        Ride::create([
            'client_id' => $request->client_id,
            'daycare_id' => $request->daycare_id,
            'remarks' => $request->remarks,
            'status' => $request->status,
            'start' => now(),
        ]);

        return redirect()->route('chauffeur.clienten')->with('success', 'Ride created successfully.');
    }

    public function show($rideId)
    {
        $ride = Ride::findOrFail($rideId);
        return view('rides.show', compact('ride'));
        
    }
    public function destroy($rideId)
    {
        $ride = Ride::findOrFail($rideId);
        $ride->delete();

        return redirect()->route('rides.index')->with('success', 'Ride deleted successfully.');
    }
}
