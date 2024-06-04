<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $services= Service::paginate(5);
       return view('service.index',['services'=>$services]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('service.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedata= $request-> validate([
            'libelle'=>'required|string'
        ]);
        Service::create($validatedata);
        return redirect()->route('services.index')->with('success', 'Le bureau a été ajouté avec succès !');
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
        $service = Service::findOrFail($id);

        return view('service.edit', compact('service', ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'libelle' => 'required|string|max:255',

        ]);

        $service= Service::findOrFail($id);
        $service->libelle = $validatedData['libelle'];

        $service->save();

        return redirect()->route('services.index')->with('success', 'Le bureau a été modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Le bureau a été supprimé avec succès');
    }
}
