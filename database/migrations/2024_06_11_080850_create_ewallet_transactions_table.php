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
        Schema::create('ewallet_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_wallet_id');
            $table->double('points')->nullable();
            $table->double('convertion_rate')->nullable();
            $table->double('amount')->nullable();
            $table->enum('transaction_type', [0, 1]);
            $table->text('description')->nullable();
            $table->boolean('status');
            $table->timestamps();

            $table->index('user_wallet_id');
            $table->foreign('user_wallet_id')->references('id')->on('user_wallets');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ewallet_transactions');
    }
};