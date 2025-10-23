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
        Schema::create('alertes', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->string('intitule');
            
            // Relation avec TypeAlerte
            $table->foreignId('type_alerte_id')->constrained('type_alertes')->onDelete('cascade');
            
            $table->date('date')->nullable();
            $table->string('severite')->nullable();
            $table->string('etat')->nullable();

            $table->date('date_initial')->nullable();
            $table->date('date_traite')->nullable();
            
            $table->string('concerne')->nullable();
            $table->text('risque')->nullable();
            $table->text('systemes_affectes')->nullable();

            $table->text('synthese')->nullable();
            $table->text('solution')->nullable();
            $table->text('source')->nullable();

            // Champs de traçabilité
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();


            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alertes');
    }
};
