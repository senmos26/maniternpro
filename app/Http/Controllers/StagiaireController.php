<?php

namespace App\Http\Controllers;

use App\Http\Requests\StagiaireRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Bureau;
use App\Models\CV;
use App\Models\Etablissement;
use App\Models\Stage;
use App\Models\Stagiaire;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StagiaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('stagiaires.stagaires',['stagiaires'=>Stagiaire::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stages=Stage::all();
        $etablissements=Etablissement::all();
        $bureaus=Bureau::all();
        $stagiaire= new Stagiaire();
        return view('stagiaires.create',compact('stages','etablissements','bureaus','stagiaire'));
    }
    public function search(Request $request)
    {
        // Récupérer le mot-clé de la requête
        $keyword = $request->input('keyword');

        // Effectuer la recherche dans la table stagiaires
        $stagiaires = Stagiaire::where('cin', 'LIKE', "%$keyword%")
            ->orWhere('nom', 'LIKE', "%$keyword%")
            ->orWhere('prenom', 'LIKE', "%$keyword%")
            ->orWhere('email', 'LIKE', "%$keyword%")
            ->orWhere('Tel', 'LIKE', "%$keyword%")
            ->orWhereHas('etablissement', function ($query) use ($keyword) {
                $query->where('nom', 'LIKE', "%$keyword%");
            })
            ->orWhereHas('stage', function ($query) use ($keyword) {
                $query->where('titre_sujet', 'LIKE', "%$keyword%");
            })
            ->orWhereHas('bureau', function ($query) use ($keyword) {
                $query->where('nom', 'LIKE', "%$keyword%");
            })
            ->get();

        // Retourner les résultats à la vue
        return view('stagiaires.stagaires', compact('stagiaires'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StagiaireRequest $request)
    {
        // Valider les données de la requête
        $validatedData = $request->validated();

        // Enregistrer le stagiaire
        $stagiaire = new Stagiaire($validatedData);
        $stagiaire->save();

        // Enregistrer le fichier CV
        $path = $request->file('cv')->store('public/cvs');

        // Créer une nouvelle instance de CV avec l'ID du nouveau stagiaire
        $cv = new CV();
        $cv->stagiaire_id = $stagiaire->id;
        $cv->url = $path;
        $cv->save();

        // Redirection avec un message de succès
        return redirect()->route('Stagiaires')->with('success', 'Stagiaire ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $stagiaire = Stagiaire::findOrFail($id);

        return view('stagiaires.detail', compact('stagiaire'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $stagiaire = Stagiaire::findOrFail($id);

        $stages=Stage::all();
        $etablissements=Etablissement::all();
        $bureaus=Bureau::all();

        return view('stagiaires.edit', compact('stagiaire','stages','etablissements','bureaus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $stagiaire = Stagiaire::findOrFail($id);
        $validated = $request->validated();
        if ($request->hasFile('cv')) {
            // delete image
            Storage::disk('public')->delete($stagiaire->cv);

            $filePath = Storage::disk('public')->put('public/cvs', request()->file('cv'), 'public');
            $validated['cv'] = $filePath;
        }
        $update = $stagiaire->update($validated);
        if($update) {
            session()->flash('notif.success', 'Post updated successfully!');
            return redirect()->route('Stagiaires')->with('success', 'Stagiaire modifié avec succès.');
        }
        return  abort(500);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $stagiaire = Stagiaire::findOrFail($id);
            $cvPath = $stagiaire->cv;

            if($cvPath){
                Storage::disk('public')->delete($cvPath);
            }

            // Supprimer les enregistrements correspondants dans la table 'cvs'
            $stagiaire->cv()->delete();



            // Supprimer le stagiaire
            $stagiaire->delete();

            // Redirection avec un message de succès
            return redirect()->route('Stagiaires')->with('success', 'Stagiaire supprimé avec succès.');
        }catch (QueryException $e) {
            // Gestion de l'erreur d'intégrité de contrainte
            return redirect()->route('Stagiaires')->with('error', 'Impossible de supprimer le stagiaire. Veuillez d\'abord supprimer les enregistrements associés.');
        }
        // Rechercher le stagiaire à supprimer


    }

}
