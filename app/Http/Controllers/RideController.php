<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRideRequest;
use Illuminate\Http\Request;
use App\Models\Ride;
use Illuminate\Support\Facades\Log;

class RideController extends Controller
{
    public function index()
    {
        $rides = Ride::with(['client', 'daycare'])->latest()->get();
        return view('rides.index', compact('rides'));
    }

    public function store(StoreRideRequest $request)
    {
        $data = $request->validated();
        Log::info('Request Data:', $data);
    
        $clientId = $data['client_id'];
    
        $ride = Ride::where('client_id', $clientId)
            ->whereNull('end')
            ->latest()
            ->first();
    
        if (!$ride) {
            Ride::create([
                'client_id' => $clientId,
                'daycare_id' => $data['daycare_id'] ?? null,
                'remarks' => !empty($data['remarks']) ? $data['remarks'] : null,
                'status' => $data['status'] ?? 'steppedin',
                'start' => now(),
                'end' => $data['status'] === 'notsteppedin' ? now() : null,
            ]);
        } else {
            $updateData = [
                'status' => $data['status'],
                'remarks' => $data['remarks'] ?? $ride->remarks, 
            ];
            
            if ($data['status'] === 'steppedout' || $data['status'] === 'notsteppedin') {
                $updateData['end'] = now();
            }
            
            $ride->update($updateData);
        }
    
        return redirect()->route('chauffeur.clienten')->with('success', 'Ritstatus bijgewerkt.');
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