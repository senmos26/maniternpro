<?php

namespace App\Http\Controllers;

use App\Models\Attestation;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class AttestationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attestations = Attestation::with(['stagiaire', 'stage', 'bureau', 'service'])->get();


        $etablissements = [];
        foreach ($attestations as $attestation) {
            $etablissements[$attestation->stagiaire->id] = $attestation->stagiaire->etablissement->nom;
        }


        return view('attestations.attestations', compact('attestations', 'etablissements'));
    }
    public function updateStatut(Request $request, $id)
    {
        $attestation = Attestation::findOrFail($id);

        $request->validate([
            'statut' => 'required|in:remis,nonremis',
        ]);


        $attestation->statut = $request->statut;

        if ($request->statut === 'remis') {
            $attestation->date_prise = now();
        } else {

        }


        $attestation->save();


        return redirect()->back()->with('success', 'Statut de l\'attestation mis à jour avec succès.');
    }
    public function generatePDF($id)
    {

        $attestation = Attestation::with(['stagiaire', 'stage', 'bureau', 'service'])->find($id);


        if (!$attestation) {
            return response()->json(['error' => 'Attestation not found'], 404);
        }


        $attestations = Attestation::with('stagiaire.etablissement')->get();
        $etablissements = [];
        foreach ($attestations as $att) {
            $etablissements[$att->stagiaire->id] = $att->stagiaire->etablissement->nom;
        }


        $data = [
            'attestation' => $attestation,
            'etablissements' => $etablissements,
            'title' => 'Attestation',
            'date' => date('m/d/Y')
        ];

        // Charger la vue PDF avec les données
        $html = view('pdf.generate', $data)->render();


        $pdf = new Dompdf();


        $pdf->loadHtml($html);


        $pdf->render();

        return $pdf->stream('attestation.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
