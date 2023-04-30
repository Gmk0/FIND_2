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
        Schema::create('feedback_services', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_id');
            $table->enum('etat', ['En attente de traitement', 'En cours de préparation', 'En transit', 'Livré'])->default('En attente de traitement');
            $table->datetime('delai_livraison_estimee')->nullable();
            $table->text('commentaires')->nullable();
            $table->enum('satisfaction', [1, 2, 3, 4, 5])->nullable();
            $table->text('problemes')->nullable();
            $table->text('actions_correctives')->nullable();
            $table->boolean('is_publish')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback_services');
    }
};
