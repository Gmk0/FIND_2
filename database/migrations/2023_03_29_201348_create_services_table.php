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

        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->decimal('basic_price', 8, 2);
            $table->string('basic_support');
            $table->integer('basic_revision');
            $table->integer('basic_delivery_time');
            $table->decimal('premium_price', 8, 2)->nullable();
            $table->string('premium_support')->nullable();
            $table->integer('premium_revision')->nullable();
            $table->integer('premium_delivery_time')->nullable();
            $table->decimal('extra_price', 8, 2)->nullable();
            $table->string('extra_support')->nullable();
            $table->integer('extra_revision')->nullable();
            $table->integer('extra_delivery_time')->nullable();
            $table->string('samples', 500)->nullable();
            $table->string('files')->nullable();
            $table->string('format')->nullable();
            $table->string('video_url')->nullable();
            $table->string('Sub_categorie', 2048)->nullable();

            $table->bigInteger('view_count')->default(0);
            $table->bigInteger('like')->default(0);
            $table->enum('is_publish', ["0", "1"])->default('0');
            $table->foreignId('freelance_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
