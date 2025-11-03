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
        'origine_incident',
        'moyens_inden_supp',
        'description_moyens',
        'objectif_attaquant',
        'action_realise',
        'desc_gene_icident',
        'action_immediates',
        'indentification_activ_affect',
        'indentification_serv_affect',
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
        'localisation_physique',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'impact_averer' => 'array', 
        'action_cond_entre' => 'array',
    ];

    protected static function boot()
{
    parent::boot();

    static::creating(function ($incident) {
        
        $last = self::orderBy('id', 'desc')->first();
        $nextId = $last ? $last->id + 1 : 1;
        $incident->numero_suivie = 'INC-' . date('Y') . '-' . str_pad($nextId, 6, '0', STR_PAD_LEFT);
    });
}

}
