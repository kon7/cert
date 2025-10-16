<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incidents = Incident::latest()->get();
        return view('incidents.index', compact('incidents'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     */
    // ici mettre la vue du formulaire de declaration inccidents
    public function create()
    {
        return view('incidents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'declaration' => 'required|string|in:initiale,intermediaire,post-mortem',
            'date_declaration' => 'nullable|date',
            'denomination_org' => 'nullable|string|max:255',
            'type_org' => 'nullable|string|max:255',
            'fournisseur' => 'nullable|string|max:255',
            'partie_prenan' => 'nullable|string|max:255',
            'fonction_declarant' => 'nullable|string|max:255',
            'adresse' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:50',
            'date_incident' => 'nullable|string|max:255',
            'duree_inci_clos' => 'nullable|string|max:255',
            'incident_decouve' => 'nullable|string|max:255',
            'incident_decouve_autre' => 'nullable|string|max:255',
            'origine_incident' => 'nullable|string|max:255',
            'moyens_inden_supp' => 'nullable|string|max:255',
            'moyens_inden_supp_autre' => 'nullable|string|max:255',
            'description_moyens' => 'nullable|string',
            'objectif_attaquant' => 'nullable|string|max:255',
            'objectif_attaquant_autre' => 'nullable|string|max:255',
            'action_realise' => 'nullable|string|max:255',
            'action_realise_autre' => 'nullable|string|max:255',
            'desc_gene_icident' => 'nullable|string',
            'action_immediates' => 'nullable|string',
            'indentification_activ_affect' => 'nullable|string|max:255',
            'indentification_activ_affect_autre' => 'nullable|string|max:255',
            'indentification_serv_affect' => 'nullable|string|max:255',
            'indentification_serv_affect_autre' => 'nullable|string|max:255',
            'impact_averer' => 'nullable|array',
            'poucentage_utili' => 'nullable|string|max:50',
            'services_essentiels' => 'nullable|string|max:10',
            'tiers_systeme' => 'nullable|string|max:255',
            'partie_prenant_incident' => 'nullable|string|max:10',
            'maniere_partie_prenant_incident' => 'nullable|string',
            'action_cond_entre' => 'nullable|array',
            'decription_mesure_tech' => 'nullable|string',
            'incident_remonte_externe' => 'nullable|string|max:10',
            'dispositif_gestion_active' => 'nullable|string|max:10',
            'incident_connu_public' => 'nullable|string|max:10',
            'prestataire_externe_incident' => 'nullable|string|max:10',
            'denomination_sociale_prestataire' => 'nullable|string|max:255',
            'telephone_prestataire' => 'nullable|string|max:50',
        ]);

        // Encodage JSON des champs à choix multiples
        $validated['impact_averer'] = isset($validated['impact_averer']) 
            ? json_encode($validated['impact_averer']) 
            : null;

        $validated['action_cond_entre'] = isset($validated['action_cond_entre']) 
            ? json_encode($validated['action_cond_entre']) 
            : null;

       // $validated['created_by'] = Auth::id();

      $incident = Incident::create($validated);

         return redirect()->back()->with([
        'success' => 'Incident enregistré avec succès !',
        'numero_suivie' => $incident->numero_suivie
    ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Incident $incident)
    {
        return view('incidents.show', compact('incident'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Incident $incident)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Incident $incident)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incident $incident)
    {
        //
    }
}
