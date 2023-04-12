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
            $table->id();
            $table->string('title');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('category_id')->constrained();

            $table->text('description')->nullable();
            $table->json('files')->nullable();
            $table->decimal('bid_amount', 8, 2);
            $table->timestamp('begin_project')->nullable();
            $table->timestamp('end_project')->nullable();
            $table->integer('progress')->nullable();
            $table->foreignId('transaction_id')->nullable()->constrained();
            $table->enum('status', ["active", "inactive", "completed"])->default('active');
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
