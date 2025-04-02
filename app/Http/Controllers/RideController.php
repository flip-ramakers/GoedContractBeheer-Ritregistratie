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

        if ($data['status'] === 'notsteppedin') {
            Ride::create([
                'client_id' => $clientId,
                'daycare_id' => $data['daycare_id'] ?? null,
                'remarks' => $data['remarks'] ?? null,
                'status' => 'notsteppedin',
                'start' => now(),
                'end' => now(),
            ]);
        } elseif (!$ride) {
            Ride::create([
                'client_id' => $clientId,
                'daycare_id' => $data['daycare_id'] ?? null,
                'remarks' => $data['remarks'] ?? null,
                'status' => 'steppedin',
                'start' => now(),
                'end' => null,
            ]);
        } else {
            $updateData = [
                'status' => $data['status'],
                'remarks' => $data['remarks'] ?? $ride->remarks, 
            ];

            if ($data['status'] === 'steppedout') {
                $updateData['end'] = now();
            }

            $ride->update($updateData);
        }

        return redirect()->route('chauffeur.clienten')->with('success', __('labels.ride_status'));
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

        return redirect()->route('rides.index')->with('success', __('labels.ride_deleted'));
    }
}
