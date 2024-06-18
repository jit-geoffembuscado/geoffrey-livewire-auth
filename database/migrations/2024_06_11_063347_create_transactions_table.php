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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('machine_id');
            $table->tinyInteger('transaction_type')->nullable();
            $table->string('reference_number')->nullable();
            $table->double('transaction_points')->nullable();
            $table->integer('transaction_quantity')->nullable();
            $table->datetime('transaction_date')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            $table->index('user_id');
            $table->index('machine_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('machine_id')->references('id')->on('machines');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};