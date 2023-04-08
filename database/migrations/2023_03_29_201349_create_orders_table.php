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

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
             $table->string('order_numero')->unique();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('service_id')->constrained();
            $table->foreignId('freelance_id')->nullable()->constrained();
            $table->enum('type', ["freelance", "service"])->nullable();

            $table->decimal('total_amount', 8, 2);
            $table->integer('quantity')->nullable();
            $table->foreignId('transaction_id')->nullable()->constrained();
              $table->integer('progress')->default(0);
            $table->enum('status', ["pending", "completed", "rejeted"])->default('pending');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
