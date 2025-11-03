<?php

namespace App\Http\Controllers\Api;

use App\Models\Incident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IncidentController extends Controller
{
    public function store(Request $request)
    {
        // Validation des champs
        $validator = Validator::make($request->all(), [
            'declaration' => 'required|string',
            'date_declaration' => 'nullable|date',
            'denomination_org' => 'nullable|string',
            'type_org' => 'nullable|string',
            'fournisseur' => 'nullable|string',
            'partie_prenan' => 'nullable|string',
            'fonction_declarant' => 'nullable|string',
            'adresse' => 'nullable|string',
            'telephone' => 'nullable|string',
            'date_incident' => 'nullable|string',
            'duree_inci_clos' => 'nullable|string',
            'incident_decouve' => 'nullable|string',
            'origine_incident' => 'nullable|string',
            'moyens_inden_supp' => 'nullable|string',
            'description_moyens' => 'nullable|string',
            'objectif_attaquant' => 'nullable|string',
            'action_realise' => 'nullable|string',
            'desc_gene_icident' => 'nullable|string',
            'action_immediates' => 'nullable|string',
            'indentification_activ_affect' => 'nullable|string',
            'indentification_serv_affect' => 'nullable|string',
            'impact_averer' => 'nullable|array',
            'poucentage_utili' => 'nullable|string',
            'services_essentiels' => 'nullable|string',
            'localisation_physique' => 'nullable|string',
            'tiers_systeme' => 'nullable|string',
            'partie_prenant_incident' => 'nullable|string',
            'maniere_partie_prenant_incident' => 'nullable|string',
            'action_cond_entre' => 'nullable|array',
            'decription_mesure_tech' => 'nullable|string',
            'incident_remonte_externe' => 'nullable|string',
            'dispositif_gestion_active' => 'nullable|string',
            'incident_connu_public' => 'nullable|string',
            'prestataire_externe_incident' => 'nullable|string',
            'denomination_sociale_prestataire' => 'nullable|string',
            'telephone_prestataire' => 'nullable|string',
            'created_by' => 'nullable|integer',
            'updated_by' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        // Création de l’incident
        $incident = Incident::create($validator->validated());

        return response()->json([
            'status' => true,
            'message' => 'Incident créé avec succès.',
            'data' => $incident,
        ], 201);
    }
}
