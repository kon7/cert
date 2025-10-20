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
        Schema::create('vulnerabilites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('feed_source_id')->constrained()->onDelete('cascade');
            $table->string('cve_id')->nullable()->unique();
            $table->string('title');
            $table->text('description')->nullable();
            $table->longText('content')->nullable(); 
            $table->string('source')->nullable();
            $table->string('link')->nullable()->unique();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vulnerabilites');
    }
};
