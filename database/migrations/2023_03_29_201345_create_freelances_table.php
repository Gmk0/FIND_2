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
        Schema::disableForeignKeyConstraints();
        Schema::create('freelances', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('identifiant');
            $table->text('description');
            $table->string('langue')->nullable();
            $table->string('diplome')->nullable();
            $table->string('certificat')->nullable();
            $table->string('experience')->nullable();
            $table->string('site')->nullable();
            $table->string('competences')->nullable();
            $table->decimal('taux_journalier', 8, 2)->nullable();
            $table->string('comptes')->nullable();
            $table->string('Sub_categorie')->nullable();
            $table->string('localisation')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->enum('level', ["basic", "premium", "extra"]);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('freelances');
    }
};