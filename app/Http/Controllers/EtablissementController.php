<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use App\Models\Stagiaire;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class EtablissementController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(){
        $etablissements=Etablissement::all();
        return view('etablissements.index',compact('etablissements'));
    }
    public function create()
    {
        return view('etablissements.create');
    }
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'nom'=>'required',
            'adresse'=>'required'
        ]);
        Etablissement::create($validateData);
        return redirect()->route('Etablissements');
    }


    public function destroy($id)
    {
        try {
            $etablissement = Etablissement::findOrFail($id);
            $etablissement->delete();
            return redirect()->route('Etablissements')->with('success', 'Etablissement supprimé avec succès');
        } catch (QueryException $e) {
            return redirect()->route('Etablissements')->with('error', 'Impossible de supprimer l\'établissement. Il est lié à d\'autres données.');
        }
    }

    public function edit($id)
    {
        $etablissement=Etablissement::findOrFail($id);
        return view('etablissements.edit',compact('etablissement'));

    }
    public function update(Request $request,$id)
    {
        $validateData=$request->validate([
            'nom'=>'required',
            'adresse'=>'required'
        ]);
        $etablissement=Etablissement::findOrFail($id);
        $etablissement->update($validateData);
        return redirect()->route('Etablissements');
    }


}
