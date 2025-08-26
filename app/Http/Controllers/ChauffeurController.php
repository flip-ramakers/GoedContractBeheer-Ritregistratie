<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChauffeurRequest;
use App\Models\Chauffeur;
use App\Models\Daycare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ChauffeurController extends Controller
{
    public function index()
    {
        $chauffeurs = Chauffeur::with('daycares')->get();
        return view('chauffeurs.index', compact('chauffeurs'));
    }

    public function create()
    {
        $daycares = Daycare::all();
        return view('chauffeurs.create', compact('daycares'));
    }

    public function store(StoreChauffeurRequest $request)
    {
        $chauffeur = Chauffeur::create($request->validated());

        if ($request->has('daycares')) {
            $chauffeur->daycares()->sync($request->input('daycares'));
        }

        return redirect()->route('chauffeurs.index')->with('success', __('labels.chauffeur_created'));
    }

    public function edit(Chauffeur $chauffeur)
    {
        $daycares = Daycare::all();
        return view('chauffeurs.edit', compact('chauffeur', 'daycares'));
    }

    public function update(StoreChauffeurRequest $request, Chauffeur $chauffeur)
    {
        $chauffeur->update($request->validated());

        if ($request->has('daycares')) {
            $chauffeur->daycares()->sync($request->input('daycares'));
        }

        return redirect()->route('chauffeurs.index')->with('success', __('labels.chauffeur_updated'));
    }

    public function loginAsChauffeur(Chauffeur $chauffeur)
    {
        // Genereer een tijdelijke login token
        $plaintext = \Illuminate\Support\Str::random(32);
        $expiresAt =  now()->addMinutes(5); // Korte geldigheid voor directe login;
        $chauffeur->loginTokens()->create([
            'token' => hash('sha256', $plaintext),
            'expires_at' =>$expiresAt,
        ]);

        // Maak een directe login URL
        $loginUrl = URL::temporarySignedRoute('verify-login', $expiresAt, [
            'token' => $plaintext,
        ]);

        return response()->json([
            'success' => true,
            'login_url' => $loginUrl,
            'message' => __('labels.chauffeur_login_ready', ['name' => $chauffeur->name])
        ]);
    }

    public function destroy(Chauffeur $chauffeur)
    {
        $chauffeur->delete();
        return redirect()->route('chauffeurs.index')->with('success', __('labels.chauffeur_deleted'));
    }
}
