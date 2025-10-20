<?php

namespace App\Http\Controllers;

use App\Models\Alerte;
use Illuminate\Http\Request;
use App\Models\Type_alerte;
use Illuminate\Support\Facades\Auth;

class AlerteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alertes = Alerte::with('typeAlerte')->latest()->get();
        $types = Type_alerte::all();

        return view('alertes.index', compact('alertes', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type_alerte::all();
        return view('alertes.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'reference' => 'required|string|max:100|unique:alertes',
            'intitule' => 'required|string|max:255',
            'type_alerte_id' => 'required|exists:type_alertes,id',
            'date' => 'nullable|date',
            'severite' => 'nullable|string|max:100',
            'etat' => 'nullable',
            'date_initial' => 'nullable|date',
            'date_traite' => 'nullable|date',
            'concerne' => 'nullable|string|max:255',
            'risque' => 'nullable|string|max:255',
            'systemes_affectes' => 'nullable|string|max:255',
            'synthese' => 'nullable|string',
            'solution' => 'nullable|string',
        ]);

        // $validated['etat'] = json_encode($validated['etat'] ?? []);
        $validated['created_by'] = Auth::id();

        Alerte::create($validated);

        return redirect()->route('alertes.index')
                         ->with('success', 'Alerte créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alerte $alerte)
    {
        $alerte->load('typeAlerte');
        return view('alertes.show', compact('alerte'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alerte $alerte)
    {
        $types = Type_alerte::all();
        return view('alertes.edit', compact('alerte', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alerte $alerte)
    {
        $validated = $request->validate([
            'reference' => 'required|string|max:100|unique:alertes,reference,' . $alerte->id,
            'intitule' => 'required|string|max:255',
            'type_alerte_id' => 'required|exists:type_alertes,id',
            'date' => 'nullable|date',
            'severite' => 'nullable|string|max:100',
            'etat' => 'nullable',
            'date_initial' => 'nullable|date',
            'date_traite' => 'nullable|date',
            'concerne' => 'nullable|string|max:255',
            'risque' => 'nullable|string|max:255',
            'systemes_affectes' => 'nullable|string|max:255',
            'synthese' => 'nullable|string',
            'solution' => 'nullable|string',
        ]);

        // $validated['etat'] = json_encode($validated['etat'] ?? []);
        $validated['updated_by'] = Auth::id();

        $alerte->update($validated);

        return redirect()->route('alertes.index')
                         ->with('success', 'Alerte mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alerte $alerte)
    {
        $alerte->deleted_by = Auth::id();
        $alerte->save();
        $alerte->delete();

        return redirect()->route('alertes.index')
                         ->with('success', 'Alerte supprimée avec succès.');
    
    }

    //fonction pour retoune les alerte sur le site vitrine cert
    public function certIndex()
        {
            $alertes = Alerte::with('typeAlerte')
                        ->latest()
                        ->get(['id', 'reference', 'intitule', 'type_alerte_id', 'date_initial', 'date_traite']);

            return view('cert', compact('alertes'));
        }
    

    public function certShow($id)
        {
            $alerte = Alerte::with('typeAlerte')->findOrFail($id);

            return view('cert_detail', compact('alerte'));
        }

}
