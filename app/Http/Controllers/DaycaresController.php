<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDaycareRequest;
use App\Models\Daycare;
use Illuminate\Http\Request;

class DaycaresController extends Controller
{
    public function index()
    {
        $daycares = Daycare::all();
        return view('daycares.index', compact('daycares'));
    }

    public function create()
    {
        return view('daycares.create');
    }

    public function store(StoreDaycareRequest $request)
    {
        Daycare::create($request->validated());
        return redirect()->route('daycares.index')->with('success', __('labels.daycare_created'));
    }

    public function edit(Daycare $daycare)
    {
        return view('daycares.edit', compact('daycare'));
    }

    public function update(StoreDaycareRequest $request, Daycare $daycare)
    {
        $daycare->update($request->validated());
        return redirect()->route('daycares.index')->with('success', __('labels.daycare_updated'));
    }

    public function destroy(Daycare $daycare)
    {
        $daycare->delete();
        return redirect()->route('daycares.index')->with('success', __('labels.daycare_deleted'));
    }
}