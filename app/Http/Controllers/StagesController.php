<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class StagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stages = Stage::all();

        return view('stage.index', compact('stages', ));
    }
    public function show()
    {
        return view('stage.index');
    }
    public function create()
    {
        return view('stage.create');
    }
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'titre_sujet' => 'required|string|max:255',
            'statut' => 'required|in:En cours,Terminé',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
        ], [
            'titre_sujet.required' => 'Le champ Titre du sujet est obligatoire.',
            'titre_sujet.string' => 'Le champ Titre du sujet doit être une chaîne de caractères.',
            'titre_sujet.max' => 'Le champ Titre du sujet ne doit pas dépasser :max caractères.',
            'statut.required' => 'Le champ Statut est obligatoire.',
            'statut.in' => 'Le champ Statut doit être "En cours" ou "Terminé".',
            'date_debut.required' => 'Le champ Date de début est obligatoire.',
            'date_debut.date' => 'Le champ Date de début doit être une date valide.',
            'date_fin.required' => 'Le champ Date de fin est obligatoire.',
            'date_fin.date' => 'Le champ Date de fin doit être une date valide.',
            'date_fin.after' => 'Le champ Date de fin doit être postérieure à la date de début.',
        ]);

        // Créer le nouveau stage
        $stage = Stage::create($validatedData);

        // Rediriger avec un message de succès
        return redirect()->route('stagiaires.stage')->with('success', 'Le stage a été ajouté avec succès !');
    }

    public function edit($id)
    {
        $stage = Stage::findOrFail($id);
        return view('stage.edit', compact('stage'));
    }
    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'titre_sujet' => 'required|string|max:255',
            'statut' => 'required|in:Encours,Terminé',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
        ], [
            'titre_sujet.required' => 'Le champ Titre du sujet est obligatoire.',
            'titre_sujet.string' => 'Le champ Titre du sujet doit être une chaîne de caractères.',
            'titre_sujet.max' => 'Le champ Titre du sujet ne doit pas dépasser :max caractères.',
            'statut.required' => 'Le champ Statut est obligatoire.',
            'statut.in' => 'Le champ Statut doit être "En cours" ou "Terminé".',
            'date_debut.required' => 'Le champ Date de début est obligatoire.',
            'date_debut.date' => 'Le champ Date de début doit être une date valide.',
            'date_fin.required' => 'Le champ Date de fin est obligatoire.',
            'date_fin.date' => 'Le champ Date de fin doit être une date valide.',
            'date_fin.after' => 'Le champ Date de fin doit être postérieure à la date de début.',
        ]);

        // Trouver le stage à mettre à jour
        $stage = Stage::findOrFail($id);

        // Mettre à jour les données du stage
        $stage->titre_sujet = $validatedData['titre_sujet'];
        $stage->statut = $validatedData['statut'];
        $stage->date_debut = $validatedData['date_debut'];
        $stage->date_fin = $validatedData['date_fin'];
        $stage->save();

        // Rediriger avec un message de succès vers la liste des stages
        return redirect()->route('stagiaires.stage')->with('success', 'Le stage a été mis à jour avec succès');
    }


    public function destroy($id)
    {
        try {
            $stage = Stage::findOrFail($id);
            $stage->delete();
            return redirect()->route('stagiaires.stage')->with('success', 'Le stage a été supprimé avec succès');
        }catch (QueryException $e) {
            // Gestion de l'erreur d'intégrité de contrainte
            return redirect()->route('stagiaires.stage')->with('error', 'Impossible de supprimer le stage. Veuillez d\'abord supprimer les enregistrements associés.');
        }

    }
}
