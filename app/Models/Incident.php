<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Incident extends Model
{
    use HasFactory;

    

    protected $fillable = [
        'declaration',
        'date_declaration',
        'denomination_org',
        'type_org',
        'fournisseur',
        'partie_prenan',
        'fonction_declarant',
        'adresse',
        'telephone',
        'date_incident',
        'duree_inci_clos',
        'incident_decouve',
        'incident_decouve_autre',
        'origine_incident',
        'moyens_inden_supp',
        'moyens_inden_supp_autre',
        'description_moyens',
        'objectif_attaquant',
        'objectif_attaquant_autre',
        'action_realise',
        'action_realise_autre',
        'desc_gene_icident',
        'action_immediates',
        'indentification_activ_affect',
        'indentification_activ_affect_autre',
        'indentification_serv_affect',
        'indentification_serv_affect_autre',
        'impact_averer',
        'poucentage_utili',
        'services_essentiels',
        'tiers_systeme',
        'partie_prenant_incident',
        'maniere_partie_prenant_incident',
        'action_cond_entre',
        'decription_mesure_tech',
        'incident_remonte_externe',
        'dispositif_gestion_active',
        'incident_connu_public',
        'prestataire_externe_incident',
        'denomination_sociale_prestataire',
        'telephone_prestataire',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'impact_averer' => 'array', 
        'action_cond_entre' => 'array',
    ];
}
