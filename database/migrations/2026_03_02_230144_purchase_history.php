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
        Schema::create('purchase_history', function (Blueprint $table) {
            $table->id('purchase_history_id');
            $table->unsignedBigInteger('purchase_history_plans_id')->nullable();
            $table->unsignedBigInteger('purchase_history_user_id');
            $table->foreign('purchase_history_plans_id')->references('plans_id')->on('plans')
            ->nullOnDelete();
            $table->foreign('purchase_history_user_id')->references('id')->on('users');
            $table->string('purchase_history_status');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_history');
    }
};
