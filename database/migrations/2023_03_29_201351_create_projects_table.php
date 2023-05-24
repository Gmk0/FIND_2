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

        Schema::create('projects', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->text('description')->nullable();
            $table->string('files')->nullable();
            $table->decimal('bid_amount', 8, 2);
            $table->timestamp('begin_project')->nullable();
            $table->timestamp('end_project')->nullable();
            $table->integer('progress')->default(0);
            $table->foreignUuid('transaction_id')->nullable()->constrained();
            $table->enum('status', ["active", "en attente", "completed"])->default('en attente');
            $table->enum('is_paid', ["en attente", "payer"])->default('en attente');
            $table->boolean('visible')->default(true);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
