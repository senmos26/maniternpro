<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Stagiaire;
use Illuminate\Http\Request;

class AbscencesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absences=Absence::all();
        return view('absences.index',compact('absences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stagiaires=Stagiaire::all();
        return view('absences.create',compact('stagiaires'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'stagiaire_id' => 'required|exists:stagiaires,id',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'justification' => 'required|string|max:250',
        ]);

        Absence::create($validatedData);

        return redirect()->route('absences.index')->with('success', 'Absence ajoutée avec succès.');
    }
    public function filterabs(Request $request)
    {
        $keyword = $request->input('keyword');

        // Effectuer la recherche dans la table absences en incluant les informations du stagiaire
        $absences = Absence::whereHas('stagiaire', function ($query) use ($keyword) {
            $query->where('nom', 'LIKE', "%$keyword%")
                ->orWhere('prenom', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('tel', 'LIKE', "%$keyword%");
        })
            ->orWhere('date_debut', 'LIKE', "%$keyword%")
            ->orWhere('date_fin', 'LIKE', "%$keyword%")
            ->orWhere('justification', 'LIKE', "%$keyword%")
            ->get();

        // Retourner les résultats à la vue
        return view('absences.index', compact('absences'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $absences=Absence::all();
        return view('absences.index',compact('absences'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $absence=Absence::findOrFail($id);
        $stagiaires=Stagiaire::all();
        return view('absences.edit',compact('stagiaires','absence'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validation des données
        $validatedData = $request->validate([
            'stagiaire_id' => 'required|exists:stagiaires,id',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'justification' => 'required|string|max:250',
        ]);

        // Trouver l'absence à mettre à jour
        $absence = Absence::findOrFail($id);

        // Mettre à jour les attributs de l'absence
        $absence->update($validatedData);

        // Redirection avec un message de succès
        return redirect()->route('absences.index')->with('success', 'Absence mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id=$request->id;
        $absence=Absence::findOrFail($id);
        if (!$absence) {
            return redirect()->back()->with('error', 'L\'absence que vous essayez de supprimer n\'existe pas.');
        }
        $absence->delete();
        return redirect()->route('absences.index');
    }
}
