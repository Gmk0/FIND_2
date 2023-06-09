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

        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
             $table->string('transaction_numero')->unique();
            //$table->foreignId('user_id')->constrained();
            // $table->foreignId('order_id')->constrained();
            $table->decimal('amount', 8, 2);
            $table->string('payment_method');
            $table->string('payment_token', 40)->nullable();
            $table->enum('status', ["pending", "successfull", "failed"]);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
