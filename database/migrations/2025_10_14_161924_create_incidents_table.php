<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            $table->string('numero_suivie')->unique();

            // Informations de base
            $table->string('declaration'); // initiale, intermediaire, post-mortem
            $table->date('date_declaration')->nullable();
            $table->string('denomination_org')->nullable();
            $table->string('type_org')->nullable();
            $table->string('fournisseur')->nullable();
            $table->string('partie_prenan')->nullable();
            $table->string('fonction_declarant')->nullable();
            $table->string('adresse')->nullable();
            $table->string('telephone')->nullable();

            // Informations incident
            $table->string('date_incident')->nullable();
            $table->string('duree_inci_clos')->nullable();

            $table->string('incident_decouve')->nullable();
          

            $table->string('origine_incident')->nullable();

            $table->string('moyens_inden_supp')->nullable();
           
            $table->text('description_moyens')->nullable();

            $table->string('objectif_attaquant')->nullable();
           

            $table->string('action_realise')->nullable();
           

            $table->text('desc_gene_icident')->nullable();
            $table->text('action_immediates')->nullable();

            $table->string('indentification_activ_affect')->nullable();
         

            $table->string('indentification_serv_affect')->nullable();
          

            // Peut contenir plusieurs valeurs (checkbox multiples)
            $table->json('impact_averer')->nullable();

            $table->string('poucentage_utili')->nullable();
            $table->string('services_essentiels')->nullable();
            $table->string('localisation_physique')->nullable();

            $table->string('tiers_systeme')->nullable();

            $table->string('partie_prenant_incident')->nullable();
            $table->text('maniere_partie_prenant_incident')->nullable();

            // Action conduite par l’entreprise (peut être multiple)
            $table->json('action_cond_entre')->nullable();

            $table->text('decription_mesure_tech')->nullable();

            // Indicateurs binaires
            $table->string('incident_remonte_externe')->nullable();
            $table->string('dispositif_gestion_active')->nullable();
            $table->string('incident_connu_public')->nullable();
            $table->string('prestataire_externe_incident')->nullable();

            // Données du prestataire
            $table->string('denomination_sociale_prestataire')->nullable();
            $table->string('telephone_prestataire')->nullable();

            // Audit
            $table->foreignId('created_by')->nullable()->constrained('utilisateurs')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('utilisateurs')->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidents');
    }
};
