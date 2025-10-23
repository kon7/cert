<?php

namespace App\Http\Controllers;

use App\Models\Type_alerte;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class TypeAlerteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type_alertes = Type_alerte::all();
        return view('type_alertes.index', compact('type_alertes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('type_alertes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'libelle' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

       $validated['created_by'] = optional(Auth::user())->matricule;

        Type_alerte::create($validated);

        return redirect()->route('type_alertes.index')
                         ->with('success', 'Type d\'alerte créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type_alerte $type_alerte)
    {
        return view('type_alertes.show', compact('type_alerte'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type_alerte $type_alerte)
    {
         return view('type_alertes.edit', compact('typeAlerte'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
        'libelle' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);
    $validated['updated_by'] = optional(Auth::user())->matricule;
    $typeAlerte = Type_alerte::findOrFail($id);
    

    $typeAlerte->update($validated);

    return redirect()->route('type_alertes.index')
                     ->with('success', 'Type d\'alerte mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type_alerte $type_alerte)
    {
        $type_alerte->deleted_by = Auth::id();
        $type_alerte->save();
        $type_alerte->delete();

        return redirect()->route('type_alertes.index')
                         ->with('success', 'Type d\'alerte supprimé avec succès.');
    }
}
