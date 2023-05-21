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
        Schema::create('paiment_methods', function (Blueprint $table) {
            $table->id();
            $table->string('mobile', 2000)->nullable();
            $table->string('carte', 2000)->nullable();
            $table->string('virement', 2000)->nullable();
            $table->string('addresse', 2000)->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiment_methods');
    }
};