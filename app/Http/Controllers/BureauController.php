<?php

namespace App\Http\Controllers;

use App\Models\Bureau;
use App\Models\Service;
use Illuminate\Http\Request;

class BureauController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bureau = Bureau::with('service')->get();

        return view('bureau.index', compact('bureau'));
    }

    public function destroy($id)
    {
        $bureau = Bureau::findOrFail($id);
        $bureau->delete();
        return redirect()->route('stagiaires.bureau')->with('success', 'Le bureau a été supprimé avec succès');
    }

    public function edit($id)
    {
        $bureau = Bureau::findOrFail($id);
        $services = Service::all();
        return view('bureau.edit', compact('bureau', 'services'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'libelle' => 'required|string|max:255',
            'service_id' => 'required|exists:services,id',
        ]);

        $bureau = Bureau::findOrFail($id);
        $bureau->libelle = $validatedData['libelle'];
        $bureau->service_id = $validatedData['service_id'];
        $bureau->save();

        return redirect()->route('stagiaires.bureau')->with('success', 'Le bureau a été modifié avec succès');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'libelle' => 'required|string|max:255',
            'service_id' => 'required|exists:services,id',
        ]);

        $bureau = Bureau::create($validatedData);

        return redirect()->route('stagiaires.bureau')->with('success', 'Le bureau a été ajouté avec succès !');
    }
    public function create()
    {
        $services = Service::all();
        return view('bureau.create', compact('services'));
    }
}
