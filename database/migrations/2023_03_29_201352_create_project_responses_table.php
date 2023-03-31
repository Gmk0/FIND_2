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

        Schema::create('project_responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('freelance_id')->constrained();
            $table->foreignId('project_id')->constrained();
            $table->text('content');
            $table->decimal('bid_amount', 8, 2);
            $table->enum('status', ["pending","approved","rejected"])->default('pending');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_responses');
    }
};
