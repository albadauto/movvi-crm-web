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
        Schema::create('premium_users', function (Blueprint $table) {
            $table->id('premium_users_id');
            $table->unsignedBigInteger('premium_users_user_id');
            $table->unsignedBigInteger('premium_users_plan_id');
            $table->foreign('premium_users_user_id')->references('id')->on('users');
            $table->foreign('premium_users_plan_id')->references('plans_id')->on('plans');
            $table->date('premium_users_next_payment');
            $table->date('premium_users_last_payment');
            $table->boolean('premium_users_is_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('premium_users');
    }
};
