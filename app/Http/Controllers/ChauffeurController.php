<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChauffeurRequest;
use App\Models\Chauffeur;
use App\Models\Daycare;
use Illuminate\Http\Request;

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

    public function destroy(Chauffeur $chauffeur)
    {
        $chauffeur->delete();
        return redirect()->route('chauffeurs.index')->with('success', __('labels.chauffeur_deleted'));
    }
}
